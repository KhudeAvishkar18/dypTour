<?php

$insert = false;    // flag for successful insertion of data

if(isset($_POST['name'])){

    // set connection variables
    $server = "localhost";
    $username = "root";
    $password = "";

    // create connection with database
    $con = mysqli_connect($server, $username, $password);

    if(!$con){
        die("Connection to database failed due to " . mysqli_connect_error());
    }

    // get data from posted form into these variables
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $other = $_POST['other'];

    // execute a query using above data variables and insert data into database
    $sql = "INSERT INTO `trip`.`trip` (`name`, `gender`, `email`, `phone`, `address`, `other`, `dt`) VALUES ('$name', '$gender', '$email', '$phone', '$address', '$other', current_timestamp());";

    // echo $sql;


    if($con->query($sql) == true){
        // echo "Successfully inserted";
        $insert = true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }

    // close the connection
    $con->close();
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Form</title>
    <link rel="stylesheet" href="index.css">

    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Montserrat:wght@400;700&family=Ruwudu:wght@700&family=Ubuntu&display=swap" rel="stylesheet">
</head>
<body>
    <div class="mainBox">
        <h1 id="contactHead">Welcome to DYP Trip Form</h1>
        <p>Enter your details and submit the form to confirm your seat</p>
        <?php
            if($insert == 1){
                echo "<p class = 'submitMsg'>Thanks for submitting your response</p>";
            }
        ?>

        <form action="index.php" method="post">
            <input type="text" class="input" name="name" placeholder="Enter your Name" >

            <input type="text" class="input" name="gender" id="" placeholder="Gender">

            <input type="email" class="input" name="email" placeholder="Enter your Email">

            <input type="number" class="input" name="phone" placeholder="Enter your Mob.no.">

            <input type="text" class="input" name="address" placeholder="Enter your Address">

            <textarea name="other" class="input texti" id="desc" cols="30" rows="50" placeholder="Enter your other information"></textarea>

            <!-- <input type="reset" value="Clear" class="btn clear" > -->

            <input type="submit" value="Submit Now" id="submit" class="btn submit" >
        </form>
    </div>

    <script>
        
    </script>

</body>
</html>