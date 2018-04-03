<?php
  include 'includes\config.php';
  include 'includes\classes\Account.php';
  include 'includes\classes\Constants.php';

  $account = new Account($con);

  include 'includes\handlers\register-handler.php';
  include 'includes\handlers\login-handler.php';

  function getInputValue($name)
  {
    if (isset($_POST[$name])) {
      echo $_POST[$name];
    }
  }
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Welcome to Slotify!</title>
    <link rel="icon" type="image/png" href="assets/images/icons/spotify.png"/>
    <link rel="stylesheet" href="assets\css\register.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="assets\js\register.js"></script>
  </head>
  <body>
    <?php
    	   if (isset($_POST['registerButton'])) {
           echo '<script>
                   $(document).ready(function() {
                       $("#loginForm").hide();
                       $("#registerForm").show();
                   });
               </script>';
         }else {
           echo '<script>
                   $(document).ready(function() {
                       $("#loginForm").show();
                       $("#registerForm").hide();
                   });
               </script>';
         }
     ?>
    <div id="background">
      <div id="loginContainer">
          <div id="inputContainer">
              <form id="loginForm" action="register.php" method="post">
                <h2>Login to your account</h2>
                <p>
                  <label for="loginUsername"> Username: </label>
                  <input type="text" id="loginUsername" name="loginUsername" value="<?php getInputValue('loginUsername'); ?>" >
                </p>

                <p>
                  <label for="loginPassword"> Password: </label>
                  <input type="password" id="loginPassword" name="loginPassword" value="" required> <br>
                </p>
                <?php echo $account->getError(Constants::$loginFailed); ?> <br>
                <button id="loginbtn" type="submit" name="loginButton">LOG IN</button>

                <div class="hasAccountText">

                        <span id="hideLogin">Don't have a account yet? Signup here.</span>

                </div>
              </form>


              <form id="registerForm" action="register.php" method="post">
                <h2>Register to your account</h2>
                <p>
                  <label for="registeUsername"> Username: </label>
                  <input type="text" id="registeUsername" name="registeUsername" value="<?php getInputValue('registeUsername'); ?>" required>
                  <?php echo $account->getError(Constants::$usernameCharacters); ?>
                  <?php echo $account->getError(Constants::$usernameTaken); ?>
                </p>

                <p>
                  <label for="firstName"> First Name: </label>
                  <input type="text" id="firstName" name="firstName" value="<?php getInputValue('firstName'); ?>" required>
                  <?php echo $account->getError(Constants::$firstNameCharacters); ?>
                </p>
                <p>
                  <label for="lastName"> Last Name: </label>
                  <input type="text" id="lastName" name="lastName" value="<?php getInputValue('lastName'); ?>" required> <br>
                  <?php echo $account->getError(Constants::$lastNameCharacters); ?>
                </p>
                <p>
                  <label for="email"> Email: </label>
                  <input type="text" id="email" name="email" value="<?php getInputValue('email'); ?>" required> <br>
                  <?php echo $account->getError(Constants::$emailInvalid); ?>
                  <?php echo $account->getError(Constants::$emailTaken); ?>
                </p>

                <p>
                  <label for="emailConfirm"> Confirm Email: </label>
                  <input type="text" id="emailConfirm" name="emailConfirm" value="<?php getInputValue('emailConfirm'); ?>" required> <br>
                  <?php echo $account->getError(Constants::$emailsDoNotMatch); ?>
                </p>

                <p>
                  <label for="registerPassword"> Password: </label>
                  <input type="password" id="registerPassword" name="registerPassword" value="" required>
                  <?php echo $account->getError(Constants::$passwordNotAlphaNumeric); ?>
                  <?php echo $account->getError(Constants::$passwordCharacters); ?>
                </p>

                <p>

                  <label for="confirmPassword"> Confirm Password: </label>
                  <input type="password" id="confirmPassword" name="confirmPassword" value="" required>
                  <?php echo $account->getError(Constants::$passwordsDoNotMatch); ?>
                </p>

                <button type="submit" name="registerButton">SIGN UP</button>
                <div class="hasAccountText">

                        <span id="hideRegister">Already have an account? Login here.</span>

                </div>
              </form>
          </div>
          <div id="loginText">
              <h1>Get great music, right now</h1>
              <h2>Listen to loads of songs for free</h2>
              <ul>
                <li>Discover music you fall in love with</li>
                <li>Create your playlists</li>
                <li>Follow artists to keep up to date</li>
              </ul>
          </div>
        </div>
      </div>
  </body>
</html>
