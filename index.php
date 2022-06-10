<?php
$insert=false;
if(isset($_POST['name'])){
    //Set Connection variablees
$server="localhost";
$username="root";
$password="";

//Create a databse connection
$con=mysqli_connect($server, $username, $password);


//Check for connection success
if(!$con){
    die("connection to this database failed due to" . mysqli_connect_error());
}
// echo "Success Connecting to the db"

//Collect post variables
$name=$_POST['name'];
$gender=$_POST['gender'];
$age=$_POST['age'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$desc=$_POST['desc'];

$sql="INSERT INTO `trip`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";

// echo $sql;
//Execute the query
if($con->query($sql)==true){
    // echo "Successfully inserted";

    //Flag fro successful insertion
    $insert=true;
}
else{
    echo "ERROR: $sql <br> $con->error";
}

//close th database conncections
$con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Travel Form</title>
</head>
<body>
    <div class="container">
        <h1>Welcom to IIT US Trip form</h1>
        <p>Enter Your details and submit this form to confirm your participation in the trip</p>
        <?php
        if($insert==true){
        echo "<p class='submitMsg'>Thanks for submitting your form. We are happy to see you joining for the US trip</p>";}
        ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter Your Name">
            <input type="text" name="age" id="age" placeholder="Enter Your Age">
            <input type="text" name="gender" id="gender" placeholder="Enter Your gender">
            <input type="email" name="email" id="email" placeholder="Enter Your email">
            <input type="phone" name="phone" id="phone" placeholder="Enter Your Phone">
            <textarea name="desc" id="" cols="30" rows="10" placeholder="Enter Your other information"></textarea>
            <button class="btn">Submit</button>
        </form>
    </div>

    <script src="./script.js"></script>    
</body>
</html>