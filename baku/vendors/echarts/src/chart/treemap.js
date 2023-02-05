define(function (require) {

    var echarts = require('../echarts');

    require('./treemap/TreemapSeries');
    require('./treemap/TreemapView');
    require('./treemap/treemapAction');

    echarts.kayitVisualCoding('chart', require('./treemap/treemapVisual'));

    echarts.kayitLayout(require('./treemap/treemapLayout'));
});