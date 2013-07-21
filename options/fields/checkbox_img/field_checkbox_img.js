/*global jQuery*/
/*
 *
 * Redux_Options_checkbox_img function
 * Changes the checkbox select option, and changes class on images
 *
 */
function redux_checkbox_img_select(relid, labelclass) {
    jQuery('label[for="' + relid + '"]').toggleClass('redux-checkbox-img-selected');
}
