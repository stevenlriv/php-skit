<?php
// @ https://jsonapi.org/format/
class RestAPI {
    private $http;
    private $key_tables = array();
    private $allowed_tables = array();
    private $actions_allowed = array();

    public function __construct() {
        $this->http = new HttpURI();
    }

    public function run() {
        $request = str_replace('/api/', '', $this->http->get_uri());
        $split_request = explode('/', $request);

        $table_public_name = $split_request[0];
        $value = $split_request[1];

        if(!empty($this->allowed_tables[$table_public_name]) && !empty($value)) {
            header('Content-Type: application/json');

            switch($_SERVER['REQUEST_METHOD']) {
                case ("GET" && !empty($this->actions_allowed[$table_public_name]['GET'])):
                    $array = array(
                        0 => array('column' => $this->key_tables[$table_public_name], 'condition' => 'AND', 'command' => '=', 'value' => $value)
                    );
                    $response = select_mysql_data($this->allowed_tables[$table_public_name], 'all', '', $array);

                    if($response) {
                        http_response_code(200);
                    }
                    else {
                        http_response_code(404);
                        $response['errors'] =  array(
                            'status' => '404',
                            'title' => 'Not found',
                            'detail' => 'Record was not found'
                        );
                    }
            
                    echo json_encode($response);
                    break;
                case ("POST" && !empty($this->actions_allowed[$table_public_name]['POST'])):
                    $post = json_decode(file_get_contents('php://input'), true);
                    $array = array();
        
                    foreach($post as $id => $value) {
                        $array[] = array('column' => $id, 'value' => $value);
                    }
                    $response = insert_mysql_data($this->allowed_tables[$table_public_name], $array);

                    if($response) {
                        http_response_code(201);
                        $response['success'] =  array(
                            'status' => '201',
                            'title' => 'Created',
                            'detail' => 'Record was created'
                        );
                    }
                    else {
                        http_response_code(400);
                        $response['errors'] =  array(
                            'status' => '400',
                            'title' => 'Failed',
                            'detail' => 'Record failed to be created'
                        );
                    }

                    echo json_encode($response);
                    break;
            
                case ("PUT" && !empty($this->actions_allowed[$table_public_name]['PUT'])):
                    $post = json_decode(file_get_contents('php://input'), true);
                    $array = array();
        
                    foreach($post as $id => $value) {
                        $array[] = array('column' => $id, 'value' => $value);
                    }
                    $response = update_mysql_data($this->allowed_tables[$table_public_name], '', $array);

                    if($response) {
                        http_response_code(200);
                        $response['success'] =  array(
                            'status' => '200',
                            'title' => 'Success',
                            'detail' => 'Record was updated'
                        );
                    }
                    else {
                        http_response_code(404);
                        $response['errors'] =  array(
                            'status' => '404',
                            'title' => 'Not found',
                            'detail' => 'Record failed to be updated or was not found.'
                        );
                    }

                    echo json_encode($response);
                    break;
            
                case ("DELETE" && !empty($this->actions_allowed[$table_public_name]['DELETE'])):
                    $array = array(
                        0 => array('column' => $this->key_tables[$table_public_name], 'condition' => 'AND', 'command' => '=', 'value' => $value)
                    );
                    $response = delete_mysql_data($this->allowed_tables[$table_public_name], '', $array);

                    if($response) {
                        http_response_code(200);
                        $response['success'] =  array(
                            'status' => '200',
                            'title' => 'Success',
                            'detail' => 'Record was deleted'
                        );
                    }
                    else {
                        http_response_code(404);
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
            $this->http->redirect_home();
        }
    }

    public function add_allow_tables($public_name, $table, $key, $actions_allowed = 1) {
        if($actions_allowed==2) {
            $this->actions_allowed[$public_name]['GET'] = true;
            $this->actions_allowed[$public_name]['POST'] = true;
        }
        elseif($actions_allowed==3) {
            $this->actions_allowed[$public_name]['GET'] = true;
            $this->actions_allowed[$public_name]['POST'] = true;
            $this->actions_allowed[$public_name]['PUT'] = true;
        }
        elseif($actions_allowed==4) {
            $this->actions_allowed[$public_name]['GET'] = true;
            $this->actions_allowed[$public_name]['POST'] = true;
            $this->actions_allowed[$public_name]['PUT'] = true;
            $this->actions_allowed[$public_name]['DELETE'] = true;
        }
        else {
            $this->actions_allowed[$public_name]['GET'] = true;
        }
        $this->allowed_tables[$public_name] = $table;
        $this->key_tables[$public_name] = $key;
    }
}
?>