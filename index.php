<!DOCTYPE html>
<html lang="en">

<body>
   <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
      <h2>Авторизация</h2>
      Введите Логин: <input type="text" name="user"> <br>
      Введите Пароль: <input type="password" name="pass"> <br>
      <input type="submit" name="come" value="Войти"> <br>
      <input type="reset" name="reset" value="Очистить"> <br>
   </form>
   <?php
   require_once 'connect1.php';
   if (isset($_POST["come"])) {
      $link = mysqli_connect($host, $user, $password, $database) or die("Невозможно
подключиться к серверу" . mysqli_error($link));
      $user = $link->query("SELECT id_u, username, password, type, email FROM users");
      // Ввод
      $username = $_POST["user"];
      $password = $_POST["pass"];
      // Для индитификации входа
      $errFlag = false;
      // Проверка вводимых данных
      while ($data = mysqli_fetch_array($user)) {
         $usernameBD = $data['username'];
         $passwordBD = $data['password'];
         $typeBD = $data['type'];
         $idUserBD = $data['id_u'];
         $email = $data['email'];

         if ($username === $usernameBD && md5($password) === $passwordBD) {
            $errFlag = true;
            session_start();
            $_SESSION['type'] = $typeBD;
            $_SESSION['id_u'] = $idUserBD;

            break;
         } else
            $errFlag = false;
      }



      $headers  = "Content-type: text/html; charset=utf-8 \r\n";
      $headers .= "From: От кого письмо <from@example.com>\r\n";
      $headers .= "Reply-To: reply-to@example.com\r\n";

      if ($errFlag && $_SESSION['type'] == 1) {
         $result = $link->query("SELECT email, username FROM users WHERE id_u=" . $_SESSION['id_u']);
         while ($data = mysqli_fetch_array($result)) {
            $email = $data["email"];
            $username = $data["username"];
            $date = date("m.d.y H:i:s");
            mail($email,  "Вход в систему", "Здравствуйте, " . $username . " . Вы зашли в систему в " . $date, $headers);
         }


         header("Refresh:0; url=os.php");
      } elseif ($errFlag && $_SESSION['type'] == 2) {

         $result = $link->query("SELECT email, username FROM users WHERE id_u=" . $_SESSION['id_u']);
         while ($data = mysqli_fetch_array($result)) {
            $email = $data["email"];
            $date = date("m.d.y H:i:s");
            mail($email,  "Вход в систему", "Здравствуйте, " . $username . " . Вы зашли в систему в " . $date, $headers);
         }


         header("Refresh:0; url=os.php");
         header("Refresh:0; url=osAdm.php");
      } else
         echo "Логин или пароль введен не верно";
   }
   ?>
   <br>
   <li><a href="../index.php">Главная страница</a></li>
</body>

</html>
<!DOCTYPE html>