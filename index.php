<?php

echo '<!DOCTYPE html>
<html>
<head>
    <title>Form site</title>
    <style>
        form{padding-top: 120px;
             text-allign: center;
             font-size: 30px;}
        input{width: 250px;
              height: 40px;
              font-size: 30px;}
    </style>
</head>
<body>
<form method="post" action="index.php">
Username : <input type="text" name="username"><br><br>
Password : <input type="password" name="password"><br><br>
<input type="submit" value="Submit">
</form>
</body>
</html>';

$username = filter_input(INPUT_POST, 'username');
$password = filter_input(INPUT_POST, 'password');
if (!empty($username)){
if (!empty($password)){
$host = "localhost";
$dbusername = "DBname";
$dbpassword = "DBpassword";
$dbname = "youtube";
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()){
die('Connect Error ('. mysqli_connect_errno() .') '
. mysqli_connect_error());
}
else{
$sql = "INSERT INTO register (username, password)
values ('$username','$password')";
if ($conn->query($sql)){
echo "New record is inserted sucessfully";
}
else{
echo "Error: ". $sql ."
". $conn->error;
}
$conn->close();
}
}
else{
echo "Password should not be empty";
die();
}
}
else{
echo "Username should not be empty";
die();
}
?>