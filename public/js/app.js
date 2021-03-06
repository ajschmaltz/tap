(function() {
  var Map, buttons, elements, getCookie, handleNoGeolocation, initializeMap, map, uploader;

  getCookie = function(name) {
    var cookie, i, len, ref;
    ref = document.cookie.split(';');
    for (i = 0, len = ref.length; i < len; i++) {
      cookie = ref[i];
      if (cookie && name === (cookie.split('='))[0]) {
        return decodeURIComponent(cookie.slice(1 + name.length));
      }
    }
    return null;
  };

  buttons = [];

  elements = document.getElementsByClassName("shutter");

  Array.prototype.forEach.call(elements, function(el) {
    return buttons.push({
      element: el
    });
  });

  uploader = new qq.FineUploaderBasic({
    extraButtons: buttons,
    element: document.getElementById('fine-uploader'),
    request: {
      endpoint: '/upload',
      customHeaders: {
        'X-XSRF-TOKEN': getCookie('XSRF-TOKEN')
      }
    },
    callbacks: {
      onSubmitted: function(id, name) {
        var button, mycanvas;
        button = this.getButton(id);
        mycanvas = document.createElement("img");
        mycanvas.className = "preview";
        uploader.drawThumbnail(id, mycanvas, 1000);
        return button.parentNode.getElementsByClassName('gallery')[0].appendChild(mycanvas);
      }
    }
  });

  $("#fullpage").submit(function(e) {
    var lead;
    e.preventDefault();
    lead = $(this).serializeArray();
    lead.push({
      name: 'photos',
      value: JSON.stringify(uploader.getUploads())
    });
    console.log(lead);
    return $.post('/lead', lead, function() {
      return window.location.replace("/");
    });
  });

  initializeMap = function() {
    var mapOptions;
    window.geocoder = new google.maps.Geocoder();
    mapOptions = {
      zoom: 14
    };
    window.map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
    if (navigator.geolocation) {
      return navigator.geolocation.getCurrentPosition((function(position) {
        var pos;
        pos = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
        window.map.setCenter(pos);
        console.log(pos.A);
        $("#location").val(pos);
        return window.marker = new google.maps.Marker({
          map: window.map,
          position: pos,
          draggable: true
        });
      }), function() {
        return handleNoGeolocation(true);
      });
    } else {
      return handleNoGeolocation(false);
    }
  };

  handleNoGeolocation = function(errorFlag) {
    var content, infowindow, options;
    if (errorFlag) {
      content = "Error: The Geolocation service failed.";
    } else {
      content = "Error: Your browser doesn't support geolocation.";
    }
    options = {
      map: map,
      position: new google.maps.LatLng(60, 105),
      content: content
    };
    infowindow = new google.maps.InfoWindow(options);
    return window.map.setCenter(options.position);
  };

  map = void 0;

  Map = (function() {
    var init;

    function Map() {}

    init = false;

    Map.boot = function() {
      if (init === false) {
        init = true;
        return initializeMap();
      }
    };

    return Map;

  })();

  $(document).ready(function() {
    var add_button, max_fields, wrapper, x;
    $("#geocode").click(function() {
      var address;
      address = document.getElementById("address").value;
      return window.geocoder.geocode({
        address: address
      }, function(results, status) {
        if (status === google.maps.GeocoderStatus.OK) {
          window.map.setCenter(results[0].geometry.location);
          return window.marker.setPosition(results[0].geometry.location);
        } else {
          return alert("Geocode was not successful for the following reason: " + status);
        }
      });
    });
    $("#fullpage").fullpage({
      controlArrows: false,
      verticalCentered: false,
      loopHorizontal: false,
      css3: true,
      afterLoad: function(anchorLink, index, slideAnchor, slideIndex) {
        if (index === 2 && document.getElementById("map-canvas")) {
          Map.boot();
        }
      }
    });
    max_fields = 10;
    wrapper = $("#photos");
    add_button = $("#add_photo");
    x = 1;
    $(add_button).click(function(e) {
      e.preventDefault();
      if (x < max_fields) {
        x++;
        return $(wrapper).append("<div class=\"form-group\"><label class=\"col-md-4 control-label\">Take a Photo of<\/label><div class=\"col-md-6\"><input type=\"text\" class=\"form-control\" name=\"photos[]\"><\/div><\/div>");
      }
    });
    return $(wrapper).on("click", ".remove_field", function(e) {
      e.preventDefault();
      $(this).parent("div").remove();
      return x--;
    });
  });

}).call(this);

//# sourceMappingURL=app.js.map