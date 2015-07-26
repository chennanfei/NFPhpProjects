<?php
/**
@Entity
@Table(name="programs")
*/
class Program {
    /** @id @Column(type="integer") */
    private $id;

    /** @Column(type="string", name="chinese_title") */
    private $chineseName;

    /** @Column(type="string", name="english_title") */
    private $enlighName;

    /** @Column(type="integer", name="display_order") */
    private $displayOrder;

    /** @Column(type="integer", name="site_channel_id") */
    private $siteChannelId;
    
    public function getChineseName() {
        return $this->chineseName;
    }
    
    public function getEnglishName() {
        return $this->englishName;
    }
    
    public function getId() {
        return $this->id;
    }

    public function getDisplayOrder() {
        return $this->displayOrder;
    }

    public function getSiteChannelId() {
        return $this->siteChannelId;
    }
}
?>