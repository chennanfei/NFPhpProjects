<?php
require_once 'Scorpion/Utility/NFUtil.php';
require_once 'model/service/BaseService.php';
require_once 'model/entity/GatewayImage.php';

class GatewayImageService extends BaseService {
    public function getImages() {
        $images = $this->dbService->query('select g from GatewayImage g order by g.displayOrder');
        return $images;
    }
    
    public function saveImage(array $data) {
        $time = NFUtil::now();
        if (!array_key_exists('id', $data)) {
            $data['createdTime'] = $time;
        }
        $data['updatedTime'] = $time;

        $image = new GatewayImage;
        $image->initialize($data);
        if ($image->isValid()) {
            $this->dbService->save($image);
            print_r('saved successfully');
        } else {
            print_r('invalid image');
        }
        
        return $image;
    }
}
?>