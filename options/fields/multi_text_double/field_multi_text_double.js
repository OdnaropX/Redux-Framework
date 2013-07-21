/*global jQuery, document*/
jQuery(document).ready(function () {
    jQuery('.redux-opts-multi-text-double-remove').live('click', function () {
        jQuery(this).prev('input[type="text"]').val('');
        jQuery(this).parent().fadeOut('slow', function () { jQuery(this).remove(); });
    });

    jQuery('.redux-opts-multi-text-double-add').click(function () {
        var len = jQuery('#' + jQuery(this).attr('rel-id') + ' li').length;
        var new_input = jQuery('#' + jQuery(this).attr('rel-id') + ' li:last-child').clone();
        jQuery('#' + jQuery(this).attr('rel-id')).append(new_input);
        jQuery('#' + jQuery(this).attr('rel-id') + ' li:last-child').removeAttr('style');
        jQuery('#' + jQuery(this).attr('rel-id') + ' li:last-child input[type="text"]').val('');
        jQuery('#' + jQuery(this).attr('rel-id') + ' li:last-child input[rel-position="first"]').attr('name', jQuery(this).attr('rel-name')+'['+len+'][first]');
        jQuery('#' + jQuery(this).attr('rel-id') + ' li:last-child input[rel-position="second"]').attr('name', jQuery(this).attr('rel-name') + '['+len+'][second]');
    });
});
