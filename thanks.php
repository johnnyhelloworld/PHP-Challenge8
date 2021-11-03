<?php

//define variables and set to empty values
$lastNameErr = $firstNameErr = $emailErr = $phoneErr = $subjectErr = $messageErr = "";
$lastName = $firstName = $email = $phone = $subject = $message = "";

function test_input($input)
{
    $input = stripslashes(trim(htmlspecialchars($input)));
    return $input;
}

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if (empty($_POST["user_lastname"])){
        $lastNameErr = "Last name is required";
    } else {
        $lastName = test_input($_POST["user_lastname"]);
        // check if lastname only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/",$lastName)) {
            $lastNameErr = "Only letters and white space allowed";
        }
    }

    if (empty($_POST["user_firstname"])){
        $firstNameErr = "First name is required";
    } else {
        $firstName = test_input($_POST["user_firstname"]);
        // check if firstname only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/",$firstName)) {
            $firstNameErr = "Only letters and white space allowed";
        }
    }

    if (empty($_POST["user_email"])){
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["user_email"]);
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    if (empty($_POST["user_phone"])){
        $phoneErr = "Phone is required";
    } else {
        $phone = test_input($_POST["user_phone"]);
        // check if phone is well-formed
        if (!preg_match("/^(?:(?:\+|00)33|0)\s*[1-9](?:[\s.-]*\d{2}){4}$/",$phone)){
            $phoneErr = "Invalid phone format";
        }
    }

    if (empty($_POST["user_subject"])){
        $subjectErr = "Subject is required";
    } else {
        $subject = test_input($_POST["user_subject"]);
    }

    if (empty($_POST["user_message"])){
        $messageErr = "Message is required";
    } else {
        $message = test_input($_POST["user_message"]);
        // check if message only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/",$message)) {
            $messageErr = "Only letters and white space allowed";
        }
    }
}

echo $lastNameErr;
echo "</br>";
echo $firstNameErr;
echo "</br>";
echo $emailErr;
echo "</br>";
echo $phoneErr;
echo "</br>";
echo $subjectErr;
echo "</br>";
echo $messageErr;

if ($lastName && $firstName && $email && $phone && $subject && $message){
    echo "Merci " . $_POST["user_firstname"] . " " . $_POST["user_lastname"] . " de nous avoir contacté à propos de " . $_POST["user_subject"] . ".</br> </br>" .
    "Un de nos conseiller vous contactera soit à l'adresse " . $_POST["user_email"] . " ou par téléphone <br> au " 
    . $_POST["user_phone"] . " dans les plus brefs délais pour traiter votre demande: <br><br>" .
    $_POST["user_message"];
}