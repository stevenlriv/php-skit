<?php
class Cron {
    private $current_time;
    private $array_includes = array();
    private $debug_email_text;
    private $cron_array = array();

    public function __construct() {
        $this->current_time = time();
    }

    public function run($name, $run_every_minutes, $send_email = false) {
        $this->set_up_cron($name);
        if($this->current_time>$this->cron_array[$name]['next_run']) {
            $start_time = time();
            update_cron($name, $start_time+($run_every_minutes*60));
            $this->print_debug('Start Cron Jobs: '.$name, $start_time);

            foreach($this->array_includes[$name] as $id => $value) {
                require_once $_SERVER['DOCUMENT_ROOT'].$value;
            }

            $end_time = time();
            $this->print_debug('Minutes it took Cron Jobs: '.$name, $this->how_many_minutes($start_time, $end_time));
            $this->print_debug('End Cron Jobs: '.$name, $end_time);

            //send email with info of the cronjobs
            //if enabled
            if($send_email==true) {
                
            }
        }
    }

    public function set($name, $path) {
        $this->array_includes[$name][] = $path;
    }

    private function print_debug($text, $value = '') {
        if($value!='') {
            $this->$debug_email_text = $this->$debug_email_text.'- '.$text.' - '.$value.'<br /><br />';
        }
        else {
            $this->$debug_email_text = $this->$debug_email_text.'- '.$text.'<br /><br />';
        }
        new_record($text, $value);

        if(DEBUG==true) {
            echo "--- --- --- --- --- --- --- ---\n";
            if($value!='') {
                echo "{$text} - {$value} \n";
            }
            else {
                echo "{$text} \n";
            }
            echo "--- --- --- --- --- --- --- ---\n\n\n";
        }
    }

    private function how_many_minutes($start_time, $end_time) {
        $minutes = ($end_time - $start_time)/60;

        $minutes = round($minutes, 4);

        return $minutes;
    }

    private function set_up_cron($name) {
        if(!get_cron_by_name($name)) {
            new_cron($name, 0);
        }
        $this->cron_array[$name] = get_cron_by_name($name);
    }
}
?>