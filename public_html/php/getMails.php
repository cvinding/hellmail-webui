<?php
/**
 * Created by PhpStorm.
 * User: tubbe
 * Date: 14-05-2019
 * Time: 08:40
 */

    $mails = "To: tubbe@hellmail.dk
From: kent@hellmail.dk
Subject: Hej!

Jeg er bøsse :)
.
To: tubbe@hellmail.dk
From: kent@hellmail.dk
Cc: christian@hellmail.dk
Subject: Rettelse!

\\\"Jeg er IKKE bøsse! Sidste mail var en fejl!!!
hilsen kent\\\"
.
To: kent@hellmail.dk
From: tubbe@hellmail.dk
Cc: christian@hellmail.dk,chefen@hellmail.dk
Bcc: hr@hellmail.dk

Hold op med at spamme spasser
hilsen tubbe
.";

getMailData($mails);

    $separator = "\r\n";
    $line = strtok($mails, $separator);
    $linjenr = 0;

    //while ($line !== false) {
        # do something with $line

        $linjenr ++;

        //foreach ($mails as $line) {
            //echo $line;
        //}
    //while (substr != false){
    function getMailData($mails)
    {
        $strlength = strlen($mails);

        foreach (strpos($mails, 'To:') as $mails){
            
        }

        if (strpos($mails, 'To:') !== false) {
            $findtilstart = strpos($mails, 'To:')+3;

            $findtilslut = strpos($mails, "\n")-3;
            //echo("TO-nr : $findtilstart $findtilslut");
            $toperson = substr($mails, $findtilstart, $findtilslut);
            //echo $toperson;

            $mails = substr($mails, $findtilslut+4, $strlength);
            //$slut = $findtilslut;
        }

        if (strpos($mails, 'From:') !== false) {
            $findfromstart = strpos($mails, 'From:')+5;

            $findfromslut = strpos($mails, "\n")-5;
            //echo("FROM-nr : $findfromstart $findfromslut");
            $fromperson = substr($mails, $findfromstart, $findfromslut);
            //echo $fromperson;

            //$mails = substr($mails, $findfromslut, $strlength);
            //$slut = $findfromslut;
        }
       if (strpos($mails, 'Cc:') !== false) {
           $findccstart = strpos($mails, 'Cc:')+3;

           $findccslut = strpos($mails, "\n")-3;
           echo("Subject-nr : $findccstart $findccslut");
           $subjectmail = substr($mails, $findccstart, $findccslut);
           //echo $fromperson;

           //$mails = substr($mails, $findfromslut, $strlength);
           //$slut = $findfromslut;
        }
/*        if (strpos($mails, 'Bcc:') !== false) {
            echo("FRA");
            $fromperson = $mails;
        }
        if (strpos($mails, 'Subject:') !== false) {
            $findemnestart = strpos($mails, 'Subject:');

            $findemneslut = strpos($mails, "\n");
            echo("EMNE : $findemnestart $findemneslut");
        }
        if (strpos($mails, '\\"') !==false) {
            echo("Besked");
        }

        if (strpos($mails, '.') !==false) {
            echo("SLUT");
        }*/

        //echo $toperson;
        //echo $fromperson;
        echo $subjectmail;
    }

        //echo ("Linjenr : $linjenr $mails");

        $line = strtok( $separator );
    //}



?>