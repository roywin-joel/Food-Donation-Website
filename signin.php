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

if (isset($_POST['register']))
{
    $name = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $insert_user = "INSERT INTO signin(name, email, password) VALUES('$name', '$email', '$password')";
    $result_insert_user = mysqli_query($conn, $insert_user);
    if($result_insert_user){
        echo "<script type='text/javascript'>alert('Login Sucessfully');</script>";
    }
    else{
        echo "<script type='text/javascript'>alert('Login failed !!!Please');</script>";
    }


}
else{
    $message="Login Fail. Please try again.";
    echo "<script type='text/javascript'>alert('$message');</script>";
}

header('Location: index.html');

        
?>