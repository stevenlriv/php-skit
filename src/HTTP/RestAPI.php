<?php
// @ https://jsonapi.org/format/

class RestAPI {
    protected $http;
    protected $http_uri;
    protected $_actions_allowed = array();
    protected $allowed_routes = array();
    protected $actions_allowed = array();
    protected $responses = array();
    protected $route;
    protected $route_value;

    public function __construct() {
        $this->http = new HttpURI();
        $this->jwt = new SkitJWT();
    }

    function get_current_route() {
        return $this->route;
    }

    function get_current_route_value() {
        return $this->route_value;
    }

    public function set_headers($methods = '') {
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Max-Age: 3600");

        if($methods!='') {
            header("Access-Control-Allow-Methods: $methods");
        }
    }

    public function set_uri($uri) {
        $this->http_uri = $uri;

        $request = str_replace($this->http_uri, '', $this->http->get_uri());
        $split_request = explode('/', $request);

        $route = '';
        $value = '';
        if(!empty($split_request[0])) {
            $route = $split_request[0];
        }
        if(!empty($split_request[1])) {
            $value = $split_request[1];
        }
        elseif($_SERVER['REQUEST_METHOD'] == 'POST' || $_SERVER['REQUEST_METHOD'] == 'PUT') {
            $post = array();
            parse_str(file_get_contents('php://input'), $post);

            $array = array();
            foreach($post as $id => $value) {
                $array[] = array('column' => $id, 'value' => $value);
            }
            $value = $array;
        }

        $this->route = $route;
        $this->route_value = $value;
    }

    public function set_responses($method, $route, $response) {
        $this->responses[$route][$method] = $response;
    }

    public function run($require_auth = false) {
        $methods = '';
        if(!empty($this->_actions_allowed[$this->route])) {
            $methods = $this->_actions_allowed[$this->route];
        }
        $this->set_headers($methods);

        if($require_auth && !$this->jwt->is_authenticated()) {
            http_response_code(403);

            $response['errors'] =  array(
                'status' => '403',
                'title' => 'Forbidden',
                'detail' => 'Wrong credentials'
            );
            echo json_encode($response);

            return;
        }

        if(!empty($this->allowed_routes[$this->route])) {
            switch($_SERVER['REQUEST_METHOD']) {
                case ("GET"):
                    // curl 'https://host2:8890/api/usr_meta/1'  
                    if(empty($this->actions_allowed[$this->route]['GET'])) {
                        break;
                    }

                    $response = $this->responses[$this->route]['GET'];
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
                    if(empty($this->actions_allowed[$this->route]['POST'])) {
                        break;
                    }

                    $array = array(
                        0 => array('route' => $this->route, 'value' => $this->route_value)
                    );

                    $response = $this->responses[$this->route]['POST'];
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
                    if(empty($this->actions_allowed[$this->route]['PUT'])) {
                        break;
                    }

                    $array = array(
                        0 => array('route' => $this->route, 'value' => $this->route_value)
                    );

                    $response = $this->responses[$this->route]['PUT'];
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
                    if(empty($this->actions_allowed[$this->route]['DELETE'])) {
                        break;
                    }

                    $array = array(
                        0 => array('route' => $this->route, 'value' => $this->route_value)
                    );

                    $response = $this->responses[$this->route]['DELETE'];
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

            $response['errors'] =  array(
                'status' => '400',
                'title' => 'Invalid Syntax',
                'detail' => 'Mistyping of the API endpoint'
            );
            echo json_encode($response);
        }
    }

    public function add_allow_routes($actions_allowed, $public_name, $route) {
        $this->_actions_allowed[$public_name] = '';
        
        if((substr_count($actions_allowed, "GET") > 0)) {
            $this->actions_allowed[$public_name]['GET'] = true;
            $this->_actions_allowed[$public_name] = $this->_actions_allowed[$public_name].'GET,';
        }
        if((substr_count($actions_allowed, "POST") > 0)) {
            $this->actions_allowed[$public_name]['POST'] = true;
            $this->_actions_allowed[$public_name] = $this->_actions_allowed[$public_name].'POST,';
        }
        if((substr_count($actions_allowed, "PUT") > 0)) {
            $this->actions_allowed[$public_name]['PUT'] = true;
            $this->_actions_allowed[$public_name] = $this->_actions_allowed[$public_name].'PUT,';
        }
        if((substr_count($actions_allowed, "DELETE") > 0)) {
            $this->actions_allowed[$public_name]['DELETE'] = true;
            $this->_actions_allowed[$public_name] = $this->_actions_allowed[$public_name].'DELETE,';
        }
        $this->_actions_allowed[$public_name] = substr($this->_actions_allowed[$public_name], 0, -1);
        $this->allowed_routes[$public_name] = $route;
    }
}
?>