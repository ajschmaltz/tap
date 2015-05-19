getCookie = (name) ->
  for cookie in document.cookie.split ';' when cookie and name is (cookie.split '=')[0]
    return decodeURIComponent cookie[(1 + name.length)...]
  null

uploader = new qq.FineUploaderBasic
  extraButtons: [
    element: document.getElementById "one"
  ,
    element: document.getElementById "two"
  ]
  element: document.getElementById 'fine-uploader'
  request:
    endpoint: '/upload'
    customHeaders:
        'X-XSRF-TOKEN': getCookie 'XSRF-TOKEN'
  callbacks:
    onUpload: (id, name) ->
      button = @getButton(id)
      button.style.display = 'none'
      mycanvas = document.createElement "canvas"
      mycanvas.className = "poop"
      uploader.drawThumbnail id, mycanvas, window.innerWidth *.9
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

fullpage.initialize "#fullpage",
  css3: true
  afterLoad: (anchorLink, index, slideAnchor, slideIndex) ->
    Map.boot() if index is 3
    return