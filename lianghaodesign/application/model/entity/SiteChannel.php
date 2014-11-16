<?php
class SiteChannel {
    private $id;
    private $cnName;
    private $enName;
    private $programs;
    
    public function __construct($cnName, $enName, $id) {
        $this->cnName   = $cnName;
        $this->enName   = $enName;
        $this->id       = $id;
        $this->programs = array();
    }
    
    public function addProgram($program) {
        if (!isset($program)) {
            throw new Exception('Invalid program object');
        }

        array_push($this->programs, $program);
    }
    
    public function getChineseName() {
        return $this->cnName;
    }
    
    public function getEnglishName() {
        return $this->enName;
    }
    
    public function getId() {
        return $this->id;
    }
    
    public function getPrograms() {
        return $this->programs;
    }
}
?>
