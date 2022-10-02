<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '1234');
define('DB_NAME', 'sample');
// Try connecting to the Database
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

//Check the connection
if($conn == false){
    dir('Error: Cannot connect');
}
if (isset($_POST['loggin'])) {
    $email = $_POST['emaill'];
    $password = $_POST['passwordd'];
    
    $read_DB = "SELECT * FROM signin WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $read_DB);
    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            //Compare string to check entered password and database record. Case sensitive.
            if (strcmp($password, $row['password']) == 0) { 
                session_start();
                $_SESSION['emaill'] = $row['email'];
                $message="Login Success.";
                echo "<script type='text/javascript'>alert('$message');</script>";
                header("Refresh: 0; index.html");
                } 
            else { 
                $message="Login Fail. Please try again.";
                echo "<script type='text/javascript'>alert('$message');</script>";
            } 
        }
    }
    else{
        $message="Login Fail.";
        echo "<script type='text/javascript'>alert('$message');</script>";
        header("Refresh: 0; index.html");

    }
}
header('Location: index.html');

?>