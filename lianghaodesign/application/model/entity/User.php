<?php
/**
@Entity
@Table(name="users")
*/
class User {
    /** @id @Column(type="string") */
    private $id;
    
    /** @Column(type="string", name="login_ip") */
    private $loginIP;
    
    /** @Column(type="string", name="login_time") */
    private $loginTime;
    
    /** @Column(type="string") */
    private $password;
    
    public function getId() {
        return $this->id;
    }
    
    public function getLoginIP() {
        return $this->loginIP;
    }
    
    public function getLoginTime() {
        return $this->loginTime;
    }
    
    public function getPassword() {
        return $this->password;
    }
    
    public function setId($id) {
        $this->id = $id;
    }
    
    public function setLoginIP($ip) {
        $this->loginIP = $ip;
    }
    
    public function setLoginTime($time) {
        $this->loginTime = $time;
    }
    
    public function setPassword($password) {
        $this->password = $password;
    }
}

?>