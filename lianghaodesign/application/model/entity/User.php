<?php
/**
@Entity
@Table(name="user")
*/
class User {
    /** @id @Column(type="string") */
    private $id;
    
    /** @Column(type="string") */
    private $password;
    
    /** @Column(type="datetime", name="login_time") */
    private $loginTime;
    
    public function getId() {
        return $this->id;
    }
    
    public function getPassword() {
        return $this->password;
    }
    
    public function setId($id) {
        $this->id = $id;
    }
    
    public function setPassword($password) {
        $this->password = $password;
    }
}

?>