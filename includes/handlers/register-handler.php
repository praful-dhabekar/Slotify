<?php

function sanitizeFormUsername($textInput)
{
  $textInput = strip_tags($textInput);
  $textInput = str_replace("", "", $textInput);
  return $textInput;
}
function sanitizeFormPassword($textInput)
{
  $textInput = strip_tags($textInput);
  return $textInput;
}

function sanitizeFormString($textInput)
{
  $textInput = strip_tags($textInput);
  $textInput = str_replace("", "", $textInput);
  $textInput = ucfirst(strtolower($textInput));
  return $textInput;
}


  if (isset($_POST['registerButton'])) {
    //register button
    $username = sanitizeFormUsername($_POST['registeUsername']);
    $firstName = sanitizeFormString($_POST['firstName']);
    $lastName = sanitizeFormString($_POST['lastName']);
    $email = sanitizeFormString($_POST['email']);
    $emailConfirm = sanitizeFormString($_POST['emailConfirm']);
    $password = sanitizeFormPassword($_POST['registerPassword']);
    $confirmPassword = sanitizeFormPassword($_POST['confirmPassword']);

    $wasSuccessful =  $account-> register($username, $firstName, $lastName, $email, $emailConfirm, $password, $confirmPassword);


    if ($wasSuccessful == true) {
      $_SESSION['userLoggedIn'] = $username;
      header("Location: index.php");
    }
  }

?>
