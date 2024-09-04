<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php
$nameErr = $emailErr = $genderErr = $AgeErr = "";
$name = $email = $gender = $comment = $Age = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $valid = true;
  
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
    $valid = false;
  } else {
    $name = test_input($_POST["name"]);
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
    $valid = false;
  } else {
    $email = test_input($_POST["email"]);
  }
    
  if (empty($_POST["Age"])) {
    $AgeErr = "Age is required";
    $valid = false;
  } else {
    $Age = test_input($_POST["Age"]);
    if (!is_numeric($Age)) {
      $AgeErr = "Age must be a number";
      $valid = false;
    }
  }

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
    $valid = false;
  } else {
    $gender = test_input($_POST["gender"]);
  }

  if ($valid) {
    header("Location: project.html");
    exit();
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>Please fill in this form</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  Name: <input type="text" name="name">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  Age: <input type="text" name="Age">
  <span class="error">* <?php echo $AgeErr;?></span>
  <br><br>
  Comment: <textarea name="comment" rows="5" cols="40"></textarea>
  <br><br>
  Gender:
  <input type="radio" name="gender" value="female">Female
  <input type="radio" name="gender" value="male">Male
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

<a href="project.html">Go to Project Page</a>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && !$nameErr && !$emailErr && !$AgeErr && !$genderErr) {
  
}
?>

</body>
</html>