define(function (require) {

    var zrUtil = require('zrender/core/util');
    var echarts = require('../echarts');

    // Must use radar component
    require('../component/radar');

    require('./radar/RadarSeries');
    require('./radar/RadarView');

    echarts.kayitVisualCoding(
        'chart',  zrUtil.curry(require('../visual/dataColor'), 'radar')
    );
    echarts.kayitVisualCoding('chart', zrUtil.curry(
        require('../visual/symbol'), 'radar', 'circle', null
    ));
    echarts.kayitLayout(require('./radar/radarLayout'));

    echarts.kayitProcessor(
        'filter', zrUtil.curry(require('../processor/dataFilter'), 'radar')
    );

    echarts.kayitPreprocessor(require('./radar/backwardCompat'));
});