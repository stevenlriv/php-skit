<?php
// @ https://jsonapi.org/format/
// @ https://www.vinaysahni.com/best-practices-for-a-pragmatic-restful-api

class RestAPI {
    protected $http;
    protected $http_uri;
    protected $cache;
    protected $_actions_allowed = array();
    protected $allowed_routes = array();
    protected $actions_allowed = array();
    protected $responses = array();
    protected $responses_messages = array();
    protected $route;
    protected $route_value;
    protected $require_auth = true;
    protected $rate_limit_limit = 10; // 10 calls 
    protected $rate_limit_reset = 10; // per 10 seconds
    protected $rate_limit_remaining = 10;

    public function __construct() {
        $this->http = new HttpURI();
        $this->jwt = new SkitJWT();
        $this->cache = new Cache('rest_api', 'api_');
    }

    function get_current_route() {
        return $this->route;
    }

    function get_current_route_value() {
        return $this->route_value;
    }

    public function set_uri($uri) {
        $this->http_uri = $uri;

        $request = str_replace($this->http_uri, '', $this->http->get_uri());
        $split_request = explode('/', $request);

        // lets verify if the route has no value
        if($split_request[0]=='' && !empty($split_request[1])) {
            $split_request[0] = $split_request[1];
            $split_request[1] = '';
        }

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

    public function set_responses($method, $route, $response, $message_success = '', $message_errors = '') {
        $this->responses[$route][$method] = $response;

        $this->responses_messages[$route][$method]['success'] = $message_success;
        $this->responses_messages[$route][$method]['errors'] = $message_errors;
    }

    public function no_auth_needed() {
        $this->require_auth = false;
    }

    public function run() {
        $this->set_headers();

        ob_start('ob_gzhandler');

        if(!$this->is_https() || !$this->is_auth() || $this->is_rate_limitting()) {
            return;
        }

        $array_record = array(
            0 => array('route' => $this->route, 'value' => $this->route_value)
        );

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
                        new_record('REST API GET | SUCCESS', $array_record);
                    }
                    else {
                        http_response_code(404);
                        new_record('REST API POST | ERRORS', $array_record);

                        $response = array();
                        $response['errors'] =  array(
                            'status' => '404',
                            'title' => 'Not found',
                            'detail' => 'Record was not found'
                        );

                        if(!empty($this->responses_messages[$this->route]['GET']['errors'])) {
                            $response['errors']['detail'] = $this->responses_messages[$this->route]['GET']['errors'];
                        }
                    }
            
                    echo json_encode($response, JSON_PRETTY_PRINT);
                    break;
                case ("POST"):
                    // curl -X POST 'https://host2:8890/api/usr_meta' -d "id_user=2&meta_key=example2&meta_value=lol"  
                    if(empty($this->actions_allowed[$this->route]['POST'])) {
                        break;
                    }

                    $response = $this->responses[$this->route]['POST'];
                    if($response) {
                        http_response_code(201);
                        new_record('REST API POST | SUCCESS', $array_record);

                        $response = array();
                        $response['success'] =  array(
                            'status' => '201',
                            'title' => 'Success',
                            'detail' => 'Record was created'
                        );

                        if(!empty($this->responses_messages[$this->route]['POST']['success'])) {
                            $response['success']['detail'] = $this->responses_messages[$this->route]['POST']['success'];
                        }
                    }
                    else {
                        http_response_code(400);
                        new_record('REST API POST | ERRORS', $array_record);

                        $response = array();
                        $response['errors'] =  array(
                            'status' => '400',
                            'title' => 'Failed',
                            'detail' => 'Record failed to be created'
                        );

                        if(!empty($this->responses_messages[$this->route]['POST']['errors'])) {
                            $response['errors']['detail'] = $this->responses_messages[$this->route]['POST']['errors'];
                        }
                    }

                    echo json_encode($response, JSON_PRETTY_PRINT);
                    break;
            
                case ("PUT"):
                    // curl -X PUT 'https://host2:8890/api/usr_meta' -d "id_user=8&meta_key=santa&meta_value=claus&id_meta=2"  
                    if(empty($this->actions_allowed[$this->route]['PUT'])) {
                        break;
                    }

                    $response = $this->responses[$this->route]['PUT'];
                    if($response) {
                        http_response_code(200);
                        new_record('REST API PUT | SUCCESS', $array_record);

                        $response = array();
                        $response['success'] =  array(
                            'status' => '200',
                            'title' => 'Success',
                            'detail' => 'Record was updated'
                        );

                        if(!empty($this->responses_messages[$this->route]['PUT']['success'])) {
                            $response['success']['detail'] = $this->responses_messages[$this->route]['PUT']['success'];
                        }
                    }
                    else {
                        http_response_code(404);
                        new_record('REST API PUT | ERRORS', $array_record);

                        $response = array();
                        $response['errors'] =  array(
                            'status' => '404',
                            'title' => 'Not found',
                            'detail' => 'Record failed to be updated or was not found.'
                        );

                        if(!empty($this->responses_messages[$this->route]['PUT']['errors'])) {
                            $response['errors']['detail'] = $this->responses_messages[$this->route]['PUT']['errors'];
                        }
                    }

                    echo json_encode($response, JSON_PRETTY_PRINT);
                    break;
            
                case ("DELETE"):
                    // curl -X DELETE 'https://host2:8890/api/usr_meta/9' 
                    if(empty($this->actions_allowed[$this->route]['DELETE'])) {
                        break;
                    }

                    $response = $this->responses[$this->route]['DELETE'];
                    if($response) {
                        http_response_code(200);
                        new_record('REST API DELETE | SUCCESS', $array_record);

                        $response = array();
                        $response['success'] =  array(
                            'status' => '200',
                            'title' => 'Success',
                            'detail' => 'Record was deleted'
                        );

                        if(!empty($this->responses_messages[$this->route]['DELETE']['success'])) {
                            $response['success']['detail'] = $this->responses_messages[$this->route]['DELETE']['success'];
                        }
                    }
                    else {
                        http_response_code(404);
                        new_record('REST API DELETE | ERRORS', $array_record);

                        $response = array();
                        $response['errors'] =  array(
                            'status' => '404',
                            'title' => 'Not found',
                            'detail' => 'Record failed to be deleted or was not found.'
                        );

                        if(!empty($this->responses_messages[$this->route]['DELETE']['errors'])) {
                            $response['errors']['detail'] = $this->responses_messages[$this->route]['DELETE']['errors'];
                        }
                    }

                    echo json_encode($response, JSON_PRETTY_PRINT);
                    break;
            }
        }
        else {
            http_response_code(400);
            new_record('REST API INVALID SYNTAX', $array_record);

            $response['errors'] =  array(
                'status' => '400',
                'title' => 'Invalid Syntax',
                'detail' => 'Mistyping of the API endpoint'
            );
            echo json_encode($response, JSON_PRETTY_PRINT);
        }

        ob_end_flush();
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

    protected function set_headers() {
        $methods = '';
        if(!empty($this->_actions_allowed[$this->route])) {
            $methods = $this->_actions_allowed[$this->route];
        }

        header("Access-Control-Allow-Headers: Access-Control-Allow-Headers, Access-Control-Allow-Origin, Authorization, X-Requested-With, Access-Control-Max-Age, Content-Type");
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: $methods");
        header("Access-Control-Max-Age: 3600");
        header("Content-Type: application/json; charset=UTF-8");

        header("X-Rate-Limit-Limit: {$this->rate_limit_limit}");
        header("X-Rate-Limit-Remaining: {$this->rate_limit_remaining}");
        header("X-Rate-Limit-Reset: ".time()+$this->rate_limit_reset."");
    }

    private function is_rate_limitting() {
        $id_user = get_ip_requester();
        if(!empty($this->jwt->array_token['login_method_id'])) {
            $id_user = $this->jwt->array_token['login_method_id'];
        }

        if(!$this->cache->get($id_user)) {
            $this->cache->set($id_user, array('count' => 1, 'reset' => time()+($this->rate_limit_reset)), $this->rate_limit_reset);
            $this->rate_limit_remaining = ($this->rate_limit_limit-1);
        }
        else {
            $array = $this->cache->get($id_user);
            $count = $array['count'];
            $reset = $array['reset'];

            if(time()>$reset) {
                $this->cache->delete($id_user);
                $this->rate_limit_remaining = $this->rate_limit_limit;
            }
            else {
                $count = $count + 1;
                $this->cache->set($id_user, array('count' => $count, 'reset' => $reset), $this->rate_limit_reset);
                $this->rate_limit_remaining = ($this->rate_limit_remaining-$count);
            }
        }

        if($this->rate_limit_remaining <= 0) {
            http_response_code(429);

            $response['errors'] =  array(
                'status' => '429',
                'title' => 'Too Many Requests',
                'detail' => 'Calling API too quickly, refer to documentation for limits'
            );
            echo json_encode($response, JSON_PRETTY_PRINT);

            return true;
        }

        return false;
    }

    private function is_auth() {
        if($this->require_auth && !$this->jwt->is_authenticated()) {
            header('WWW-Authenticate: Bearer realm="API AUTH"');
            http_response_code(401);

            $response['errors'] =  array(
                'status' => '401',
                'title' => 'Unauthorized',
                'detail' => 'Invalid credentials'
            );
            echo json_encode($response, JSON_PRETTY_PRINT);

            return false;
        }

        return true;
    }

    private function is_https() {
        if(empty($_SERVER["HTTPS"]) || $_SERVER["HTTPS"] !== "on") {
            http_response_code(403);

            $response['errors'] =  array(
                'status' => '403',
                'title' => 'Forbidden',
                'detail' => 'API only available using SSL'
            );
            echo json_encode($response, JSON_PRETTY_PRINT);

            return false;
        }

        return true;
    }
}
?>