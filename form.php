<!DOCTYPE html>
<html>
<head>
</head>    
<body>
<?php
echo $_GET["name"]; ?><br>
Your email address is: <?php echo $_GET["email"];
?>
<form action = "welcome.php" method="post">
Name : <input type = "text" name ="name"> <br>
E-mail : <input type = "text" name ="email"><br>
<input type ="Submit">
</body>
</html>