<?php
class Redux_Options_multi_text_double {

    /**
     * Field Constructor.
     *
     * Required - must call the parent constructor, then assign field and value to vars, and obviously call the render field function
     *
     * @since Redux_Options 1.0.0
    */
    function __construct($field = array(), $value ='', $parent) {
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
        $class = (isset($this->field['class'])) ? $this->field['class'] : 'regular-text';
        echo '<ul id="' . $this->field['id'] . '-ul">';

        if(isset($this->value) && is_array($this->value)) {
            foreach($this->value as $k => $value) {
                if($value['first'] != '') {
                    echo '<li><input type="text" id="' . $this->field['id'] . '-' . $k . '" name="' . $this->args['opt_name'] . '[' . $this->field['id'] . ']['.$k.'][first]" value="' . esc_attr($value['first']) . '" class="' . $class . '" rel-position="first"/> 
                        <input type="text" id="' . $this->field['id'] . '-' . $k . '" name="' . $this->args['opt_name'] . '[' . $this->field['id'] . ']['.$k.'][second]" value="' . esc_attr($value['second']) . '" class="' . $class . '" rel-position="second" /> <a href="javascript:void(0);" class="redux-opts-multi-text-double-remove">' . __('Remove', Redux_TEXT_DOMAIN) . '</a></li>';
                }
            }
        } else {
            echo '<li><input type="text" id="' . $this->field['id'] . '" name="' . $this->args['opt_name'] . '[' . $this->field['id'] . '][first][]" value="" class="' . $class . '" rel-position="first" /> <input type="text" id="' . $this->field['id'] . '" name="' . $this->args['opt_name'] . '[' . $this->field['id'] . '][second][]" value="" class="' . $class . '"  rel-position="second" /> <a href="javascript:void(0);" class="redux-opts-multi-text-double-remove">' . __('Remove', Redux_TEXT_DOMAIN) . '</a></li>';
        }

        echo '<li style="display:none;"><input type="text" id="' . $this->field['id'] . '" name="" value="" class="' . $class . '" rel-position="first"/> <input type="text" id="' . $this->field['id'] . '" name="" value="" class="' . $class . '" rel-position="second" /> <a href="javascript:void(0);" class="redux-opts-multi-text-double-remove">' . __('Remove', Redux_TEXT_DOMAIN) . '</a></li>';
        echo '</ul>';
        echo '<a href="javascript:void(0);" class="redux-opts-multi-text-double-add" rel-id="' . $this->field['id'] . '-ul" rel-name="' . $this->args['opt_name'] . '[' . $this->field['id'] . ']">' . __('Add More', Redux_TEXT_DOMAIN) . '</a><br/>';
        echo (isset($this->field['desc']) && !empty($this->field['desc'])) ? ' <span class="description">' . $this->field['desc'] . '</span>' : '';
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
            'redux-opts-field-multi-text-double-js', 
            Redux_OPTIONS_URL . 'fields/multi_text_double/field_multi_text_double.js', 
            array('jquery'),
            time(),
            true
        );
    }    
}
