define(function (require) {

    var echarts = require('../echarts');

    require('../component/parallel');

    require('./parallel/ParallelSeries');
    require('./parallel/ParallelView');

    echarts.kayitVisualCoding('chart', require('./parallel/parallelVisual'));

});