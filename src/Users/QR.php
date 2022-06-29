<?php
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\Image\ImagickImageBackEnd;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;

class QR {
    private $qr_image_base64;

    public function __construct() {
    }

    public function get_image_base64() {
        return $this->qr_image_base64;
    }

    public function create($string) {
        $http = new HttpURI();
    
        $renderer = new ImageRenderer(
            new RendererStyle(400),
            new ImagickImageBackEnd()
        );
        
        $writer = new Writer($renderer);
        $base64 = base64_encode($writer->writeString($string));

        if($base64) {
            //<img src="data:image/png;base64, '.$this->get_image_base64().'" />
            $this->qr_image_base64 = $base64;
            return true;
        }

        return false;
    }
}
?>