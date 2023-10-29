<html>
<head>
<style>
.errorColor {color: #D30000;}
</style>
</head>
<body> 
  
<script>
        function validateForm(){
            let x = document.forms["input_data"];
            if (confirm("Are you filled the required filled! Then click the Ok button")) {
                    alert("Success Alert : thank you for filling : )");
                } else {
                    alert("cancelled :/");

                }
            if(x == ""){
                alter("must be filled out");
                return false;
            }
        }
    </script>

<?php
// all required variables defined here
//$nameError = $emailError = telError = "";
$nameError = $emailError = $telError = "";
$name = $email = $tel = $message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameError = "Name is mandatory";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameError = "Only letters allowed";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailError = "Email is mandatory";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailError = "Invalid email format";
    }
  }

  if (empty($_POST["tel"])) {
    $telError = "Contact number is mandatory";
  } else {
    $tel = test_input($_POST["tel"]);
    // check if e-mail address is well-formed
    if(preg_match('/^[6-9]{1}[0-9]{9}+$/', $tel)) {
      echo "Valid Contact Number";
      } else {
      echo "Invalid Contact Number";
      }
  }

    
  if (empty($_POST["message"])) {
    $message = "";
  } else {
    $message = test_input($_POST["message"]);
  }

}

function test_input($data) {
  $data = trim($data);   
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2><u>PHP Form With Validation</u></h2>
<p><span class="errorColor">* mandatory field</span></p>
<form method="POST" action="testing2.php" name="input_data" onsubmit="return validateForm()" >
  
  Name: <input type="text" name="name">
  <span class="errorColor">* <?php echo $nameError;?></span>
  <br><br>
  
  E-mail: <input type="text" name="email">
  <span class="errorColor">* <?php echo $emailError;?></span>
  <br><br>

  Contact No.: <input type="tel" name="tel">
  <span class="errorColor">* <?php echo $telError;?></span>
  <br><br>
  
  Message: <textarea name="message" rows="6" cols="24"></textarea>
  <br><br>

  <button type="submit" id="submit" name="submit" value="Submit">submit</button>  
</form>
</body>
</html>