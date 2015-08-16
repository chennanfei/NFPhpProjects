<?php
/**
@Entity
@Table(name="projects")
*/
class Project {
    const STATUS_NEW = 1;
    const STATUS_PUBLISHED = 2;

    /** @id @Column(type="integer") @GeneratedValue */
    protected $id;
    
    /** @Column(type="string", name="chinese_address") */
    private $chineseAddress;
    
    /** @Column(type="string", name="chinese_description") */
    private $chineseDescription;
    
    /** @Column(type="string", name="chinese_title") */
    private $chineseTitle;
    
    /** @Column(type="string", name="project_date") */
    private $date;
    
    /** @Column(type="integer", name="display_order") */
    private $displayOrder;
    
    /** @Column(type="string", name="english_address") */
    private $englishAddress;
    
    /** @Column(type="string", name="english_description") */
    private $englishDescription;
    
    /** @Column(type="string", name="english_title") */
    private $englishTitle;
    
    /** @Column(type="integer", name="status") */
    private $status;
    
    /** @Column(type="string", name="program_id") */
    private $programId;
    
    /** @Column(type="boolean", name="show_description") */
    private $showDescription;
    
    private $contentId;
    
    public function __construct() {
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
    
    public function getDisplayOrder() {
        return $this->displayOrder;
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
    
    public function getProgramId() {
        return $this->programId;
    }
    
    public function getContentId() {
        return '';
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
    
    public function setDisplayOrder($order) {
        $this->displayOrder = $order;
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
    
    public function setProgramId($programId) {
        $this->programId = $programId;
    }
}
?>