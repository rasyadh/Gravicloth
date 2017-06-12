<div id="map" style="width:100%; height:350px; background-color:#e6e6e6;"></div>

<script>
      function initMap() {
        var sub = {lat: -7.243037, lng: 112.722886};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 13,
          center: sub
        });
        var marker = new google.maps.Marker({
          position: sub,
          map: map
        });
      }
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAQh5_ei60SZ0XQu4aYgJGKeHSSfnu6-xE&callback=initMap"></script>