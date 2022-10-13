<?php
class Session {
    private $user;
    /**
     * session construction
     */
    public function __construct(){
        session_start();
        if(isset($_SESSION['user'])){
            $this->user = $_SESSION['user'];
        }
    }
public function isLoggedIn(){
        if($this->user)
        {
            return $this->user;
        }else{
            return false;
        }
    }
    public function getUser(){
        return $this->user;
    }
    /**
     * Registers a loo=gged in user object 
     * @param $userObj
     */
    public function login($userObj){
        $this->user = $userObj;
        $_SESSION['user']= $userObj;
    }
    public function logout(){
        $user = false;
        $SESSION = array();
        session_destroy();
    }

}
?>