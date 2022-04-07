<html>

<body>
   <?php
   include("checks.php");
   require_once 'connect1.php';
   $link = mysqli_connect($host, $user, $password, $database);

   /* проверка соединения */
   if (mysqli_connect_errno()) {
      printf("Не удалось подключиться: %s\n", mysqli_connect_error());
      exit();
   }
   if ($_SESSION['type'] == 2) {
      mysqli_query($link, "UPDATE users SET username='" . $_GET['username'] . "', password='" . md5($_GET['password']) . "', `type`='" . $_GET['type'] . "', email='" . $_GET['email'] . "' WHERE id_u=" . $_GET['id_u']);
      if (mysqli_affected_rows($link) > 0) {
         $result = $link->query("SELECT email, username FROM users WHERE id_u=" . $_GET['id_u']);
         while ($data = mysqli_fetch_array($result)) {
            $email = $data["email"];
            $username = $data["username"];
            mail($email, "Изменение данных", "Здравствуйте" . $username . ". Пароль или логин были изменены на " . $_GET['username'] . " и " . $_GET['password']);
         }


         print "<p>Все сохранено.";
         print "<p><a href=\"usersAdm.php\"> Вернуться к списку пользователей </a>";
      } else {
         print "<p>Ошибка сохранения.";
         print "<p><a href=\"usersAdm.php\">Вернуться к списку пользователей</a> ";
      }
   } elseif ($_SESSION['type'] == 1) {
      mysqli_query($link, "UPDATE users SET username='" . $_GET['username'] . "', password='" . md5($_GET['password']) . "' WHERE id_u=" . $_GET['id_u']);
      if (mysqli_affected_rows($link) > 0) {
         $result = $link->query("SELECT email, username FROM users WHERE id_u=" . $_GET['id_u']);
         while ($data = mysqli_fetch_array($result)) {
            $email = $data["email"];
            $username = $data["username"];
            mail($email, "Изменение данных", "Здравствуйте" . $username . ". Пароль или логин были изменены на " . $_GET['username'] . " и " . $_GET['password']);
         }


         print "<p>Все сохранено.";
         print "<p><a href=\"os.php\"> На главную </a>";
      } else {
         print "<p>Ошибка сохранения.";
         print "<p><a href=\"os.php\">На главную</a> ";
      }
   }


   mysqli_close($link);
   ?>
</body>

</html>