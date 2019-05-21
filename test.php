<!DOCTYPE html>
<html>
<?php
$hostname_db1 = "localhost";
$database_db1 = "hosgis";
$username_db1 = "postgres";
$password_db1 = "1234";
$port = "5433";

$db = pg_connect("host=$hostname_db1 user=$username_db1 port=$port password=$password_db1 dbname=$database_db1") or die("Can't Connect Server");

pg_query("SET client_encoding = 'utf-8'"); 

?>
<head>
    <title>Leaflet Time Slider Example</title>
    <meta charset="utf-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.2/leaflet.css" />
    <!--[if lte IE 8]><link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.5.1/leaflet.ie.css" /><![endif]-->
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" type="text/css">
</head>

<body>


<?php 


if(  isset($_GET[ss])  )
{ ?>
            <button type="">LOGIN</button>
<?php }  else  {?>
            <button type="">LOGOUT</button>
<?php } ?>

    <div id="map" style="width: 100%; height: 600px"></div>

    

    <script src="http://cdn.leafletjs.com/leaflet-0.7.2/leaflet.js"></script>
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>

    <!-- Include this library for mobile touch support  -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.2/jquery.ui.touch-punch.min.js"></script>

<script>
	L.Control.SliderControl = L.Control.extend({
    options: {
        position: 'topright',
        layers: null,
        timeAttribute: 'time',
        isEpoch: false,     // whether the time attribute is seconds elapsed from epoch
        startTimeIdx: 0,    // where to start looking for a timestring
        timeStrLength: 19,  // the size of  yyyy-mm-dd hh:mm:ss - if millis are present this will be larger
        maxValue: -1,
        minValue: 0,
        showAllOnStart: false,
        markers: null,
        range: false,
        follow: false,
        sameDate: false,
        alwaysShowDate : false,
        rezoom: null
    },

    initialize: function (options) {
        L.Util.setOptions(this, options);
        this._layer = this.options.layer;

    },

    extractTimestamp: function(time, options) {
        if (options.isEpoch) {
            time = (new Date(parseInt(time))).toString(); // this is local time
        }
        return time.substr(options.startTimeIdx, options.startTimeIdx + options.timeStrLength);
    },

    setPosition: function (position) {
        var map = this._map;

        if (map) {
            map.removeControl(this);
        }

        this.options.position = position;

        if (map) {
            map.addControl(this);
        }
        this.startSlider();
        return this;
    },

    onAdd: function (map) {
        this.options.map = map;

        // Create a control sliderContainer with a jquery ui slider
        var sliderContainer = L.DomUtil.create('div', 'slider', this._container);
        $(sliderContainer).append('<div id="leaflet-slider" style="width:200px"><div class="ui-slider-handle"></div><div id="slider-timestamp" style="width:200px; margin-top:13px; background-color:#FFFFFF; text-align:center; border-radius:5px;"></div></div>');
        //Prevent map panning/zooming while using the slider
        $(sliderContainer).mousedown(function () {
            map.dragging.disable();
        });
        $(document).mouseup(function () {
            map.dragging.enable();
            //Hide the slider timestamp if not range and option alwaysShowDate is set on false
            if (options.range || !options.alwaysShowDate) {
                $('#slider-timestamp').html('');
            }
        });

        var options = this.options;
        this.options.markers = [];

        //If a layer has been provided: calculate the min and max values for the slider
        if (this._layer) {
            var index_temp = 0;
            this._layer.eachLayer(function (layer) {
                options.markers[index_temp] = layer;
                ++index_temp;
            });
            options.maxValue = index_temp - 1;
            this.options = options;
        } else {
            console.log("Error: You have to specify a layer via new SliderControl({layer: your_layer});");
        }
        return sliderContainer;
    },

    onRemove: function (map) {
        //Delete all markers which where added via the slider and remove the slider div
        for (i = this.options.minValue; i <= this.options.maxValue; i++) {
            map.removeLayer(this.options.markers[i]);
        }
        $('#leaflet-slider').remove();

        // unbind listeners to prevent memory leaks
        $(document).off("mouseup");
        $(".slider").off("mousedown");
    },

    startSlider: function () {
        _options = this.options;
        _extractTimestamp = this.extractTimestamp
        var index_start = _options.minValue;
        if(_options.showAllOnStart){
            index_start = _options.maxValue;
            if(_options.range) _options.values = [_options.minValue,_options.maxValue];
            else _options.value = _options.maxValue;
        }
        $("#leaflet-slider").slider({
            range: _options.range,
            value: _options.value,
            values: _options.values,
            min: _options.minValue,
            max: _options.maxValue,
            sameDate: _options.sameDate,
            step: 1,
            slide: function (e, ui) {
                var map = _options.map;
                var fg = L.featureGroup();
                if(!!_options.markers[ui.value]) {
                    // If there is no time property, this line has to be removed (or exchanged with a different property)
                    if(_options.markers[ui.value].feature !== undefined) {
                        if(_options.markers[ui.value].feature.properties[_options.timeAttribute]){
                            if(_options.markers[ui.value]) $('#slider-timestamp').html(
                                _extractTimestamp(_options.markers[ui.value].feature.properties[_options.timeAttribute], _options));
                        }else {
                            console.error("Time property "+ _options.timeAttribute +" not found in data");
                        }
                    }else {
                        // set by leaflet Vector Layers
                        if(_options.markers [ui.value].options[_options.timeAttribute]){
                            if(_options.markers[ui.value]) $('#slider-timestamp').html(
                                _extractTimestamp(_options.markers[ui.value].options[_options.timeAttribute], _options));
                        }else {
                            console.error("Time property "+ _options.timeAttribute +" not found in data");
                        }
                    }

                    var i;
                    // clear markers
                    for (i = _options.minValue; i <= _options.maxValue; i++) {
                        if(_options.markers[i]) map.removeLayer(_options.markers[i]);
                    }
                    if(_options.range){
                        // jquery ui using range
                        for (i = ui.values[0]; i <= ui.values[1]; i++){
                           if(_options.markers[i]) {
                               map.addLayer(_options.markers[i]);
                               fg.addLayer(_options.markers[i]);
                           }
                        }
                    }else if(_options.follow){
                        for (i = ui.value - _options.follow + 1; i <= ui.value ; i++) {
                            if(_options.markers[i]) {
                                map.addLayer(_options.markers[i]);
                                fg.addLayer(_options.markers[i]);
                            }
                        }
                    }else if(_options.sameDate){
                        var currentTime;
                        if (_options.markers[ui.value].feature !== undefined) {
                            currentTime = _options.markers[ui.value].feature.properties.time;
                        } else {
                            currentTime = _options.markers[ui.value].options.time;
                        }
                        for (i = _options.minValue; i <= _options.maxValue; i++) {
                            if(_options.markers[i].options.time == currentTime) map.addLayer(_options.markers[i]);
                        }
                    }else{
                        for (i = _options.minValue; i <= ui.value ; i++) {
                            if(_options.markers[i]) {
                                map.addLayer(_options.markers[i]);
                                fg.addLayer(_options.markers[i]);
                            }
                        }
                    }
                };
                if(_options.rezoom) {
                    map.fitBounds(fg.getBounds(), {
                        maxZoom: _options.rezoom
                    });
                }
            }
        });
        if (!_options.range && _options.alwaysShowDate) {
            $('#slider-timestamp').html(_extractTimeStamp(_options.markers[index_start].feature.properties[_options.timeAttribute], _options));
        }
        for (i = _options.minValue; i <= index_start; i++) {
            _options.map.addLayer(_options.markers[i]);
        }
    }
});

L.control.sliderControl = function (options) {
    return new L.Control.SliderControl(options);
};
</script>

    <script>
    var sliderControl = null;
    var myMap = L.map('map').setView([52.06, 7.40], 10);
    L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(myMap);
    //Use usual LayerGroups instead of GeoJSON fetched markers




   var marker1 = L.marker([51.933292258, 7.582512743], {time: "2013-01-22"});
   var marker2 = L.marker([51.933292258, 7.582512743], {time: "2013-01-26"});
   var marker3 = L.marker([51.933292258, 7.582512743], {time: "2013-01-24"});
   var marker4 = L.marker([51.933292258, 7.582512743], {time: "2013-01-28"});


    
    
    
    layerGroup = L.layerGroup([marker1 , marker2, marker3, marker4  ]);
    var sliderControl = L.control.sliderControl({layer:layerGroup, follow: true});
    myMap.addControl(sliderControl);
    sliderControl.startSlider();
  
    //Fetch some data from a GeoJSON file



    // $.getJSON("points.json", function(json) {
    //     var testlayer = L.geoJson(json),
    //         sliderControl = L.control.sliderControl({
    //             position: "topright",
    //             layer: testlayer
    //         });
    //     //For a Range-Slider use the range property:
    //     sliderControl = L.control.sliderControl({
    //         position: "topright",
    //         layer: testlayer,
    //         range: true
    //     });
    //     //Make sure to add the slider to the map ;-)
    //     myMap.addControl(sliderControl);
    //     //And initialize the slider
    //     sliderControl.startSlider();
    // });
    </script>
</body>

</html>