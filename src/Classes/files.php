<?php
use Aws\S3\S3Client;
use League\Flysystem\AwsS3V3\AwsS3V3Adapter;
use League\Flysystem\Filesystem;

class Files {
    private $file_dir;
    private $upload_filename;
    private $last_file_url;
    private $status = false;
    private $filesystem;
    private $adapter;

    function __construct() {
        $client = S3Client::factory([
            'credentials' => [
                'key' => DO_KEY,
                'secret' => DO_SECRETS
            ],
            'region' => DO_REGION,
            'endpoint' => DO_ENDPOINT,
            'version' => 'latest'
        ]);
    
        $this->adapter = new AwsS3V3Adapter($client, DO_BUCKET);
        $this->filesystem = new Filesystem($this->adapter);     
    }

    function get_last_file_url() {
        $url = 'https://'.DO_BUCKET.'.'.DO_REGION.'.digitaloceanspaces.com/';

        $this->last_file_url = $url.$this->upload_filename;
        return $this->last_file_url;
    }

    function is_success() {
        if($this->status) {
            return true;
        }
        
        return false;
    }

    function upload_file($file_data, $dirname) {
        $this->file_dir  = "uploads/$dirname/".date('Y').'/'.date('F').'/'.date('d').'/';
        $random_filename = generateNotSecureRandomString()."_".$file_data['name'];

        $this->upload_filename = $this->file_dir.$random_filename;
    
        $this->filesystem->writeStream($this->upload_filename, fopen($file_data['tmp_name'], 'r+'), ['visibility' => 'public']);
        if($this->filesystem->has($this->upload_filename)) {
            $this->status = true;
            return true;
        }
    
        return false;
    }

    // we will explode on "https://[subdomain].nyc3.digitaloceanspaces.com/" and get the file path
    // example: https://[subdomain].nyc3.digitaloceanspaces.com/uploads/listings/2020/May/26/1.jpg
    // explode [0] = https://[subdomain].nyc3.digitaloceanspaces.com/
    // explode [1] = uploads/listings/2020/May/26/1.jpg
    function delete_file($file_url) {
        $path = explode(".com/", $file_url);
        $path = $path[1];

        $this->filesystem->delete($path);
        if(!$this->filesystem->has($path)) {
            $this->status = true;
            return true;
        }
        
        return false;
    }
}
?>