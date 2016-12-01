<?php

$signupEmail = "";
$signupEmailError = "";
$signupPassword = "";
$signupPasswordError = "";
$loginEmail = "";
$loginEmailError = "";
$loginPassword = "";
$loginPasswordError = "";
$loginSavedEmail = "";
$role = "";
$phone = "";


// LOGIN EMAIL
if (isset($_POST["loginEmail"])) {
    if (empty($_POST["loginEmail"])) {
        $loginEmailError = "insert e-mail";
    }
}

if(isset($_POST["loginPassword"])){
    if(empty($_POST["loginPassword"])){
        $loginPasswordError="insert password";
    }
}

// SIGNUP EMAIL
if (isset($_POST["signupEmail"])) {
    if (empty ($_POST["signupEmail"])) {
        $signupEmailError = " field is required";
    } else {
        $signupEmail = $_POST["signupEmail"];
    }
}

if (isset($_POST["signupPassword"])) {
    if (empty ($_POST["signupPassword"])) {
        $signupPasswordError = " field is required";
    } else {
        $signupPassword = $_POST["signupPassword"];
    }
}

// Kontrollin, kas signupEmailError ja signupPasswordError on "" ehk e-post ja parool on sisestatud
if ($signupEmailError == "" &&
    $signupPasswordError == "" &&
    isset($_POST["signupEmail"]) &&
    isset($_POST["signupPassword"])
) {
//see osa on vajalik vaid testimiseks, kas eelnev on õige
    echo "Salvestan.. <br>";
    echo "email: ".$signupEmail."<br>";
    echo "parool: ".$_POST["signupPassword"]."<br>";
// parool krüpteeritakse
    $password = hash("sha512", $_POST["signupPassword"]);

    echo $password."<br>";
// signup FUNCTION
    signup($signupEmail, $password);
}

$notice = "";

if (isset($_POST["loginEmail"]) &&
    isset($_POST["loginPassword"]) &&
    !empty($_POST["loginEmail"]) &&
    !empty($_POST["loginPassword"])
) {
// login Autofill
    $loginSavedEmail = $_POST["loginEmail"];
//
    $notice = login ($_POST["loginEmail"], $_POST["loginPassword"]);
}

?>


<!DOCTYPE html>
<html>
<head>
    <title>tipit dirty</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./main.css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
</head>
<body>
<div class="wrapper">


<div class="signup">
    <form method="POST" class="signup__form">
        
        <select name="role_choice" class="form__field">
                <option value="Client">Client</option>
                <option value="Employee">Employee</option>
                <option value="Employer">Employer</option>
        </select>
        <input type="text" placeholder="optional phone number" name="phone" value="" class="form__field field--optional">
        <input type="email" placeholder="your e-mail" name="signupEmail" value="" class="form__field">
        <input type="text" placeholder="optional first name" name="firstname" value="" class="form__field field--optional">
        <input type="text" placeholder="optional last name" name="lastname" value="" class="form__field field--optional">
        <input type="password" class="form__field" name="signupPassword"><?php echo $signupPasswordError; ?>
        <input type="submit" value="register" class="form__button">
    </form>
</div>
</div>

</body>
</html>