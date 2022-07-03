<?php
class FormCache {
    private $form_name;
    private $inputs = array();

    public function start_form($method, $form_name = '', $extra = '', $css_class = '') {
        $this->form_name = $form_name;

        echo '<script>
        function htmlEncode(str){
            return String(str).replace(/[^\w. ]/gi, function(c){
                return "&#"+c.charCodeAt(0)+";";
            });
        }

        function storeData(input_name, data) {
            data = htmlEncode(data);
            window.localStorage.setItem(input_name, data);
        }

        function getData(input_name) {
            data = window.localStorage.getItem(input_name); 
            data = htmlEncode(data);
            return data;
        }

        function removeData(input_name) { 
            window.localStorage.removeItem(input_name);
        }
        </script>';

        echo '<form method="'.$method.'" id="'.$form_name.'" class="'.$css_class.'" '.$extra.'>';
    }

    public function end_form($reset_form = false) {
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

    public function print_input($type, $name, $extra = '', $css_class = '') {
        $this->inputs[] = $name;

        if($type=="textarea") {
            echo '<textarea name="'.$name.'" id="'.$name.'" '.$extra.' class="'.$css_class.'"></textarea>';
        }
        else {
            echo '<input type="'.$type.'" name="'.$name.'" id="'.$name.'" class="'.$css_class.'" />';
        }
    }

    public function print_button($text = 'Submit', $name = 'submit', $extra = '', $css_class = '') {
        echo '<button type="submit" name="'.$name.'" id="'.$name.'" class="'.$css_class.'">'.$text.'</button>';
    }

    private function reset() {
        echo '<script> window.onload = function(){';

        foreach($this->inputs as $id => $name) {
            $js_variable_name = $this->form_name.'_input_'.$id.'_'.$name;
            echo 'removeData("'.$js_variable_name.'");';
        }

        echo '}; </script>';
    }
}
?>