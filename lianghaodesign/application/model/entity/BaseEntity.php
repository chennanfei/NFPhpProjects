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
}
?>