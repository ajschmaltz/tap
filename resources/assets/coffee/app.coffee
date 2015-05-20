getCookie = (name) ->
  for cookie in document.cookie.split ';' when cookie and name is (cookie.split '=')[0]
    return decodeURIComponent cookie[(1 + name.length)...]
  null

buttons = []
elements = document.getElementsByClassName("shutter")
Array::forEach.call elements, (el) ->
  buttons.push element: el

uploader = new qq.FineUploaderBasic
  extraButtons: buttons
  element: document.getElementById 'fine-uploader'
  request:
    endpoint: '/upload'
    customHeaders:
        'X-XSRF-TOKEN': getCookie 'XSRF-TOKEN'
  callbacks:
    onUpload: (id, name) ->
      button = @getButton(id)
      mycanvas = document.createElement "img"
      mycanvas.className = "preview"
      uploader.drawThumbnail id, mycanvas, 1000
      button.parentNode.getElementsByClassName('gallery')[0].appendChild mycanvas

initializeMap = ->
  mapOptions = zoom: 14
  map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions)

  # Try HTML5 geolocation
  if navigator.geolocation
    navigator.geolocation.getCurrentPosition ((position) ->
      pos = new google.maps.LatLng(position.coords.latitude, position.coords.longitude)
      infowindow = new google.maps.InfoWindow(
        map: map
        position: pos
        content: "Location found using HTML5."
      )
      map.setCenter pos
    ), ->
      handleNoGeolocation true

  else

    # Browser doesn't support Geolocation
    handleNoGeolocation false
handleNoGeolocation = (errorFlag) ->
  if errorFlag
    content = "Error: The Geolocation service failed."
  else
    content = "Error: Your browser doesn't support geolocation."
  options =
    map: map
    position: new google.maps.LatLng(60, 105)
    content: content

  infowindow = new google.maps.InfoWindow(options)
  map.setCenter options.position
map = undefined

class Map
  init = false
  this.boot = ->
    if init is false
      init = true
      initializeMap()

$(document).ready ->
  $("#fullpage").fullpage
    controlArrows: false,
    verticalCentered: false,
    loopHorizontal: false,
    css3: true
    afterLoad: (anchorLink, index, slideAnchor, slideIndex) ->
      Map.boot() if index is 2 and document.getElementById("map-canvas")
      return

  max_fields = 10 #maximum input boxes allowed
  wrapper = $("#photos") #Fields wrapper
  add_button = $("#add_photo") #Add button ID
  x = 1 #initlal text box count
  $(add_button).click (e) -> #on add input button click
    e.preventDefault()
    if x < max_fields #max input box allowed
      x++ #text box increment
      $(wrapper).append "<div class=\"form-group\"><label class=\"col-md-4 control-label\">Take a Photo of<\/label><div class=\"col-md-6\"><input type=\"text\" class=\"form-control\" name=\"photos[]\"><\/div><\/div>" #add input box

  $(wrapper).on "click", ".remove_field", (e) -> #user click on remove text
    e.preventDefault()
    $(this).parent("div").remove()
    x--