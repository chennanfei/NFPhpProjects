<?php
class Program {
    private $chineseName;
    private $englishName;
    private $id;
    
    public function __construct($cnName, $enName, $id) {
        $this->chineseName = $cnName;
        $this->englishName = $enName;
        $this->id = $id;
    }
    
    public function getChineseName() {
        return $this->chineseName;
    }
    
    public function getEnglishName() {
        return $this->englishName;
    }
    
    public function getId() {
        return $this->id;
    }
}
?>