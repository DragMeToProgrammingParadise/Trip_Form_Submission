<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php 
    $insert = false;
    $server = "localhost";
    $username = "root";
    $password = "";
    $db = "pak_tour";
    $con = mysqli_connect($server, $username, $password, $db);
    if(!$con)
    {
        die("connection to database is failed". mysqli_connect_error());
    }
    // else
    // {
    //     echo "connection to database is successful:";
    // 
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $age = $_POST['age'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $other = $_POST['other'];

        $sql = "INSERT INTO trip (name, age, gender, email, phone, other, date) 
        VALUES ('$name', '$age', '$gender', '$email', '$phone', '$other', current_timestamp());";
    // echo $sql;
        if($con->query($sql) == true)
        {
        // echo "Successfully Inserted";
        $insert = true;
        }
        else{
            $insert = false;
            echo "Error... Insertion failed: <br> $con->error";
        }
    }
?>
    <img src="img.jpg" alt="backgroundImg">
    <div class="container">
        <h1>Welcome to Webpenter Software House</h1>
        <p>Enter your details and submit this form to confirm your 
        participation in this trip
        </p>
        <?php
        
        if($insert == true)
        {
        echo "<p class='submitMsg'>Thanks for submitting your Trip form. See you soon on Trip</p>";
        }
        ?>
        <form action="" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="age" id="age" placeholder="Enter your age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="text" name="email" id="email" placeholder="Enter your email">
            <input type="text" name="phone" id="phone" placeholder="Enter your phone">
            <textarea name="other" id="other" cols="30" rows="10" placeholder="Enter any other information"></textarea>
            <button class="btnSubmission" type="submit" name="submit">Submit</button>
            
        </form>
    </div>
    
</body>
</html>
