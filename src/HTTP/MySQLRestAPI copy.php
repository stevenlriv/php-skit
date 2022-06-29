<?php
// @ https://jsonapi.org/format/
class MySQLRestAPI {
    private $http;
    private $http_uri;
    private $key_tables = array();
    private $allowed_tables = array();
    private $_actions_allowed;
    private $actions_allowed = array();

    public function __construct() {
        $this->http = new HttpURI();
    }

    public function set_uri($uri) {
        $this->http_uri = $uri;
    }

    public function run() {
        $request = str_replace($this->http_uri, '', $this->http->get_uri());
        $split_request = explode('/', $request);

        $table_public_name = '';
        $value = '';
        if(!empty($split_request[0])) {
            $table_public_name = $split_request[0];
        }
        if(!empty($split_request[1])) {
            $value = $split_request[1];
        }

        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Max-Age: 3600");

        if(!empty($this->allowed_tables[$table_public_name])) {
            header("Access-Control-Allow-Methods: {$this->_actions_allowed}");
            header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

            switch($_SERVER['REQUEST_METHOD']) {
                case ("GET"):
                    // curl 'https://host2:8890/api/usr_meta/1'  
                    if(empty($this->actions_allowed[$table_public_name]['GET'])) {
                        break;
                    }

                    $array = array(
                        0 => array('column' => $this->key_tables[$table_public_name]['GET'], 'condition' => 'AND', 'command' => '=', 'value' => $value)
                    );
                    $response = select_mysql_data($this->allowed_tables[$table_public_name], 'all', '', $array);

                    if($response) {
                        http_response_code(200);
                    }
                    else {
                        http_response_code(404);
                        $response = array();
                        $response['errors'] =  array(
                            'status' => '404',
                            'title' => 'Not found',
                            'detail' => 'Record was not found'
                        );
                    }
            
                    echo json_encode($response);
                    break;
                case ("POST"):
                    // curl -X POST 'https://host2:8890/api/usr_meta' -d "id_user=2&meta_key=example2&meta_value=lol"  
                    if(empty($this->actions_allowed[$table_public_name]['POST'])) {
                        break;
                    }

                    $post = array();
                    parse_str(file_get_contents('php://input'), $post);

                    $array = array();
                    foreach($post as $id => $value) {
                        $array[] = array('column' => $id, 'value' => $value);
                    }
                    $response = insert_mysql_data($this->allowed_tables[$table_public_name], $array);

                    if($response) {
                        http_response_code(201);
                        new_record('REST API POST', $array);

                        $response = array();
                        $response['success'] =  array(
                            'status' => '201',
                            'title' => 'Created',
                            'detail' => 'Record was created'
                        );
                    }
                    else {
                        http_response_code(400);
                        $response = array();
                        $response['errors'] =  array(
                            'status' => '400',
                            'title' => 'Failed',
                            'detail' => 'Record failed to be created'
                        );
                    }

                    echo json_encode($response);
                    break;
            
                case ("PUT"):
                    // curl -X PUT 'https://host2:8890/api/usr_meta' -d "id_user=8&meta_key=santa&meta_value=claus&id_meta=2"  
                    if(empty($this->actions_allowed[$table_public_name]['PUT'])) {
                        break;
                    }

                    $post = array();
                    parse_str(file_get_contents('php://input'), $post);

                    $array = array();
                    foreach($post as $id => $value) {
                        $array[] = array('column' => $id, 'value' => $value);
                    }
                    $response = update_mysql_data($this->allowed_tables[$table_public_name], '', $array);

                    if($response) {
                        http_response_code(200);
                        new_record('REST API PUT', $array);

                        $response = array();
                        $response['success'] =  array(
                            'status' => '200',
                            'title' => 'Success',
                            'detail' => 'Record was updated'
                        );
                    }
                    else {
                        http_response_code(404);
                        $response = array();
                        $response['errors'] =  array(
                            'status' => '404',
                            'title' => 'Not found',
                            'detail' => 'Record failed to be updated or was not found.'
                        );
                    }

                    echo json_encode($response);
                    break;
            
                case ("DELETE"):
                    // curl -X DELETE 'https://host2:8890/api/usr_meta/9' 
                    if(empty($this->actions_allowed[$table_public_name]['DELETE'])) {
                        break;
                    }

                    $array = array(
                        0 => array('column' => $this->key_tables[$table_public_name]['DELETE'], 'condition' => 'AND', 'command' => '=', 'value' => $value)
                    );
                    $response = delete_mysql_data($this->allowed_tables[$table_public_name], '', $array);
                    if($response) {
                        http_response_code(200);
                        new_record('REST API DELETE', $array);

                        $response = array();
                        $response['success'] =  array(
                            'status' => '200',
                            'title' => 'Success',
                            'detail' => 'Record was deleted'
                        );
                    }
                    else {
                        http_response_code(404);
                        $response = array();
                        $response['errors'] =  array(
                            'status' => '404',
                            'title' => 'Not found',
                            'detail' => 'Record failed to be deleted or was not found.'
                        );
                    }

                    echo json_encode($response);
                    break;
            }
        }
        else {
            http_response_code(400);
            header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");

            $response['errors'] =  array(
                'status' => '400',
                'title' => 'Invalid Syntax',
                'detail' => 'Mistyping of the API endpoint'
            );
            echo json_encode($response);
        }
    }

    public function add_allow_tables($actions_allowed, $public_name, $table, $key_get, $key_delete = '') {
        if((substr_count($actions_allowed, "GET") > 0)) {
            $this->actions_allowed[$public_name]['GET'] = true;
            $this->_actions_allowed = $this->_actions_allowed.'GET,';
        }
        if((substr_count($actions_allowed, "POST") > 0)) {
            $this->actions_allowed[$public_name]['POST'] = true;
            $this->_actions_allowed = $this->_actions_allowed.'POST,';
        }
        if((substr_count($actions_allowed, "PUT") > 0)) {
            $this->actions_allowed[$public_name]['PUT'] = true;
            $this->_actions_allowed = $this->_actions_allowed.'PUT,';
        }
        if((substr_count($actions_allowed, "DELETE") > 0)) {
            $this->actions_allowed[$public_name]['DELETE'] = true;
            $this->_actions_allowed = $this->_actions_allowed.'DELETE,';
        }
        $this->_actions_allowed = substr($this->_actions_allowed, 0, -1);

        $this->allowed_tables[$public_name] = $table;
        $this->key_tables[$public_name]['GET'] = $key_get;
        $this->key_tables[$public_name]['DELETE'] = $key_delete;
    }
}
?>