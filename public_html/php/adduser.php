<?php
header("Content-Type: application/json");
/**
 * Created by PhpStorm.
 * User: tubbe
 * Date: 25-04-2019
 * Time: 13:00
 */

/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
    $link = mysqli_connect("localhost", "root", "", "mailserver");

    // Check connection
    if($link === false){
        die(json_encode(["status" => 1]));
    }

    $fornavn = $_POST["firstname"];
    $efternavn = $_POST['lastname'];
    $email = $_POST['email'];
    $kodeord1 = $_POST["password1"];
    $kodeord2 = $_POST["password2"];

    $email = $email . "@hellmail.dk";

    // Attempt insert query execution
    $sql = "SELECT email FROM users WHERE email='$email'";

    $result = mysqli_query($link, $sql);

    if($result->num_rows == 0) {

        if ($kodeord1 === $kodeord2){

            $kodeord = password_hash($kodeord1, PASSWORD_DEFAULT);

            $sql = "INSERT INTO users (firstname, lastname, email, password) VALUES ('$fornavn', '$efternavn', '$email', '$kodeord')";

            if(mysqli_query($link, $sql)){
                echo json_encode(["status" => 0]);
            }
            else{
                echo json_encode(["status" => 4]);
            }
        }
        else{
            echo json_encode(["status" => 3]);
        }
    }
    else{
        echo json_encode(["status" => 2]);
    }
    // Close connection
   mysqli_close($link);
?>