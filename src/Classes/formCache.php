<?php
class FormCache {
    private $form_name;
    private $inputs = array();

    function start_form($method, $form_name = '', $extra = '', $css_class = '') {
        $this->form_name = $form_name;

        echo '<script>
        function storeData(input_name, data) {
            window.localStorage.setItem(input_name, data);
        }

        function getData(input_name) {
            return window.localStorage.getItem(input_name); 
        }

        function removeData(input_name) { 
            window.localStorage.removeItem(input_name);
        }
        </script>';

        echo '<form method="'.$method.'" id="'.$form_name.'" class="'.$css_class.'" '.$extra.'>';
    }

    function end_form($reset_form = false) {
        echo '</form>';

        echo '<script> window.onload = function(){';

        foreach($this->inputs as $id => $name) {
            $js_variable_name = $this->form_name.'_input_'.$id.'_'.$name;
            echo 'const '.$js_variable_name.' = document.querySelector("#'.$name.'");';

            // js functions to store data
            echo $js_variable_name.'.addEventListener("keyup", (e) => {
                const data = e.currentTarget.value;
                storeData("'.$js_variable_name.'", data);
            });';

            // js functions to retrieve data
            echo 'document.getElementById("'.$name.'").value = getData("'.$js_variable_name.'");';
        }

        echo '}; </script>';

        if($reset_form) {
            $this->reset();
        }
    }

    private function reset() {
        echo '<script> window.onload = function(){';

        foreach($this->inputs as $id => $name) {
            $js_variable_name = $this->form_name.'_input_'.$id.'_'.$name;
            echo 'removeData("'.$js_variable_name.'");';
        }

        echo '}; </script>';
    }

    function print_input($type, $name, $extra = '', $css_class = '') {
        $this->inputs[] = $name;

        if($type=="textarea") {
            echo '<textarea name="'.$name.'" id="'.$name.'" '.$extra.' class="'.$css_class.'"></textarea>';
        }
        else {
            echo '<input type="'.$type.'" name="'.$name.'" id="'.$name.'" class="'.$css_class.'" />';
        }
    }

    function print_button($text = 'Submit', $name = 'submit', $extra = '', $css_class = '') {
        echo '<button type="submit" name="'.$name.'" id="'.$name.'" class="'.$css_class.'">'.$text.'</button>';
    }
}
?>