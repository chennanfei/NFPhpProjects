<?php
class BaseEntity {
    private $errors;

    public function initialize(array $data) {
        foreach ($data as $name => $value) {
            $setter = 'set' . ucfirst($name);
            if (method_exists($this, $setter)) {
                $this->$setter($value);
            }
        }
    }
    
    public function getId() {
        return $this->id;
    }
    
    public function getCreator() {
        return $this->creator;
    }
    
    public function getCreatedTime() {
        return $this->createdTime;
    }
    
    public function getUpdatedTime() {
        return $this->updatedTime;
    }
    
    public function getDisplayOrder() {
        return $this->displayOrder;
    }

    public function setId($id) {
        $this->id = $id;
    }
    
    public function setCreator($creator) {
        $this->creator = $creator;
    }
    
    public function setCreatedTime($time) {
        $this->createdTime = $time;
    }
    
    public function setUpdatedTime($time) {
        $this->updatedTime = $time;
    }
    
    public function setDisplayOrder($order) {
        $this->displayOrder = is_int($order) ? $order : (int) $order;
    }
    
    public function getErrors() {
        $this->validate();
        return $this->errors;
    }
    
    public function isValid($forceRefresh = false) {
        $this->validate();
        return count($this->errors) == 0;
    }
    
    private function validate($forceRefresh = false) {
        if (!$forceRefresh && isset($this->errors)) {
            return;
        }
        
        $this->errors = array();
        $fields = get_class_vars(get_class($this));
        foreach ($fields as $name => $value) {
            $validate = 'validate' . ucfirst($name);
            if (method_exists($this, $validate)) {
                try {
                    $this->$validate();
                } catch (Exception $e) {
                    array_push($this->errors, array('field' => $name, 'message' => $e->getMessage()));
                }
            }
        }
    }
    
    protected function validateDisplayOrder() {
        if ($this->displayOrder < 1 || $this->displayOrder > 100) {
            throw new Exception('displayOrder should be between 1 and 100');
        }
    }
}
?>