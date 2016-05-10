@extends('main')

@section('title')
Đặt đơn
@endsection

@section('content')

 <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBu3u3pWWnnIGDkr5381WiWgqnDaRPaLV0&sensor=false&libraries=places"></script>
    
	<form method="post" action="{{Asset('orders')}}" id="form-orders" class="form">
        <strong> Chọn loại hàng hóa: </strong>
        <select name="type" class="form-control">
            <option value="1">Nhỏ (&lt 5kg) - 4000đ/km</option>
            <option value="2">Vừa (5-10kg) - 7000đ/km</option>
            <option value="3">Lớn (&gt 10kg) - 10000đ/km</option>
        </select>
        <strong> Chọn loại vận chuyển: </strong>
        <select name="level" class="form-control">
            <option value="0"> Bình thường </option>
            <option value="1"> Nhanh </option>
        </select>
        <strong> SĐT Liên hệ: </strong>
        <input type="number" id="phone" name="phone" placeholder="Số điện thoại" class="form-control"/>
        <strong>Địa điểm: </strong>
        <input type="text" id="txtSource" name="txtSource" placeholder="Địa điểm đi" class="form-control"/>

        <input type="text" id="txtDestination" name="txtDestination" placeholder="Địa điểm đến" class="form-control" />

        <script >
        var source, destination;
        var directionsDisplay;
        var directionsService = new google.maps.DirectionsService();
        google.maps.event.addDomListener(window, 'load', function () {
            new google.maps.places.SearchBox(document.getElementById('txtSource'));
            new google.maps.places.SearchBox(document.getElementById('txtDestination'));
            directionsDisplay = new google.maps.DirectionsRenderer({ 'draggable': true });
        });

        function GetRoute() {
            var hanoi = new google.maps.LatLng(21.0235393,105.832489,13);
            var mapOptions = {
                zoom: 7,
                center: hanoi
            };
            map = new google.maps.Map(document.getElementById('dvMap'), mapOptions);
            directionsDisplay.setMap(map);
            directionsDisplay.setPanel(document.getElementById('dvPanel'));

            //*********DIRECTIONS AND ROUTE**********************//
            source = document.getElementById("txtSource").value;
            destination = document.getElementById("txtDestination").value;

            var request = {
                origin: source,
                destination: destination,
                travelMode: google.maps.TravelMode.DRIVING
            };
            directionsService.route(request, function (response, status) {
                if (status == google.maps.DirectionsStatus.OK) {
                    directionsDisplay.setDirections(response);
                }
            });

            //*********DISTANCE AND DURATION**********************//
            var service = new google.maps.DistanceMatrixService();
            service.getDistanceMatrix({
                origins: [source],
                destinations: [destination],
                travelMode: google.maps.TravelMode.DRIVING,
                unitSystem: google.maps.UnitSystem.METRIC,
                avoidHighways: false,
                avoidTolls: false
            }, function (response, status) {
                if (status == google.maps.DistanceMatrixStatus.OK && response.rows[0].elements[0].status != "ZERO_RESULTS") {
                    var distance = response.rows[0].elements[0].distance.text;
                    var distance2 = response.rows[0].elements[0].distance.value;
                    var duration = response.rows[0].elements[0].duration.text;
                    var dvDistance = document.getElementById("dvDistance");
                    dvDistance.innerHTML = "";
                    dvDistance.innerHTML += "Khoảng cách: " + distance + "<br />";
                      //dvDistance.innerHTML += "Duration:" + duration;
                   var vlDistance = document.getElementById("vlDistance");
                   vlDistance.innerHTML = "<input type='hidden' id='dist' name='dist' value='" +distance2/1000+ "'>";
                } else {
                    alert("Unable to find the distance via road.");
                }
            });
        }
    </script>

        <input type="button" value="Tính khoảng cách" onclick="GetRoute()" />
        

        <div id="dvDistance">
        </div>
        <div id="vlDistance"></div>
        <!-- <input type="text" id="distance" name="distance" placeholder="Nhập khoảng cách" class="form-control"/> -->
        <div id="dvMap" style="width: 400px; height: 400px">
        </div>
        <br>
		<input type="hidden" name="_token" value="{{ csrf_token() }}"> 

		<button class="btn btn-lg btn-primary btn-block"> Đặt đơn </button>
	</form>
    <br />

@endsection
