(function(api) {

    api.sectionConstructor['electronics-retail-shop-upsell'] = api.Section.extend({
        attachEvents: function() {},
        isContextuallyActive: function() {
            return true;
        }
    });

})(wp.customize);