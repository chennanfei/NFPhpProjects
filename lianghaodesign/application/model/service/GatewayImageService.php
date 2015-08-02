<?php
require_once 'Scorpion/Utility/NFUtil.php';
require_once 'model/service/BaseService.php';
require_once 'model/entity/GatewayImage.php';

class GatewayImageService extends BaseService {
    public function getImage($id) {
        $images = $this->dbService->query('select g from GatewayImage g where g.id=:id',
                                         array('id' => $id));
        if (count($images) > 0) {
            return $images[0];
        }
        
        if (!isset($image)) {
            throw new Exception('Image was not found');
        }
    }
    
    public function getImages() {
        $images = $this->dbService->query('select g from GatewayImage g order by g.displayOrder');
        return $images;
    }
    
    public function saveImage(array $data) {
        $time = NFUtil::now();
        $data['updatedTime'] = $time;
        if (array_key_exists('id', $data)) {
            $image = $this->getImage($data['id']);
            $image->initialize($data);
        } else {
            $image = new GatewayImage;
            $data['createdTime'] = $time;
            $image->initialize($data);
        }
        
        if ($image->isValid()) {
            $this->dbService->save($image);
        }
        
        return $image;
    }
    
    public function removeImage($id) {
        $image = $this->getImage($id);
        $this->dbService->remove($image);
    }
}
?>