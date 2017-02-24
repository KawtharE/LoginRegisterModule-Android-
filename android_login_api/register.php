<?php 

require_once 'include/DB_Functions.php';
$db = new DB_Functions();

// json response array
$response = array("error" => FALSE);

if ($_SERVER['REQUEST_METHOD']=='POST') {

    // receiving the post params
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $governorate = $_POST['governorate'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];
    $numberCar = $_POST['numberCar'] ;
    $marqueCar = $_POST['marqueCar'];
    $driveLicense = $_POST['driveLicense'];
    $colorCar = $_POST['colorCar'];

    // check if user is already existed with the same email
    if ($db->isUserExisted($email)) {
        // user already existed
        $response["error"] = TRUE;
        $response["error_msg"] = "User already existed with " . $email;
        echo json_encode($response);
    } else {
        // create a new user
        $user = $db->storeUser($firstname, $lastname, $email, $mobile, $address, $city, $governorate, $password);
        if ($user) {
            // user stored successfully
            $response["error"] = FALSE;
            $response["error_msg"] = "No error your registration finished successfully!";
            echo json_encode($response);
        } else {
            // user failed to store
            $response["error"] = TRUE;
            $response["error_msg"] = "Unknown error occurred in registration!";
            echo json_encode($response);
        }
    }
} else {
    $response["error"] = TRUE;
    $response["error_msg"] = "Required parameters is missing!";
    echo json_encode($response);
}
 ?>