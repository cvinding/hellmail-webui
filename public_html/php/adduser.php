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

    $fornavn = $_POST['addfirstname'];
    $efternavn = $_POST['addlastname'];
    $email = $_POST['addemail'];
    $kodeord1 = $_POST['addpassword1'];
    $kodeord2 = $_POST['addpassword2'];


    // Attempt insert query execution
    //$sql = "SELECT email FROM users WHERE email='$email'";

    if ($kodeord1 === $kodeord2){

        $sql = "INSERT INTO users (firstname, lastname, email, password) VALUES ('$fornavn', '$efternavn', '$email', '$kodeord1')";

        if(mysqli_query($link, $sql)){
            echo "Records inserted successfully.";
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }
    }
    else{
        echo "Password matcher ikke";
    }
    //echo $_REQUEST['addfirstname'];
/*if (isset($_POST['submit']))
{
    echo "button 1 has been pressed";

    echo $fornavn;
    echo $efternavn;

    if(mysqli_query($link, $sql)){
        echo "Mail optaget!";
    } else{
        //echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        //if($kodeord1 === $kodeord2){
            $sql = "INSERT INTO users (firstname, lastname, email, password) VALUES
                    ('Jens ', 'Peter', 'Jenss@hotmail.com','12345678')";

            if(mysqli_query($link, $sql)){
                echo "Records added successfully.";
            } else{
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
            }
        //}
    }
}*/
    // Close connection
   mysqli_close($link);
?>