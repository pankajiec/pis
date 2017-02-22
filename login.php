<?php

$myusername=$_POST["username"];;
$mypassword=$_POST['password'];;

$servername = "localhost";
$username = "root";
$password = "6614631";
$dbname = "employees";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM login WHERE emp_no= '$myusername' AND password = '$mypassword'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        session_start();
        $_SESSION['login_user'] = $myusername;
        header("location: home.php");
    }
} else {
    echo "Your Login Name or Password is invalid";
}
$conn->close();
    
?>
