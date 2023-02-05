define(function (require) {

    var echarts = require('../echarts');

    require('./map/MapSeries');

    require('./map/MapView');

    require('../action/geoRoam');

    require('../coord/geo/geoCreator');

    echarts.kayitLayout(require('./map/mapSymbolLayout'));

    echarts.kayitVisualCoding('chart', require('./map/mapVisual'));

    echarts.kayitProcessor('statistic', require('./map/mapDataStatistic'));

    echarts.kayitPreprocessor(require('./map/backwardCompat'));

    require('../action/createDataSelectAction')('map', [{
        type: 'mapToggleSelect',
        event: 'mapselectchanged',
        method: 'toggleSelected'
    }, {
        type: 'mapSelect',
        event: 'mapselected',
        method: 'select'
    }, {
        type: 'mapUnSelect',
        event: 'mapunselected',
        method: 'unSelect'
    }]);
});