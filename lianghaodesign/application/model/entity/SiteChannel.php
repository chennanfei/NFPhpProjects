<?php
/**
@Entity
@Table(name="site_channels")
*/
class SiteChannel {
    /** @id @Column(type="string") */
    private $id;

    /** @Column(type="string", name="chinese_title") */
    private $chineseName;

    /** @Column(type="string", name="english_title") */
    private $enlighName;
    
    public function getChineseName() {
        return $this->chineseName;
    }
    
    public function getEnglishName() {
        return $this->enlighName;
    }
    
    public function getId() {
        return $this->id;
    }
}
?>
