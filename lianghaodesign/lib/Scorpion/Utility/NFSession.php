<?php
class NFSession {
    private $USER_ID = 'site_user_id';
    
    public function getUserID() {
        return $_SESSION && array_key_exists($this->USER_ID, $_SESSION)
            ? $_SESSION[$this->USER_ID] : null;
    }
    
    public function isRecognizedUser() {
        return $_SESSION && array_key_exists($this->USER_ID, $_SESSION) && $_SESSION[$this->USER_ID];
    }
    
    public function removeUserID() {
        if ($_SESSION && array_key_exists($this->USER_ID, $_SESSION)) {
            unset($_SESSION[$this->USER_ID]);
        }
    }
       
    public function setUserID($userID) {
        if ($userID && isset($_SESSION)) {
            $_SESSION[$this->USER_ID] = $userID;
        }
    }
}

?>