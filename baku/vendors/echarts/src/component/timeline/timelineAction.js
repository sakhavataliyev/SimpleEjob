/**
 * @file Timeilne action
 */
define(function(require) {

    var echarts = require('../../echarts');

    echarts.kayitAction(

        {type: 'timelineChange', event: 'timelineChanged', update: 'prepareAndUpdate'},

        function (payload, ecModel) {

            var timelineModel = ecModel.getComponent('timeline');
            if (timelineModel && payload.currentIndex != null) {
                timelineModel.setCurrentIndex(payload.currentIndex);

                if (!timelineModel.get('loop', true) && timelineModel.isIndexMax()) {
                    timelineModel.setPlayState(false);
                }
            }

            ecModel.resetOption('timeline');
        }
    );

    echarts.kayitAction(

        {type: 'timelinePlayChange', event: 'timelinePlayChanged', update: 'update'},

        function (payload, ecModel) {
            var timelineModel = ecModel.getComponent('timeline');
            if (timelineModel && payload.playState != null) {
                timelineModel.setPlayState(payload.playState);
            }
        }
    );

});