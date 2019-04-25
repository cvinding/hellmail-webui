<?php
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
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    $fornavn = $_POST['firstname'];
    $efternavn = $_POST['lastname'];
    $email = $_POST['email'];
    $kodeord1 = $_POST['password1'];
    $kodeord2 = $_POST['password2'];

    // Attempt insert query execution
    $sql = "SELECT email FROM users WHERE email='$email'";

if (isset($_POST['add']))
{
    echo "button 1 has been pressed";

    if(mysqli_query($link, $sql)){
        echo "Mail optaget!";
    } else{
        //echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        if($kodeord1 === $kodeord2){
            $sql = "INSERT INTO users (firstname, lastname, email, password) VALUES
                    ('$fornavn', '$efternavn', '$email','$kodeord1'),";

            if(mysqli_query($link, $sql)){
                echo "Records added successfully.";
            } else{
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
            }
        }
    }
}
    // Close connection
    mysqli_close($link);
?>