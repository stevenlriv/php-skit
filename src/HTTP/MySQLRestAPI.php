<?php
// @ https://jsonapi.org/format/
class MySQLRestAPI extends RestAPI {
    private $key_tables = array();

    public function __construct() {
        $this->http = new HttpURI();
    }
    
    public function prepare() {

/*
        $array = array(
            0 => array('column' => $this->key_tables[$this->route]['GET'], 'condition' => 'AND', 'command' => '=', 'value' => $this->route_value)
        );
        $response = select_mysql_data($this->allowed_tables[$table_public_name], 'all', '', $array);
        $response = $this->responses[$this->route]['GET'];


        $post = array();
        parse_str(file_get_contents('php://input'), $post);

        $array = array();
        foreach($post as $id => $value) {
            $array[] = array('column' => $id, 'value' => $value);
        }
        $response = insert_mysql_data($this->allowed_tables[$table_public_name], $array);
        $response = $this->responses[$this->route]['POST'];



        $post = array();
        parse_str(file_get_contents('php://input'), $post);

        $array = array();
        foreach($post as $id => $value) {
            $array[] = array('column' => $id, 'value' => $value);
        }
        $response = update_mysql_data($this->allowed_tables[$table_public_name], '', $array);
        $response = $this->responses[$this->route]['PUT'];



        $array = array(
            0 => array('column' => $this->key_tables[$table_public_name]['DELETE'], 'condition' => 'AND', 'command' => '=', 'value' => $value)
        );
        $response = delete_mysql_data($this->allowed_tables[$table_public_name], '', $array);
        $response = $this->responses[$this->route]['DELETE'];
        */
    }

    public function add_allow_tables($actions_allowed, $public_name, $table, $key_get, $key_delete = '') {
        $this->add_allow_routes($actions_allowed, $public_name, $table);

        $this->key_tables[$public_name]['GET'] = $key_get;
        $this->key_tables[$public_name]['DELETE'] = $key_delete;
    }
}
?>