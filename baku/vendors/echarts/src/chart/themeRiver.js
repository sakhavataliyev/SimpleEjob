define(function (require) {

    var echarts = require('../echarts');
    var zrUtil = require('zrender/core/util');


    require('./themeRiver/ThemeRiverSeries');
    
    require('./themeRiver/ThemeRiverView');

    echarts.kayitLayout(require('./themeRiver/themeRiverLayout'));

    echarts.kayitVisualCoding('chart', require('./themeRiver/themeRiverVisual'));

    echarts.kayitProcessor(
        'filter', zrUtil.curry(require('../processor/dataFilter'), 'themeRiver')
    );    
});