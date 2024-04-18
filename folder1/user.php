<?php
class User {
    public $username;
    public $password;
    public $firstname;
    public $lastname;
    public $isDeveloper; // select the role of the users 

    //Create new users
    public static function addUser($new) {
        $user = new User;

        $user->username = $new['username'];
        $user->password = $new['password'];
        $user->firstname = $new['firstname'];
        $user->lastname = $new['lastname'];
        $user->isDeveloper = $new['isDeveloper'];

        return $user;
    }

    public function isDevelop() {
        if ($this->isDeveloper == true){
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
    
    // public static function checkPerm() {
    //     $user = unserialize($_SESSION['user']);
    //     if ($user->isDevelop() == false) {
    //         die ('No permission to do this operation! <a href="criminal.php"> go back </a>');
    //     }
    // }

    public static function isLogined() {
        return (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] !== true);
    }

   
}

?>