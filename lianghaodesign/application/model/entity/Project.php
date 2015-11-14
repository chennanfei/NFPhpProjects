<?php
require_once 'model/entity/BaseEntity.php';
require_once 'Scorpion/Utility/NFUtil.php';

/**
@Entity
@Table(name="projects")
*/
class Project extends BaseEntity {
    const STATUS_NEW = 1;
    const STATUS_PUBLISHED = 2;

    /** @id @Column(type="integer") @GeneratedValue */
    protected $id;
    
    /** @Column(type="string", name="chinese_address") */
    protected $chineseAddress;
    
    /** @Column(type="string", name="chinese_description") */
    protected $chineseDescription;
    
    /** @Column(type="string", name="chinese_title") */
    protected $chineseTitle;
    
    /** @Column(type="string", name="project_date") */
    protected $date;
    
    /** @Column(type="integer", name="display_order") */
    protected $displayOrder;
    
    /** @Column(type="string", name="english_address") */
    protected $englishAddress;
    
    /** @Column(type="string", name="english_description") */
    protected $englishDescription;
    
    /** @Column(type="string", name="english_title") */
    protected $englishTitle;
    
    /** @Column(type="integer", name="status") */
    protected $status;
    
    /** @Column(type="string", name="program_id") */
    protected $programId;
    
    /** @Column(type="boolean", name="show_description") */
    protected $showDescription;
    
    /** @Column(type="string", name="creator") */
    protected $creator;

    /** @Column(type="string", name="created_time") */
    protected $createdTime;
    
    /** @Column(type="string", name="updated_time") */
    protected $updatedTime;
    
    protected $contentId;
    
    private $previewedImages;
    
    private $images;
    
    public function initialize(array $data) {
        if (!array_key_exists($data, 'status')) {
            $data['status'] = Project::STATUS_NEW;
        }
        
        if ($data['showDescription'] == 'on') {
            $data['showDescription'] = true;
        } else {
            $data['showDescription'] = false;
        }
        parent::initialize($data);
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
    
    public function getStatus() {
        return $this->status;
    }
    
    public function getShowDescription() {
        return $this->showDescription;
    }
    
    public function getContentId() {
        return 'project-' . $this->id;
    }
    
    public function getDetailUrl() {
        return NFUtil::getUrl('/project/project?id=' . $this->id);
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
    
    public function setStatus($status) {
        $this->status = $status;
    }
    
    public function setShowDescription($showDescription) {
        $this->showDescription = $showDescription;
    }
    
    public function setPreviewedImages($images) {
        $this->previewedImages = $images;
    }
    
    public function getPreviewedImages() {
        return $this->previewedImages;
    }
    
    public function setImages($images) {
        $this->images = $images;
    }
    
    public function getImages() {
        return $this->images;
    }
    
    public function getPosition() {
        if ($this->previewedImages && count($this->previewedImages)) {
            return $this->previewedImages[0]->getDisplayPosition();
        }
        
        return 'left';
    }
}
?>