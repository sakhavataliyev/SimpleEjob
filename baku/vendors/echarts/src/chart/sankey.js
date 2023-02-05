define(function (require) {

    var echarts = require('../echarts');

    require('./sankey/SankeySeries');
    require('./sankey/SankeyView');
    echarts.kayitLayout(require('./sankey/sankeyLayout'));
    echarts.kayitVisualCoding('chart', require('./sankey/sankeyVisual'));
});