<?php
class FormCache {


    function print_input($type, $name, $extra = '', $class = '') {
        if($type=="textarea") {
            echo '<textarea name="'.$name.'" rows="'.$extra.'" class="'.$class.'"></textarea>';
        }
        else {
            echo '<input type="'.$type.'" name="'.$name.'" class="'.$class.'">';
        }
    }
}
?>