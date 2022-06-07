<?php
class AlertMessages {
    private $error = array();
    private $danger = array();
    private $success = array();
    private $info = array();
    private $color;
    private $alert;

    function __construct() {
    }

    function new_error($alert) {
        $this->error[] = $alert;
    }

    function new_danger($alert) {
        $this->danger[] = $alert;
    }

    function new_success($alert) {
        $this->success[] = $alert;
    }

    function new_info($alert) {
        $this->info[] = $alert;
    }

    function is_error() {
        if($this->get_type()=="red") {
            return true;
        }

        return false;
    }

    function is_success() {
        if($this->get_type()=="green") {
            return true;
        }

        return false;
    }

    private function get_type() {
        $this->get_alert();
        
        return $this->color;
    }

    private function get_alert($color_array = '') {
        $alert = '';

        if(!empty($this->error)) {
            if(!empty($color_array['red'])) {
                $this->color = $color_array['red'];
            }
            else {
                $this->color = 'red';
            }
            $alert = $this->error;
        }
        elseif(!empty($this->danger)) {
            if(!empty($color_array['orange'])) {
                $this->color = $color_array['orange'];
            }
            else {
                $this->color = 'orange';
            }
            $alert = $this->danger;
        }
        elseif(!empty($this->success)) {
            if(!empty($color_array['green'])) {
                $this->color = $color_array['green'];
            }
            else {
                $this->color = 'green';
            }
            $alert = $this->success;
        }
        elseif(!empty($this->info)) {
            if(!empty($color_array['blue'])) {
                $this->color = $color_array['blue'];
            }
            else {
                $this->color = 'blue';
            }
            $alert = $this->info;
        } 

        if(is_array($alert)) {
            $this->alert = $alert[0];
        }

        return $this->alert;
    }
    
    function print($alert_messages_template) {
        $this->get_alert($alert_messages_template['color_array']);

        if($this->alert) {
            echo $alert_messages_template['html_header'];
            echo '<span style="color:'.$this->color.'">'.$this->alert.'</span>';
            echo $alert_messages_template['html_footer'];
        }
    }
}
?>