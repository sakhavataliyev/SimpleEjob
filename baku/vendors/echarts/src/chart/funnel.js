define(function (require) {

    var zrUtil = require('zrender/core/util');
    var echarts = require('../echarts');

    require('./funnel/FunnelSeries');
    require('./funnel/FunnelView');

    echarts.kayitVisualCoding(
        'chart',  zrUtil.curry(require('../visual/dataColor'), 'funnel')
    );
    echarts.kayitLayout(require('./funnel/funnelLayout'));

    echarts.kayitProcessor(
        'filter', zrUtil.curry(require('../processor/dataFilter'), 'funnel')
    );
});