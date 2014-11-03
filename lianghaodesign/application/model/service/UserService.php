<?php
require_once 'Scorpio/Utility/NFSession.php';
require_once 'Scorpio/DB/NFDBService.php';
require_once 'utility/Constants.php';
require_once 'model/entity/User.php';

class UserService {
    private $dbService;
    
    public function __construct() {
        $this->dbService = new NFDBService;
    }
    
    /* verify user and update status */
    public function authenticate($userID, $password) {
        $user = $this->getAuthenticatedUser($userID, $password);
        (new NFSession)->setUserID($userID);
    }
    
    /* change password */
    public function changePassword($userID, $oldPwd, $newPwd) {
        $user = $this->getAuthenticatedUser($userID, $oldPwd);
        
        if (empty($newPwd)) {
            throw new Exception('Empty new password?', Constants::ERR_INVALID_ARGS);
        }
        
        $len = strlen($newPwd);
        if ($len < 6 || $len > 10) {
            throw new Exception('Invalid length of password. It should be between 6~10',
                Constants::ERR_PWD_INVALID_LEN);
        }
        
        $user->setPassword(password_hash($newPwd, PASSWORD_DEFAULT));
        $this->dbService->save($user);
    }
    
    private function getAuthenticatedUser($userID, $password) {
        if (empty($userID) || empty($password)) {
            throw new Exception('Empty userID or password?', Constants::ERR_INVALID_ARGS);
        }
        
        $users = $this->dbService->query('select u from User u where u.id=:uid', array(uid => $userID));
        if (!isset($users) || empty($users)) {
            throw new Exception('User does not exist.', Constants::ERR_USER_NOT_EXIST);
        }
        
        if (!password_verify($password, $users[0]->getPassword())) {
            throw new Exception('Password is invalid.', Constants::ERR_PWD_INCORRECT);
        }
        
        return $users[0];
    }
    
    /* clean up user status */
    public function unauthenticate() {
        (new NFSession)->removeUserID();
    }
}

?>