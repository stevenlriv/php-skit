<?php
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\Image\ImagickImageBackEnd;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;

class QR {
    private $qr_image_uri;
    private $upload_path;
    private $dirname;

    public function __construct() {
        $this->dirname = 'public/_temp/QR';
        $this->upload_path = $this->dirname.'/'.generate_not_secure_random_string(50).'_qrcode.png';
    }

    public function get_image_uri() {
        return $this->qr_image_uri;
    }

    public function reset_folder() {
        $files = glob($this->dirname.'/*'); 
   
        foreach($files as $file) {
            if(is_file($file)) {
                unlink($file); 
            }
        }
    }

    public function create($string) {
        global $http;
    
        $renderer = new ImageRenderer(
            new RendererStyle(400),
            new ImagickImageBackEnd()
        );
        
        $writer = new Writer($renderer);
        $writer->writeFile($string, $this->upload_path);
    
        if(file_exists($this->upload_path)) {
            $this->qr_image_uri = $http->get_domain_url().'/'.$this->upload_path;
            
            return $this->qr_image_uri;
        }

        return false;
    }
}
?>