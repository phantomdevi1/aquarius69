

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Главная</title>
  <link rel="stylesheet" href="style.css" />
  <link rel="icon" href="img/favicon.png" type="image/x-icon" />
</head>
<body>
<header id="myHeader" class="staff_header">
      <img src="img/logo_header.svg" alt="" />
</header>

<div class="user_home_content">
<?php
session_start(); // Начинаем сессию
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['logout'])) {
    // Если нажата кнопка выхода, очищаем сессию и перенаправляем на страницу аутентификации
    session_unset(); // Очищаем все данные сессии
    session_destroy(); // Уничтожаем сессию
    header("Location: authentication.php");
    exit();
}

// Проверяем, существует ли сессия с id пользователя
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    // Подготовка запроса к базе данных для получения информации о пользователе из таблицы PersonalData
    $sql = "SELECT * FROM `PersonalData` WHERE `user_id` = '$user_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Получение данных о пользователе
        $user_data = $result->fetch_assoc();
        $full_name = $user_data['last_name'] . ' ' . $user_data['first_name'] . ' ' . $user_data['patronymic'];
        // Выводим приветствие с именем пользователя
        echo "<p>Добро пожаловать, $full_name</p>";
    } else {
        echo "<p>Ошибка: Данные пользователя не найдены</p>";
    }
} else {
    echo "<p>Ошибка: Пользователь не авторизован</p>";
}

// Закрываем подключение к базе данных
$conn->close();
?>
    <button class="home_btn" onclick="document.location='briefing.php'">Техника безопасности</button>
    <button class="home_btn" onclick="document.location='test.php'">Пройти тест</button>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="form_exit_btn"> <!-- Форма для кнопки выхода -->
        <input type="submit" name="logout" class="exit_btn" value="Выйти">
    </form>
</div>
</body>
</html>
