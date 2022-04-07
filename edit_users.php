<html>
<?php
include("checks.php");
require_once 'connect1.php';
$link = mysqli_connect($host, $user, $password, $database) or die("Ошибка " . mysqli_error($link));
$query = "SELECT username, password, type, email FROM users WHERE id_u=" . $_GET['id_u'];
$rows = mysqli_query($link, $query);

if ($_SESSION['type'] == 2) {
   if ($rows) {
      if (mysqli_num_rows($rows) > 0) {
         while ($st = mysqli_fetch_array($rows)) {
            $id_u = $_GET['id_u'];
            $name = $st['username'];
            $password = $st['password'];
            $type = $st['type'];
            $email = $st['email'];
         }
      }
   }
   echo "<form action='save_edit_users.php' metod='get'>";
   echo "Логин: <td> <input name='username' size='50' type='text' value='" . $name . "'> <br>";
   echo "Пароль: <input name='password' size='20' type='text' value='" . $password . "'><br>";
   echo "Тип: <input name='type' size='1' type='text' value='" . $type . "'><br>";
   echo "email: <input name='email' type='email' value='" . $email . "'><br>";
   echo "<input type='hidden' name='id_u' value='" . $id_u . "'> <br>";
   echo "<input type='submit' name='' value='Сохранить'>";
   echo "</form>";
   echo "<p><a href=\"usersAdm.php\"> Вернуться к списку пользователей </a>";
} elseif ($_SESSION['type'] == 1) {
   if ($rows) {
      if (mysqli_num_rows($rows) > 0) {
         while ($st = mysqli_fetch_array($rows)) {
            $id_u = $_GET['id_u'];
            $name = $st['username'];
            $password = $st['password'];
            $email = $st['email'];
         }
      }
   }
   echo "<form action='save_edit_users.php' metod='get'>";
   echo "Логин: <td> <input name='username' size='50' type='text' value='" . $name . "'> <br>";
   echo "Пароль: <input name='password' size='20' type='text' value='$password'><br>";
   echo "email: <input name='email' type='email' value='" . $email . "'><br>";
   echo "<input type='hidden' name='id_u' value='" . $id_u . "'> <br>";
   echo "<input type='submit' name='' value='Сохранить'>";
   echo "</form>";
   echo "<p><a href=\"os.php\"> Вернуться к списку пользователей </a>";
}
mysqli_free_result($rows);

?>

</html>