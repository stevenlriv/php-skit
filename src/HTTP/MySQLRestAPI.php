<?php
class MySQLRestAPI extends RestAPI {
    public function add_allow_tables($actions_allowed, $public_name, $table, $key_get, $key_delete = '') {
        $this->add_allow_routes($actions_allowed, $public_name, $table);
        $this->key_tables[$public_name]['GET'] = $key_get;
        $this->key_tables[$public_name]['DELETE'] = $key_delete;

        if($_SERVER['REQUEST_METHOD'] == 'GET' && !empty($this->actions_allowed[$public_name]['GET'])) {
            $array = array(
                0 => array('column' => $this->key_tables[$public_name]['GET'], 'condition' => 'AND', 'command' => '=', 'value' => $this->route_value)
            );
            $this->set_responses('GET', $public_name, select_mysql_data($this->allowed_routes[$public_name], 'all', '', $array));
        }
        elseif($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($this->actions_allowed[$public_name]['POST'])) {
            $this->set_responses('POST', $public_name, insert_mysql_data($this->allowed_routes[$public_name], $this->route_value));
        }
        elseif($_SERVER['REQUEST_METHOD'] == 'PUT' && !empty($this->actions_allowed[$public_name]['PUT'])) {
            $this->set_responses('PUT', $public_name, update_mysql_data($this->allowed_routes[$public_name], '', $this->route_value));
        }
        elseif($_SERVER['REQUEST_METHOD'] == 'DELETE' && !empty($this->actions_allowed[$public_name]['DELETE'])) {
            $array = array(
                0 => array('column' => $this->key_tables[$public_name]['DELETE'], 'condition' => 'AND', 'command' => '=', 'value' => $this->route_value)
            );
            $this->set_responses('DELETE', $public_name, delete_mysql_data($this->allowed_routes[$public_name], '', $array));
        }
    }
}
?>