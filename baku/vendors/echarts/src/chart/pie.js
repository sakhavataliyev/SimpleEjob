define(function (require) {

    var zrUtil = require('zrender/core/util');
    var echarts = require('../echarts');

    require('./pie/PieSeries');
    require('./pie/PieView');

    require('../action/createDataSelectAction')('pie', [{
        type: 'pieToggleSelect',
        event: 'pieselectchanged',
        method: 'toggleSelected'
    }, {
        type: 'pieSelect',
        event: 'pieselected',
        method: 'select'
    }, {
        type: 'pieUnSelect',
        event: 'pieunselected',
        method: 'unSelect'
    }]);

    echarts.kayitVisualCoding(
        'chart',  zrUtil.curry(require('../visual/dataColor'), 'pie')
    );

    echarts.kayitLayout(zrUtil.curry(
        require('./pie/pieLayout'), 'pie'
    ));

    echarts.kayitProcessor(
        'filter', zrUtil.curry(require('../processor/dataFilter'), 'pie')
    );
});