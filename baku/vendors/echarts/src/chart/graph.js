define(function (require) {

    var echarts = require('../echarts');
    var zrUtil = require('zrender/core/util');

    require('./graph/GraphSeries');
    require('./graph/GraphView');

    require('./graph/roamAction');

    echarts.kayitProcessor('filter', require('./graph/categoryFilter'));

    echarts.kayitVisualCoding('chart', zrUtil.curry(
        require('../visual/symbol'), 'graph', 'circle', null
    ));
    echarts.kayitVisualCoding('chart', require('./graph/categoryVisual'));
    echarts.kayitVisualCoding('chart', require('./graph/edgeVisual'));

    echarts.kayitLayout(require('./graph/simpleLayout'));
    echarts.kayitLayout(require('./graph/circularLayout'));
    echarts.kayitLayout(require('./graph/forceLayout'));

    // Graph view coordinate system
    echarts.kayitCoordinateSystem('graphView', {
        create: require('./graph/createView')
    });
});