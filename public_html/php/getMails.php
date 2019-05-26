<?php
session_start();
header('Content-Type: application/json');
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);



//$email = $_SESSION["email"];

//echo $email;
//echo $email2;

//echo $_SERVER["SERVER_NAME"];


$brugernavn = $_SESSION["email"];
$inbox = (isset($_POST['inbox'])) ? $_POST['inbox'] : "SENT";

indbakke($brugernavn, $inbox);
//antalMails();
function antalMails($bruger, $method){

//$brugernavn = "christian@hellmail.dk";
$number = "";
//echo $brugernavn;
//$brugernavn = "";

//echo $brugernavn;

$mailcommand = "helvegr hpop --username ".$bruger." --password 123456789 --stat ".$method."";

exec ($mailcommand, $result);

foreach($result as $o){
//	echo " $o <br>";
	$number .= $o ." "; 
}
return $number;
}

function indbakke($bruger, $method){

$result = antalMails($bruger, $method);
$antalmails = preg_replace('/[^0-9]/', '', $result);
//echo "ANTALMAILS $antalmails ";
//echo "Antalmails : $antalmails";



//$page = $_POST["page"];
//$page = 1;
$page = (isset($_POST['page'])) ? $_POST['page'] : 1;
$slut = (25*$page);
$start = 1+($slut-25);

$mailIDS = [];
$id = "";

//$brugernavn = $_SESSION["email"];

//echo $brugernavn;

//while($slut < $antalmails){
//echo "START : $start";
//echo "SLUT : $slut";
$mailcommand = "helvegr hpop --username ".$bruger." --password 123456789 --list ".$method." --start ".$start." --end ".$slut."";
exec ($mailcommand, $result2);
	
        for($i=1; $i<sizeof($result2)-1; $i++){
//echo $i;
            $mailIDS[] = $result2[$i];
        }
//}
foreach($mailIDS as $a){
        $id .= $a . " ";
    }
	$id = rtrim($id, " ");

    $mailcommand = "helvegr hpop --username ".$bruger." --password 123456789 --retrieve \"".$id."\"";

	//exec ($mailcommand, $mails);
	$mailstring = shell_exec($mailcommand);
	$mailstring = substr($mailstring, 4, -7);
//echo $mailstring;

	//foreach($mails as $h){
//	echo ".$h. ";
//}
//$mailtext = implode("\n", array_slice($mails, 1, -1));
//echo $mailstring;
echo json_encode(separateMails($mailstring, $mailIDS, $antalmails));

//	echo json_encode(separateMails($mails));
}

/* Test mails from a string, in the correct setup these mails will be from our POP client
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
/*
// Call our function separateMails()
$mailArray = separateMails($mails);

//var_dump($mailArray);


echo json_encode($mailArray);

/**
 * separateMails() is used for separating a mail output from our POP Server after the RETR command has been issued
 * @param string $mailData
 * @return array
 */

<<<<<<< HEAD
//echo $mails;

//var_dump(separateMails($mails));

function separateMails(string $mailData, array $mailIDS, string $total) : array {
=======
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
>>>>>>> 0399258a2d7b12e7911f9d49125ca9fb0bfcb06a

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
        if(($startIndex + $endIndex + 4) === (strlen($mailData)+1)) {
            break;
        }
//	echo "TEST : ".($startIndex + $endIndex+4). "<br>";
//	echo "Length : ".(strlen($mailData))."<br>";	

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



  //      echo "HEA22DERS: " . $headers."<br>";

        /*if( $i == 3) {
            Break;
        }*/


        // Loop through all the required tags
        foreach($rTags as $tag) {

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
            $output[$mailIDS[$i]][strtolower($tag)] = trim($tagData,"\n");

        }

        // If ContinueEarly is true, delete data from the previous cycle and continue the while(true) loop
        
	if($continueEarly) {
            unset($output[$mailIDS[$i]]);
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
            $output[$mailIDS[$i]][strtolower($tag)] = $tagData;
        }



        $output[$mailIDS[$i]]["body"] = substr($body, 2, strlen($body) - 3);

        // Increment the i
        $i++;

    }

    // Return the output when done
    	$output["antal"]=$total;
	return $output;
}

?>
