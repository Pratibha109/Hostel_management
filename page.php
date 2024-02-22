<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>
<body>
    <h2>Login</h2>
    <?php 
    $servername = "localhost";
    $username = "root";
    $password = " ";
    $database = "page";

    $conn = new mysqli($servername,$username,$password,$database);

    if ($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM users WHERE username='username' AND password='$password'";
        $result = $conn->query($sql);
        
                if ($result->num_rows > 0)
        {
                      echo "Login successful!";
                } else {
                       echo"Invalid username or password!";
                }
    }
    $conn->close();
    ?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
         username: <input type="text" name="username">  <br> <br>
         password: <input type="password" name="password"> <br> <br>
         <input type="submit" value="Login">
    </form>
</body>
</html>