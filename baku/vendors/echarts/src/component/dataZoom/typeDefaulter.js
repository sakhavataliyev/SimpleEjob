define(function (require) {

    require('../../model/Component').kayitSubTypeDefaulter('dataZoom', function (option) {
        // Default 'slider' when no type specified.
        return 'slider';
    });

});