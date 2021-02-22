<!DOCTYPE HTML>  
<html>
<head>
</head>
<body>  

<?php
// define variables and set to empty values
$firstname = $lastname = $email = $gender = $username = $password = $recovery_email_address = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $firstname = test_input($_POST["firstname"]);
  $lastname = test_input($_POST["lastname"]);
  $gender = test_input($_POST["gender"]);
  $email = test_input($_POST["email"]);
  $username = test_input($_POST["username"]);
  $password = test_input($_POST["password"]);
  $recovery_email_address = test_input($_POST["email"]);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<fieldset><legend>Basic Information:</legend>
<p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  First Name: <input type="text" name="firstname">
  <br>
  <br>
  Last Name: <input type="text" name="lastname">
  <br>
  <br>
  Gender:
  <input type="radio" name="gender" value="female">Female
  <input type="radio" name="gender" value="male">Male
  <input type="radio" name="gender" value="other">Other
  <br>
  <br>
  E-mail: <input type="text" name="email">
  </p>
  </fieldset>

  <fieldset><legend>User Account Information:</legend>
    <p>
      User Name: <input type="text" name="username">
      <br>
      <br>
      Password: <input type="password" name="password">
      <br>
      <br>
      Recovery E-mail Address: <input type="text" name="email">
    </p></fieldset>
  <br>
  <br>
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
echo "<h2>Details Stored:</h2>";
echo "First Name is: ".$firstname;
echo "<br>";
echo "First Name is: ".$lastname;
echo "<br>";
echo "Gender is: ".$gender;
echo "<br>";
echo "E-mail is: ".$email;
echo "<br>";
echo "User Name is: ".$username;
echo "<br>";
echo "Password is: ".$password;
echo "<br>";
echo "Recovery E-mail is: ".$email;

$f = fopen("temp.txt", "a");

fwrite($f, $firstname." ".$lastname."\n".$gender."\n".$email."\n".$username."\n".$password."\n".$email);
?>

</body>
</html>