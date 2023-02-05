define(function (require) {

    var zrUtil = require('zrender/core/util');
    var echarts = require('../echarts');

    require('./line/LineSeries');
    require('./line/LineView');

    echarts.kayitVisualCoding('chart', zrUtil.curry(
        require('../visual/symbol'), 'line', 'circle', 'line'
    ));
    echarts.kayitLayout(zrUtil.curry(
        require('../layout/points'), 'line'
    ));

    // Down sample after filter
    echarts.kayitProcessor('statistic', zrUtil.curry(
        require('../processor/dataSample'), 'line'
    ));

    // In case developer forget to include grid component
    require('../component/grid');
});