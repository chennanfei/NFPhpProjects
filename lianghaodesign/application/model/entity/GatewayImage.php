<?php
require_once 'model/entity/SiteImage.php';

/**
@Entity
@Table(name="gateway_images")
*/
class GatewayImage extends SiteImage {
    /** @id @Column(type="integer") @GeneratedValue */
    protected $id;
    
    /** @Column(type="string", name="image_name") */
    protected $imageName;
    
    /** @Column(type="string", name="site_channel_id") */
    protected $siteChannelId;

    /** @Column(type="integer", name="display_order") */
    protected $displayOrder;

    /** @Column(type="string", name="creator") */
    protected $creator;

    /** @Column(type="string", name="created_time") */
    protected $createdTime;
    
    /** @Column(type="string", name="updated_time") */
    protected $updatedTime;
    
    private $siteChannel;
    
    public function getSiteChannel() {
        return $this->siteChannel;
    }
    
    public function getSiteChannelId() {
        return $this->siteChannelId;
    }
    
    public function setSiteChannel($channel) {
        return $this->siteChannel = $channel;
    }
    
    public function setSiteChannelId($channelId) {
        $this->siteChannelId = $channelId;
    }
    
    public function getDetailUrl() {
        return NFUtil::getUrl('gatewayImage/image?id=' . $this->getId());
    }
    
    public function getChannelPageUrl() {
        if (!isset($this->siteChannel)) {
            return null;
        }
        
        return NFUtil::getUrl(lcfirst($this->siteChannel->getEnglishName()));
    }
}
?>