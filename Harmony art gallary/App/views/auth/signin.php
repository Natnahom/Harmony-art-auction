<?php
    session_start();
?>
<?php
    include("../storage/database.php");

    if(isset($_POST['submit'])){

    $username2 = $_POST['uname'];
    $password2 = $_POST['password'];
    $sql = "SELECT id, uname, pass FROM users WHERE uname = '$username2' and pass = '$password2'";
    $result = mysqli_query($conn, $sql);

    if(isset($_POST['submit'])){
        if (isset($_POST['type1'])) {
            $selected_type = $_POST['type1'];
            if ($selected_type === 'customer') {
                if(mysqli_num_rows($result) > 0){
                    //while($row = mysqli_fetch_assoc($result)){
                    $row = mysqli_fetch_assoc($result);
                    // echo "<p style=\"color:white;\"> ID: " . $row["id"] . "</p>, ";
                    // echo "<p style=\"color:white;\"> Username: " . $row["uname"] . "</p>, ";
                    // echo "<p style=\"color:white;\"> Password: " . $row["pass"] . "</p>, ";
                    //}
                    header("Location: ../Ongoing Auction page.php");
        
                }
            } else if ($selected_type === 'artist') {
                if(mysqli_num_rows($result) > 0){
                    //while($row = mysqli_fetch_assoc($result)){
                    $row = mysqli_fetch_assoc($result);
                    // echo "<p style=\"color:white;\"> ID: " . $row["id"] . "</p>, ";
                    // echo "<p style=\"color:white;\"> Username: " . $row["uname"] . "</p>, ";
                    // echo "<p style=\"color:white;\"> Password: " . $row["pass"] . "</p>, ";
                    //}
                    header("Location: ../ForArtist.php");
        
                }
            }

            else{
                echo "<h3 style=\"color:red;\">No user found </h3>";
            }
        }
        $_SESSION['uname'] = $row["uname"];
        $_SESSION['password'] = $row["pass"];

    }   
}

    mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="x-index" href="../../../resources/images/icon.ico">
    <link rel="stylesheet" href="../../../resources/css/signin.css">
    <title>Sign in</title>
    <script src="../../views/script.js"></script>
</head>
<body>
    <div class="container">
    <h2>Signin</h2>
    <p>Signin and get full access to our resource</p>
    <form action="signin.php" method="POST">

        <label for="username">Username</label>
        <input id="textBox" class="textBox" type="text" name="uname" placeholder="Username" required/><br>
        
        <label for="type">Customer</label>
        <input id="select1" type="radio" name="type1" value="customer" required><br>
        <label for="type">Artist</label>
        <input id="select2" type="radio" name="type1" value="artist" required><br>
        <label for="password">Password</label>
        <input id="textBox2" class="textBox" type="password" name="password" placeholder="Password" required/><br><br>
        
        <input id="btn" type="submit" name="submit" value="Signin" onclick="func1()"/><br><br>
        <input id = "btn2" type="reset" value="Reset"/>
    
    </form>
    </div>


</body>
</html>