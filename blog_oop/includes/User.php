<?php
class User{
private $id;
private $username;
private $password;
public static function auth($username, $password)
{
    global $dbc;
    $sql = "SELECT * FROM `logins` WHERE username = :username LIMIT 1;";
    $bindVal = ['username' => $username];
    $userRecord = $dbc->fetchArray($sql, $bindVal);
    if ($userRecord) {
        $userRecord = array_shift($userRecord);
        if (password_verify($password, $userRecord['password'])) {
            return new self($userRecord['id'], $userRecord['username'],
                $userRecord['password']);
        }
    }
    return false;
}
public function __construct($id, $username, $password)
{
    $this->id = $id;
    $this->username=$username;
    $this->password=$password;

}

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * @param $id
     * @return $this 
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }
    /**
     * @username
     */
    public function getUsername()
    {
    return $this->username;
    }


    public function setUsername($username)
    {
    $this->username = $username;
    return $this;
    }
    /**
     * @password
     */
    public function getPassword()
    {
        return $this->password;
    }
    /**
     * @setpassword
     */


    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

}
?>