<?php
class AlertMessages {
    private $error = array();
    private $danger = array();
    private $success = array();
    private $info = array();
    private $color;
    private $alert;

    private $template_color_array = array();
    private $template_header;
    private $template_footer;

    public function __construct() {
    }

    public function new_error($alert) {
        $this->error[] = $alert;
    }

    public function new_danger($alert) {
        $this->danger[] = $alert;
    }

    public function new_success($alert) {
        $this->success[] = $alert;
    }

    public function new_info($alert) {
        $this->info[] = $alert;
    }

    public function is_error() {
        if($this->get_type()=="red") {
            return true;
        }

        return false;
    }

    public function is_success() {
        if($this->get_type()=="green") {
            return true;
        }

        return false;
    }

    public function set_template_color_array($array) {
        $this->template_color_array = $array;
    }

    public function set_template_header($html) {
        $this->template_header = $html;
    }

    public function set_template_footer($html) {
        $this->template_footer = $html;
    }
    
    public function print() {
        $this->get_alert();

        if($this->alert) {
            echo $this->template_header;
            echo '<span style="color:'.$this->color.'">'.$this->alert.'</span>';
            echo $this->template_footer;
        }
    }

    private function get_type() {
        $this->get_alert();
        
        return $this->color;
    }

    private function get_alert() {
        $alert = '';

        if(!empty($this->error)) {
            if(!empty($this->template_color_array['red'])) {
                $this->color = $this->template_color_array['red'];
            }
            else {
                $this->color = 'red';
            }
            $alert = $this->error;
        }
        elseif(!empty($this->danger)) {
            if(!empty($this->template_color_array['orange'])) {
                $this->color = $this->template_color_array['orange'];
            }
            else {
                $this->color = 'orange';
            }
            $alert = $this->danger;
        }
        elseif(!empty($this->success)) {
            if(!empty($this->template_color_array['green'])) {
                $this->color = $this->template_color_array['green'];
            }
            else {
                $this->color = 'green';
            }
            $alert = $this->success;
        }
        elseif(!empty($this->info)) {
            if(!empty($this->template_color_array['blue'])) {
                $this->color = $this->template_color_array['blue'];
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
}
?>