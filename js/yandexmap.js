var map;
jQuery(document).ready(function () {
    if($('#map-yandex').length)
        ymaps.ready(init);
});

function init() {
    var address = $('#map-yandex').attr('data-address');
    var geoCoder = ymaps.geocode(address);
    geoCoder.then(
        function (res) {
            var firstGeoObject = res.geoObjects.get(0),
                coords = firstGeoObject.geometry.getCoordinates(),
                bounds = firstGeoObject.properties.get('boundedBy');
            console.log(coords);

            map = new ymaps.Map('map-yandex',{
                center: coords,
                zoom: 14
            });
            map.behaviors.disable('scrollZoom')
            var GeoObject = new ymaps.GeoObject({
                geometry: {
                    type: "Point",
                    coordinates: coords
                }
            });
            map.geoObjects.add(GeoObject);
        }
    );
}