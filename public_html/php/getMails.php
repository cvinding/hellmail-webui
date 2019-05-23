<?php
/*header('Content-Type: application/json');
error_reporting(E_ALL);

// Test mails from a string, in the correct setup these mails will be from our POP client
$mails =
"To: christian@hellmail.dk
From: kent@hellmail.dk
Subject: Møder Tider
Bcc: christian@hellmail.dk
Cc: tubbe@lmao.dk

\"hej med jer
To: \\\"Ok\\\"
\"
.

To: christian@hellmail.dk
From: kent@hellmail.dk
Subject: Test

\"Hej aber 
Trump should be a peach 
Upkiblers to the left\"
.

";

// Call our function separateMails()
$mailArray = separateMails($mails);

//var_dump($mailArray);


echo json_encode($mailArray);

/**
 * separateMails() is used for separating a mail output from our POP Server after the RETR command has been issued
 * @param string $mailData
 * @return array
 */

function antalMails(){

    $brugernavn = $_POST["brugernavn"];

    $mailcommand = "helvegr hpop --username \".$brugernavn.\" --password \"dufårdetherpasswordoomsnart\" --stat RECIEVED";

    exec ($mailcommand, $result );

    //exec($mailcommand);

    return $result;

}

function indbakke(){

    $result = antalMails();
    $antalmails = $result[1];
    $start = 1;
    $slut = 25;
    $mailIDS = [];
    $id = "";

    $brugernavn = $_POST["brugernavn"];

    while(slut < $antalmails){

        $mailcommand = "helvegr hpop --username \".$brugernavn.\" --password \"dufårdetherpasswordoomsnart\" --list RECIEVED --start ".$start." --end ".$slut."";

        exec ($mailcommand, $result);

        foreach($result as $i){
            $mailIDS[] = $i;
        }

        $start = $start + 20;
        $slut = $slut + 20;
    }

    foreach($mailIDS as $a){
        $id .= $a . " ";
    }

    $mailcommand = "helvegr hpop --username \" . $brugernavn . \" --password \"dufårdetherpasswordoomsnart\" --retrieve ".$id."";

    exec ($mailcommand, $mails);

    return $mails;
}

/*
function separateMails(string $mailData) : array {

    // Required email tags
    $rTags = ["To","From","Subject"];

    // Optional email tags
    $oTags = ["Cc","Bcc"];

    // Set StartIndex and EndIndex to 0
    $startIndex = 0;
    $endIndex = 0;

    // Set the Ouput array
    $output = [];

    // Set the int variable
    $i = 0;

    while(true) {

        // If we happen to get to the end of the mail, break the while(true) loop
        if(($startIndex + $endIndex + 4) === strlen($mailData)) {
            break;
        }

        // Set ContinueEarly to false
        $continueEarly = false;

        // Set StartIndex if EndIndex is not 0
        if($endIndex !== 0) {
            $startIndex = $startIndex + $endIndex + 4;
        }

        // Find EndIndex
        $endIndex = strpos(substr($mailData, $startIndex), "\"\n.\n")  + 1;

        // Get the mail
        $mail = substr($mailData, $startIndex, $endIndex);

        $headers = substr($mail, 0, strpos($mail, "\n\n"))."\n";

        $body = substr($mail,  strpos($mail, "\n\n") + 1);



        /*echo "HEA22DERS: " . $headers."<br>";

        if( $i == 2) {
            Break;
        }*/


        // Loop through all the required tags
 /*       foreach($rTags as $tag) {

            // The tag's start index
            $index = strpos($headers, "\n".$tag.":");

            // If there is no tag to be found
            if($index === false) {

                // Try again without a \n
                $index = strpos($headers, $tag.":");

                // If the index is NOT 0 set ContinueEarly to true and break the foreach loop
                if($index !== 0) {
                    $continueEarly = true;
                    break;
                }
            }

            // Set the start index
            if ($index == 0){
                $start = $index + strlen($tag) + 2;
            } else {
                $start = $index + strlen($tag) + 3;
            }

            // Find the TagData
            $tagData = substr($headers, $start, strpos(substr($headers, $start), "\n"));

            // Set the Tag to TagData
            $output[$i][strtolower($tag)] = trim($tagData,"\n");

        }

        // If ContinueEarly is true, delete data from the previous cycle and continue the while(true) loop
        if($continueEarly) {
            unset($output[$i]);
            continue;
        }

        // Loop through all optional tags
        foreach($oTags as $tag) {

            // The tag's start index
            $index = strpos($headers, "\n".$tag.":");

            // If there is no tag to be found
            if($index === false) {

                // Try again without a \n
                $index = strpos($headers, $tag.":");

                // If the index is NOT 0 continue the foreach loop
                if($index !== 0) {
                    continue;
                }
            }

            // Set the start index
            if ($index == 0){
                $start = $index + strlen($tag) + 2;
            } else {
                $start = $index + strlen($tag) + 3;
            }

            // Find the TagData
            $tagData = substr($headers, $start, strpos(substr($headers, $start), PHP_EOL));

            // Set the Tag to TagData
            $output[$i][strtolower($tag)] = $tagData;
        }



        $output[$i]["body"] = substr($body, 2, strlen($body) - 3);

        // Increment the i
        $i++;

    }

    // Return the output when done
    return $output;
}

*/
?>