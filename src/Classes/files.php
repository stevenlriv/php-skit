<?php
use Aws\S3\S3Client;
use League\Flysystem\AwsS3V3\AwsS3V3Adapter;
use League\Flysystem\Filesystem;

class Files {
    private $region;
    private $endpoint;
    private $bucket;
    private $client_url;

    private $filesystem;
    private $adapter;

    private $file_dir;
    private $upload_path;
    private $last_file_url;
    private $upload_status = false;

    public function __construct($key, $secret, $region, $endpoint, $bucket, $client_url = '') {
        $this->region = $region;
        $this->endpoint = $endpoint;
        $this->bucket = $bucket;
        $this->client_url = $client_url;

        $client = S3Client::factory([
            'credentials' => [
                'key' => $key,
                'secret' => $secret
            ],
            'region' => $this->region,
            'endpoint' => $this->endpoint,
            'version' => 'latest'
        ]);
    
        $this->adapter = new AwsS3V3Adapter($client, $this->bucket);
        $this->filesystem = new Filesystem($this->adapter);     
    }

    public function get_last_file_url() {
        $this->last_file_url = $this->client_url.'/'.$this->upload_path;

        return $this->last_file_url;
    }

    public function is_success() {
        if($this->upload_status) {
            return true;
        }
        
        return false;
    }

    public function upload_file($file_data, $dirname) {
        $this->file_dir  = "uploads/$dirname/".date('Y').'/'.date('F').'/'.date('d').'/';
        $random_filename = generate_not_secure_random_string()."_".$file_data['name'];
        $this->upload_path = $this->file_dir.$random_filename;
    
        $this->filesystem->writeStream($this->upload_path, fopen($file_data['tmp_name'], 'r+'), ['visibility' => 'public']);
        if($this->filesystem->has($this->upload_path)) {
            $this->upload_status = true;
            return true;
        }
    
        return false;
    }

    public function delete_file($file_url) {
        $path = explode(".com/", $file_url);
        $path = $path[1];

        $this->filesystem->delete($path);
        if(!$this->filesystem->has($path)) {
            $this->upload_status = true;
            return true;
        }
        
        return false;
    }
}
?>