<?php
$submit = false;
$not_submitted = false;
if(isset($_POST['name'])){

    $server="localhost";
    $username="root";
    $password="";

    $con = mysqli_connect($server, $username, $password);

    if(!$con){
        die("connection to database failed due to" . mysqli_connect_error());
    }
    // echo"Connection to db successful"
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $info = $_POST['info'];
    $mode_of_transport = $_POST['mode_of_transport'];


    $sql ="INSERT INTO `travel`.`travel` (`name`, `age`, `gender`, `email`, `phone`, `address`, `info`, `mode_of_trans`, `date_inserted`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$address', '$info', '$mode_of_transport', current_timestamp());";

    // echo $sql;

    if($con->query($sql) == true){
        // echo "successfully inserted data to db";
        $submit = true;
        $not_submitted = false;
    }
    else{
        echo "error: $sql <br> $con->error";
        $not_submitted = true;
        $submit = false;
    }

    $con->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        if ($submit == true) {
            echo"<footer class='submsg'><p>Thanks for submitting the form</p></footer>";
        }
        elseif ($not_submitted == true) {
            echo"<footer class='submsg'><p>Form hasn't been submitted</p></footer>";
            echo "connection to database failed due to" . mysqli_connect_error();
        }
    ?>
    <ul>
        <li>
            <a class="aink" href="index.html">Return to home page</a>
        </li>
    </ul>
</body>
</html>
