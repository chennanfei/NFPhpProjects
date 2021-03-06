<?php
require_once 'model/entity/SiteImage.php';

/**
@Entity
@Table(name="team_members")
*/
class TeamMember extends SiteImage {
    /** @id @Column(type="integer") @GeneratedValue */
    protected $id;
    
    /** @Column(type="string", name="image_name") */
    protected $imageName;

    /** @Column(type="string", name="member_name") */
    protected $memberName;
    
    /** @Column(type="integer", name="display_order") */
    protected $displayOrder;

    /** @Column(type="string", name="creator") */
    protected $creator;

    /** @Column(type="string", name="created_time") */
    protected $createdTime;
    
    /** @Column(type="string", name="updated_time") */
    protected $updatedTime;

    public function getMemberName() {
        return $this->memberName;
    }

    public function setMemberName($name) {
        $this->memberName = $name;
    }
}
?>