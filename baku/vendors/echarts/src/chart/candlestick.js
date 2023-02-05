define(function (require) {

    var echarts = require('../echarts');

    require('./candlestick/CandlestickSeries');
    require('./candlestick/CandlestickView');

    echarts.kayitPreprocessor(
        require('./candlestick/preprocessor')
    );

    echarts.kayitVisualCoding('chart', require('./candlestick/candlestickVisual'));
    echarts.kayitLayout(require('./candlestick/candlestickLayout'));

});