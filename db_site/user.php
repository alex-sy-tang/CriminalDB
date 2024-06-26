<?php
class User {
    public $username;
    public $password;
    public $firstname;
    public $lastname;
    public $isPolice;
    public $isDeveloper; // select the role of the users 

    //Create new users
    public static function addUser($new) {
        $user = new User;

        $user->username = $new['username'];
        $user->password = $new['password'];
        $user->firstname = $new['firstname'];
        $user->lastname = $new['lastname'];
        $user->isPolice = $new['isPolice'];
        $user->isDeveloper = $new['isDeveloper'];

        return $user;
    }

    public function isDevelop() {
        if ($this->isDeveloper == true){
            return true;
        }
        return false;
    }
    
    public function isPolice() {
        if ($this->isPolice == true){
            return true;
        }
        return false;
    }

    public function login($un, $pass) {
        // decode the hash function
        if($this->username === $un && password_verify($pass, $this->password)) {
            $_SESSION['loggedin'] = true;
            $_SESSION['user'] = serialize($this);
            return true;
            
        } else {
            return false;
        }
    }
    
    public static function checkPerm() {
        $user = unserialize($_SESSION['user']);
        if (!$user->isDevelop()) {
            header('Location: ../logout.php');
            exit();       
         }
    }

    public static function checkPolice() {
        $user = unserialize($_SESSION['user']);
        if (!$user->isPolice()) {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit();       
         }
    }

    public static function isLogined() {
        return (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] !== true);
    }

   
}

?>