<?php
$insert=false;
if(isset($_POST['name'])){
//CONNECT TO DATABASE
$server= "localhost";
$username="root";
$password="";
// Create a database connection
$con = mysqli_connect($server, $username, $password);
// Check for connection success
if(!$con){
    die("connection to this database failed due to ".mysqli_connect_error());
}
 //echo "successful connection to database";
// Collect post variables
$name= $_POST['name'];
$age= $_POST['age'];
$gender =$_POST['gender'];
$email= $_POST['email'];
$phone= $_POST['phone'];
$desc= $_POST['desc'];
$sql= "INSERT INTO `cwh`.`cwh` (`name`,`age`, `gender`,`email` , `phone`, `desc`, `date`) VALUES ('$name',  '$age', '$gender', '$email','$phone','$desc', current_timestamp());";
//echo $sql ;
// Execute the query
if($con->query($sql)==true){
    //echo "successfully inserted";
     
    // Flag for successful insertion
     $insert = true;
}
else{
    echo "error in inserting: $sql <br> $con->error";
    
}

// Close the database connection
$con->close();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>welcome to travel form</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto|Sriracha&display=swap" rel="stylesheet">

<link rel="stylesheet" href="style.css">
</head>
<body>
    <img  class="bg" src="IMAGES/bg.jpg" alt="iit kanpur">
    <div class="container">
        <h3>welcome to IIT kanpur US trip form</h3>
        <p>enter your details to confirm your participation in the trip</p>
        <?php
        if ($insert == true){

        echo "<p class='submitmsg'> Thanks for submitting the form </p>";
        
        }
       
        ?>
        <form action="index.php" method="post">
    <input type="text" name="name" id="name" placeholder="enter your name">
    <input type="text" name="age" id="age" placeholder="enter your age">
    <input type="text" name="gender" id="gender" placeholder="enter your gender">
<input type="email" name="email" id="email" placeholder="email">
<input type="phone" name="phone" id="phone " placeholder=" enter your  phone number">
<textarea name="desc" id="desc" cols="30" rows="10" placeholder="enter any other informatiuon if required"></textarea>
<button class="btn" type="submit">submit</button>
</form>
    </div>
    <script src="index.js"></script>
    
</body>
</html>
