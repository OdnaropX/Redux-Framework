<?php
class Redux_Options_checkbox_img {

    /**
     * Field Constructor.
     *
     * Required - must call the parent constructor, then assign field and value to vars, and obviously call the render field function
     *
     * @since Redux_Options 1.0.0
    */
    function __construct($field = array(), $value = '', $parent = '') {
        $this->field = $field;
  $this->value = $value;
	$this->args = $parent->args;
    }

    /**
     * Field Render Function.
     *
     * Takes the vars and outputs the HTML for the field in the settings
     *
     * @since Redux_Options 1.0.0
    */
    function render() {
        $class = (isset($this->field['class'])) ? 'class="' . $this->field['class'] . '" ' : '';
        echo '<fieldset>';
        foreach($this->field['options'] as $k => $v) {
            $selected = (checked($this->value[$k], $k, false) != '') ? ' redux-checkbox-img-selected' : '';
            echo '<label class="redux-checkbox-img' . $selected . ' redux-checkbox-img-' . $this->field['id'] . '" for="' . $this->field['id'] . '_' . array_search($k,array_keys($this->field['options'])) . '" >';
            echo '<input type="checkbox" id="' . $this->field['id'] . '_' . array_search($k,array_keys($this->field['options'])) . '" name="' . $this->args['opt_name'] . '[' . $this->field['id'] . ']['.$k.']" ' . $class . ' value="' . $k . '" ' .checked($this->value[$k], $k, false) . ' onclick="jQuery:redux_checkbox_img_select(\'' . $this->field['id'] . '_' . array_search($k,array_keys($this->field['options'])) . '\', \'' . $this->field['id'] . '\');" />';
            echo '<img src="' . $v['img'] . '" alt="' . $v['title'] . '" />';
            echo '<br/><span>' . $v['title'] . '</span>';
            echo '</label>';
        }
        echo (isset($this->field['desc']) && !empty($this->field['desc'])) ? '<br/><span class="description">' . $this->field['desc'] . '</span>' : '';
        echo '</fieldset>';
    }

    /**
     * Enqueue Function.
     *
     * If this field requires any scripts, or css define this function and register/enqueue the scripts/css
     *
     * @since Redux_Options 1.0.0
    */
    function enqueue() {
        wp_enqueue_script(
            'redux-opts-field-checbox_img-js', 
            Redux_OPTIONS_URL . 'fields/checkbox_img/field_checkbox_img.js', 
            array('jquery'),
            time(),
            true
        );
    }
}
