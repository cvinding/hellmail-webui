<?php
header("Content-Type: application/json");
/**
 * Created by PhpStorm.
 * User: tubbe
 * Date: 19-05-2019
 * Time: 15:52
 */

/*server with default setting (user 'root' with no password) */
    $link = mysqli_connect("localhost", "root", "", "mailserver");

    if($link === false){
        die(json_encode(["status" => 1]));
    }

    $brugernavn = $_POST['brugernavn'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$brugernavn' limit 1";

    $result1 = mysqli_query($link, $sql);

    if($result1->num_rows == 0) {
        echo json_encode(["status" => 1]);
    }
    else{
        $userdata =$result1 -> fetch_assoc();

        if (password_verify($password, $userdata["password"])) {
            echo json_encode(["status" => 0]);
        } else {
            echo json_encode(["status" => 1]);
        }
    }
    mysqli_close($link);
?>