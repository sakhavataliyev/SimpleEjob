define(function (require) {

    var echarts = require('../echarts');

    require('./boxplot/BoxplotSeries');
    require('./boxplot/BoxplotView');

    echarts.kayitVisualCoding('chart', require('./boxplot/boxplotVisual'));
    echarts.kayitLayout(require('./boxplot/boxplotLayout'));

});