<html>
<head>
    <link rel="stylesheet" href="/css/global.css" type="text/css">
    <link rel="stylesheet" href="https://cdn.rawgit.com/openlayers/openlayers.github.io/master/en/v5.3.0/css/ol.css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Anton&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Hind&display=swap" rel="stylesheet">

    <script src="https://cdn.rawgit.com/openlayers/openlayers.github.io/master/en/v5.3.0/build/ol.js"></script>

    <title>Travel List 0.1</title>
</head>

<body onload="initialize_maps();" class="container">

<header>
    <h1>Sammy's Travel List</h1>
</header>

    <div class="main">

            <div class="map_container clearfix">

                <div class="column x3">

                    <div class="column x5">

                        <ul class="list">
                            <li class="header visited">Visited</li>
                            @foreach ($visited as $place)
                                <li>{{ $place->name }}</li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="column x5">

                        <ul class="list">
                            <li class="header togo">To Go</li>
                            @foreach ($togo as $newplace)
                                <li>{{ $newplace->name }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="column x7">
                    <div id="map" class="map"></div>
                </div>

                <div class="clearfix"></div>
            </div>

    </div>

<div class="footer clearfix">
    <h2>Travel Photos</h2>
    @foreach ($photos as $photo)
        <div class="photo"><img src="{{ $photo['url'] }}" /> </div>
    @endforeach

</div>

    <script>

        var map;
        var mapLat = 0;
        var mapLng = 0;
        var mapDefaultZoom = 2;

        function initialize_maps() {
            map = new ol.Map({
                target: "map",
                layers: [
                    new ol.layer.Tile({
                        source: new ol.source.OSM({
                            url: "https://a.tile.openstreetmap.org/{z}/{x}/{y}.png"
                        })
                    })
                ],
                view: new ol.View({
                    center: ol.proj.fromLonLat([mapLng, mapLat]),
                    zoom: mapDefaultZoom
                })
            });

            @foreach ($togo as $place)
                add_map_point({{ $place->lat }}, {{ $place->lng }}, "/img/marker_togo.png");
            @endforeach

            @foreach ($visited as $place)
                add_map_point({{ $place->lat }}, {{ $place->lng }}, "/img/marker_visited.png");
            @endforeach
        }

        function add_map_point(lat, lng, icon) {
            var vectorLayer = new ol.layer.Vector({
                source:new ol.source.Vector({
                    features: [new ol.Feature({
                        geometry: new ol.geom.Point(ol.proj.transform([parseFloat(lng), parseFloat(lat)], 'EPSG:4326', 'EPSG:3857')),
                    })]
                }),
                style: new ol.style.Style({
                    image: new ol.style.Icon({
                        anchor: [0.5, 1],
                        anchorXUnits: "fraction",
                        anchorYUnits: "fraction",
                        src: icon
                    })
                })
            });
            map.addLayer(vectorLayer);
        }

    </script>

</body>
</html>
