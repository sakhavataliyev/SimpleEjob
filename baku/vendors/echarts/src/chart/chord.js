define(function (require) {

    require('./chord/ChordSeries');
    require('./chord/ChordView');

    var echarts = require('../echarts');
    var zrUtil = require('zrender/core/util');
    echarts.kayitLayout(require('./chord/chordCircularLayout'));

    echarts.kayitVisualCoding(
        'chart',  zrUtil.curry(require('../visual/dataColor'), 'chord')
    );

    echarts.kayitProcessor(
        'filter', zrUtil.curry(require('../processor/dataFilter'), 'pie')
    );
});