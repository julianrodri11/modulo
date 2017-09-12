

<?php
echo "passgord basico";
?><br><?php
$password = "jamiltonmm1";
echo $password;

if (preg_match("/^.*(?=.{8,})(?=.*[0-9])(?=.*[a-z]).*$/", $password)) {
  echo "Password Seguro.";
} else {
  echo "Password Inseguro.";
}

?><br><?php
echo "pasword medio";
?><br><?php
$password1 = "Jamilton123";
echo $password1;

if (preg_match("/^.*(?=.{8,})(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).*$/", $password1)) {
  echo "Password Seguro.";
} else {
  echo "Password Inseguro.";
}
?><br><?php
echo "password alto";
$password2 = "Jamilton&1";
echo $password2;

if (preg_match("/^.*(?=.{8,})(?=.*\W)(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).*$/", $password2)) {
  echo "Password Seguro.";
} else {
  echo "Password Inseguro.";
}

?><br><?php
$email = "johnudoe@exampl.ecom";

if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
  echo ("$email es  valido");
} else {
  echo ("$email es invalido");
}

echo("___________________________________ ");
echo "<br>";
$password2 = "fdszs&fdsd";
echo $password2;

if (preg_match("/^.*(w.%+){1,64}@.*$/", $password2)) {
  echo "hay correo valido";
} else {
  echo "no haycorreo valido  ";
}
