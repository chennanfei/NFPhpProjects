<?php
/**
@Entity
@Table(name="project")
*/
class Project {
    const STATUS_NEW = 1;
    const STATUS_PUBLISHED = 2;

    /** @id @Column(type="integer", auto_increament) */
    private $id;
    
    /** @Column(type="string", name="cn_address") */
    private $chineseAddress;
    
    /** @Column(type="string", name="cn_description") */
    private $chineseDescription;
    
    /** @Column(type="string", name="cn_title") */
    private $chineseTitle;
    
    /** @Column(type="string") */
    private $date;
    
    /** @Column(type="string", name="en_address") */
    private $englishAddress;
    
    /** @Column(type="string", name="en_description") */
    private $englishDescription;
    
    /** @Column(type="string", name="en_title") */
    private $englishTitle;
    
    /** @Column(type="integer") */
    private $status;
    
    public function __construct() {
        parent::__construct();
        
        $this->status = self::STATUS_NEW;
    }
    
    public function getId() {
        return $this->id;
    }
    
    public function getChineseAddress() {
        return $this->chineseAddress;
    }
    
    public function getChineseDescription() {
        return $this->chineseDescription;
    }
    
    public function getChineseTitle() {
        return $this->chineseTitle;
    }
    
    public function getDate() {
        return $this->date;
    }
    
    public function getEnglishAddress() {
        return $this->englishAddress;
    }
    
    public function getEnglishDescription() {
        return $this->englishDescription;
    }
    
    public function getEnglishTitle() {
        return $this->englishTitle;
    }
    
    public function setId($id) {
        return $this->id = $id;
    }
    
    public function setChineseAddress($cnAddress) {
        return $this->chineseAddress = $cnAddress;
    }
    
    public function setChineseDescription($cnDesc) {
        return $this->chineseDescription = $cnDesc;
    }
    
    public function setChineseTitle($cnTitle) {
        return $this->chineseTitle = $cnTitle;
    }
    
    public function setDate($date) {
        $this->date = $date;
    }
    
    public function setEnglishAddress($enAddr) {
        return $this->englishAddress = $enAddr;
    }
    
    public function setEnglishDescription($enDesc) {
        return $this->englishDescription = $enDesc;
    }
    
    public function setEnglishTitle($enTitle) {
        return $this->englishTitle = $enTitle;
    }
}
?>