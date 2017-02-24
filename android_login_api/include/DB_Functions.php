<?php 


class DB_Functions {

    private $conn;

    function __construct() {
        require_once 'DB_Connect.php';
        mysqli_set_charset($this->conn, 'utf8');
        $db = new Db_Connect();
        $this->conn = $db->connect();
    }

    function __destruct() {
        
    }

    /**
     * Storing new user
     */
    public function storeUser($firstname, $lastname, $email, $mobile, $address, $city, $governorate, $password) {
 
        $result = mysqli_query($this->conn, "INSERT INTO users(firstname, lastname, email, mobile, address, city, governorate, password, created_at) VALUES('$firstname', '$lastname', '$email', '$mobile', '$address', '$city', '$governorate', '$password', NOW())") or die(mysqli_error($this->conn));
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get user by email and password
     */
    public function getUserByEmailAndPassword($email, $password) {

		$result = mysqli_query($this->conn, "SELECT * FROM users WHERE email='$email' AND password='$password'") or die(mysqli_error($this->conn));
		if (mysqli_num_rows($result) > 0) {
     
                return true;
            
           } else {
                return false;
            }
    }

    /**
     * Check user is existed or not
     */
    public function isUserExisted($email) {
        $result = mysqli_query($this->conn, "SELECT email FROM users WHERE email='$email'") or die(mysqli_error($this->conn));
		if (mysqli_num_rows($result) > 0) {
    	return true;
		} else {
   		 return false;
	    }

    }

 }

 ?>