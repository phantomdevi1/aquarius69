<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Сотрудникам</title>
  <link rel="stylesheet" href="style.css" />
  <link rel="icon" href="img/favicon.png" type="image/x-icon" />
</head>
<body>
<header id="myHeader">
      <img src="img/logo_header.svg" alt="" />
      <div class="toolbar">
        <a href="index.html">О компании</a>
        <a href="products.php">Продукция</a>
        <a href="news.php">Новости</a>
        <a href="authentication.php">Сотрудникам</a>
        <a href="contacts.html">Контакты</a>
      </div>
    </header>
    
    <div class="auth_block">
    
    <form method="POST">
    <p>Авторизация</p>
    <input class="login_auth" type="text" name="username" placeholder="Логин">
    <input class="pass_auth" type="password" name="password" placeholder="Пароль">
    <input class="auth_btn" type="submit" value="Войти">
    </form>
    <?php
include 'config.php';

// Проверка, была ли отправлена форма
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['username']) && isset($_POST['password'])) {
    // Получение данных из формы
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Подготовка запроса к базе данных для получения информации о пользователе
    $sql = "SELECT * FROM `Users` WHERE `username` = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Пользователь найден, проверяем пароль
        $user = $result->fetch_assoc();
        if ($password === $user['password']) {
          session_start(); // Начинаем сессию
          $_SESSION['user_id'] = $user['user_id']; // Сохраняем id пользователя в сессии
          if ($user['is_admin'] == 1) {
              // Администратор - перенаправление на страницу администратора
              echo "<script>window.location = 'admin_home.php';</script>";
              exit();
          } else {
              // Обычный пользователь - перенаправление на главную страницу
              echo "<script>window.location = 'home.php';</script>";
              exit();
          }
      } else {
            // Неверный пароль, выводим сообщение
            echo "<script>alert('Неверный логин или пароль');</script>";
        }
    } else {
        // Пользователь не найден, выводим сообщение
        echo "<script>alert('Неверный логин или пароль');</script>";
    }
}

// Закрытие подключения к базе данных
$conn->close();
?>
    </div>
    <footer>
  <p class="footer_title">Аквариус на связи</p>
  <div class="adress_footer">
    <p>2А, д. Садыково</p>
    <a href="https://yandex.ru/maps/-/CDVf5I73" target="_blank">посмотреть на карте</a>
  </div>
  <div class="contacts_footer">
    <a class="phone_footer" href="tel:+74957295150">+7 (495) 729-51-50</a>
    <a class="mail_footer" href="question@aq.ru">question@aq.ru</a>
  </div>
  <div class="support_footer">
    <p>Техническая поддержка</p>
    <a class="phone_footer" href="tel:+78002502600">8 800 250-26-00</a>
  </div>
  <div class="network_footer">
    <p>Следите за нами в социальных сетях</p>
    <div class="networl_footer-img">
      <a href="https://dzen.ru/aquarius" target="_blank"><img src="img/dzen.svg" alt=""/></a>
      <a href="https://t.me/aquariuspublic" target="_blank"><img src="img/telegram.svg" alt=""/></a>
      <a href="https://vk.com/gk.aquarius" target="_blank"><img src="img/vk.svg" alt=""/></a>
    </div>
  </div>
</footer>
</body>
</html>
