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
        $value = '';
        if(!empty($split_request[1])) {
            $value = $split_request[1];
        }

        if(!empty($this->allowed_tables[$table_public_name])) {
            header('Content-Type: application/json');

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
            $this->http->redirect_home();
        }
    }

    public function add_allow_tables($public_name, $table, $key_get, $key_delete = '', $actions_allowed = 1) {
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
        $this->key_tables[$public_name]['GET'] = $key_get;
        $this->key_tables[$public_name]['DELETE'] = $key_delete;
    }
}
?>