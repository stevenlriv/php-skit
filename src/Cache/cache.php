<?php
class Cache {
    private $memcached;

    public function __construct($key = '', $prefix = '', $ip_server = '127.0.0.1') {
        $this->memcached = new Memcached($key);

        $this->memcached->setOption(Memcached::OPT_COMPRESSION, true);
        $this->memcached->setOption(Memcached::SERIALIZER_JSON, true);
        $this->memcached->setOption(Memcached::OPT_PREFIX_KEY, $prefix);

        $this->memcached->addServer($ip_server, 11211);

        if(MEMCACHED_DELETE_ALL) {
            $this->delete_all();
        }
    }

    public function get($name) {
        $key = $this->generate_key($name);
        $json = $this->memcached->get($key);

        if($json) {
            return json_decode($json, true);
        }

        return false;
    }

    public function get_string($name) {
        $key = $this->generate_key($name);
        $string = $this->memcached->get($key);

        if($string) {
            return $string;
        }

        return false;
    }

    public function set($name, $array, $duration_in_seconds) {
        $key = $this->generate_key($name);
        $json = json_encode($array);

        if($this->memcached->set($key, $json, $duration_in_seconds)) {
            return true;
        }

        return false;
    }

    public function set_string($name, $string, $duration_in_seconds) {
        $key = $this->generate_key($name);

        if($this->memcached->set($key, $string, $duration_in_seconds)) {
            return true;
        }

        return false;
    }

    public function increment($name) {
        $key = $this->generate_key($name);

        $this->memcached->increment($key);
    }

    public function delete($name) {
        $key = $this->generate_key($name);

        $this->memcached->delete($key);
    }

    public function delete_all() {
        $this->memcached->flush(2);
    }
    
    private function generate_key($name) {
        return 'key_'.md5($name);
    }
}
?>