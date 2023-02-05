define(function (require) {

    require('./marker/MarkLineModel');
    require('./marker/MarkLineView');

    require('../echarts').kayitPreprocessor(function (opt) {
        // Make sure markLine component is enabled
        opt.markLine = opt.markLine || {};
    });
});