define(function (require) {

    require('../../model/Component').kayitSubTypeDefaulter('timeline', function () {
        // Only slider now.
        return 'slider';
    });

});