<?php
error_reporting(E_ALL);


$mails = "To: tubbe@hellmail.dk
From: kent@hellmail.dk
Subject: Hej!

\"Jeg er bøsse :)\"
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

//getMailData($mails);

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

        $start = strpos($mails, 'To:');
        $slut = strripos($mails, '\\"');

        echo ("SLUTTER : $slut");
        if ($start === 0){



            if ($start === 0 and strpos($mails, 'To:') !== false) {
                $findtilstart = strpos($mails, 'To:')+3;

                $findtilslut = strpos($mails, "\n")-3;
                echo("TO-nr : $findtilstart $findtilslut");
                $toperson = substr($mails, $findtilstart, $findtilslut);
                //echo $toperson;

                $mails = substr($mails, $findtilslut+4, $strlength);
                //$slut = $findtilslut;
            }

            $fromslut = strpos($mails, 'From:');

            if (strpos($mails, 'From:') !== false and $fromslut < $slut) {
                $findfromstart = strpos($mails, 'From:')+5;

                $findfromslut = strpos($mails, "\n")-5;
                echo("FROM-nr : $findfromstart $findfromslut");
                $fromperson = substr($mails, $findfromstart, $findfromslut);
                //echo $fromperson;

                $mails = substr($mails, $findfromslut+6, $strlength);
                //$slut = $findfromslut;
            }
           if (strpos($mails, 'Cc:') !== false) {
               $findccstart = strpos($mails, 'Cc:')+3;

               $findccslut = strpos($mails, "\n")-3;
               echo("Cc : $findccstart $findccslut");
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

            echo $toperson;
            echo $fromperson;
            echo $subjectmail;
        }
    }

        //echo ("Linjenr : $linjenr $mails");

        //$line = strtok( $separator );
    //}


separateMails($mails);

    function separateMails(string $mailData) : array {

        $rTags = ["To","From","Subject"];
        $oTags = ["Cc","Bcc"];

        $startIndex = 0;
        $endIndex = 0;

        while(true) {

            if($endIndex !== 0) {
                $startIndex = $endIndex++;
            }

            $endIndex = strpos(substr($mailData, $startIndex), "\"".PHP_EOL."." . PHP_EOL);

            $mail = substr($mailData, $startIndex, $endIndex);

            //echo $mail.PHP_EOL;

            foreach($rTags as $tag) {

                $index = strpos($mail, PHP_EOL."".$tag.":");

                if($index === false) {
                    $index = strpos($mail, $tag.":");

                    if($index !== 0) {
                        echo "CONTINUED";
                        continue;
                    }
                }

                //echo $tag . " : " . strlen($tag) . "<br>";

                echo substr($mail,$index, $index+7)."<br>";

                $start = $index + strlen($tag) + 2;

                $tagData = substr($mail, $start, strpos(substr($mail, $start), PHP_EOL));


                //echo $tagData."<br>";

                //echo substr($mail, strlen($tag) + 2).PHP_EOL.PHP_EOL.PHP_EOL;

                //echo( $tagData).PHP_EOL;

            }

            break;
        }

        return [0 => ["to" => "tubbe@hellmail.dk"]];
    }


?>