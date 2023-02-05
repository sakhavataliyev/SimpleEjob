define(function (require) {

    var zrUtil = require('zrender/core/util');
    var echarts = require('../echarts');

    require('./effectScatter/EffectScatterSeries');
    require('./effectScatter/EffectScatterView');

    echarts.kayitVisualCoding('chart', zrUtil.curry(
        require('../visual/symbol'), 'effectScatter', 'circle', null
    ));
    echarts.kayitLayout(zrUtil.curry(
        require('../layout/points'), 'effectScatter'
    ));
});