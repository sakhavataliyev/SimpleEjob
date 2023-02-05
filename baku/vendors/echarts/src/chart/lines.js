define(function (require) {

    require('./lines/LinesSeries');
    require('./lines/LinesView');

    var zrUtil = require('zrender/core/util');
    var echarts = require('../echarts');
    echarts.kayitLayout(
        require('./lines/linesLayout')
    );

    echarts.kayitVisualCoding(
        'chart', zrUtil.curry(require('../visual/seriesColor'), 'lines', 'lineStyle')
    );
});