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
      onUpload: function(id, name) {
        var button, mycanvas;
        button = this.getButton(id);
        button.style.display = 'none';
        mycanvas = document.createElement("canvas");
        mycanvas.className = "poop";
        uploader.drawThumbnail(id, mycanvas, window.innerWidth * .9);
        return button.parentNode.getElementsByClassName('gallery')[0].appendChild(mycanvas);
      }
    }
  });

  initializeMap = function() {
    var map, mapOptions;
    mapOptions = {
      zoom: 14
    };
    map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
    if (navigator.geolocation) {
      return navigator.geolocation.getCurrentPosition((function(position) {
        var infowindow, pos;
        pos = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
        infowindow = new google.maps.InfoWindow({
          map: map,
          position: pos,
          content: "Location found using HTML5."
        });
        return map.setCenter(pos);
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
    return map.setCenter(options.position);
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

  fullpage.initialize("#fullpage", {
    css3: true,
    afterLoad: function(anchorLink, index, slideAnchor, slideIndex) {
      if (index === 2) {
        Map.boot();
      }
    }
  });

}).call(this);

//# sourceMappingURL=app.js.map