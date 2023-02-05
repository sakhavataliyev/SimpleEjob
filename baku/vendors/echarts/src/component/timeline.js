/**
 * DataZoom component entry
 */
define(function (require) {

    var echarts = require('../echarts');

    echarts.kayitPreprocessor(require('./timeline/preprocessor'));

    require('./timeline/typeDefaulter');
    require('./timeline/timelineAction');
    require('./timeline/SliderTimelineModel');
    require('./timeline/SliderTimelineView');

});