<?php
class NFSession {
    private $USER_ID = 'site_user_id';
    
    public function removeUserID() {
        if ($_SESSION && array_key_exists($this->$USER_ID, $_SESSION)) {
            unset($_SESSION[$this->$USER_ID]);
        }
    }
    
    public function isRecognizedUser() {
        if ($_SESSION && array_key_exists($this->USER_ID, $_SESSION) && $_SESSION[$this->USER_ID]) {
            return true;
        }
        return false;
    }
    
    public function setUserID($userID) {
        if ($userID && $_SESSION) {
            $_SESSION[$this->USER_ID] = $userID;
        }
    }
}

?>