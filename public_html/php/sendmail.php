<?php
session_start();
header("Content-Type: application/json");
/**
 * Created by PhpStorm.
 * User: tubbe
 * Date: 19-05-2019
 * Time: 17:27
 */
    $to = $_POST['to'];
    $subject = $_POST['subject'];

    if (isset($to) AND isset($subject) AND isset($_SESSION["email"])){
        //Todo måske tjek om to mailen findes!

        $tags = ["message", "cc", "bcc"];

        $mailcommand = "helvegr smtp --to ".$to." --from ".$_SESSION["email"]." --subject \"".$subject."\" ";

        foreach ($tags as $tag){
            if (isset($_POST[$tag])){
                $mailcommand .= "--".$tag." \"".$_POST[$tag]."\" ";
            }
        }

        //exec($mailcommand);
        echo json_encode(["status" => 0]);
    }
    else{
        echo json_encode(["status" => 1]);
    }

?>