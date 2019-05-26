
<?php
session_start();
header('Content-Type: application/json');
/**
 * Created by PhpStorm.
 * User: tubbe
 * Date: 25-05-2019
 * Time: 14:55
 */
deletemail($_POST["arguments"]);

    function deletemail($id){

        $brugernavn = $_SESSION["email"];

        $mailcommand = "helvegr hpop --username ".$brugernavn." --password 123456789 --delete ".$id."";

        exec ($mailcommand, $result );

        //exec($mailcommand);

        echo json_encode($result);

    }

?>
