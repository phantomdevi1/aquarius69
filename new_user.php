<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Добавление пользователя</title>
  <link rel="stylesheet" href="style.css" />
  <link rel="icon" href="img/admin_favicon.png" type="image/x-icon" />
</head>
<body>
<header id="myHeader" class="staff_header">
    <a href="admin_home.php"><img src="img/logo_admin_header.svg" alt="" /></a>
</header>

<div class="new_user-content">
  <div class="title_page">
    <h1>Добавить пользователя</h1>
  </div>
  <?php
include 'config.php'; // Убедитесь, что это файл с настройками вашего соединения с базой данных

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $is_admin = $_POST['is_admin'];

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $patronymic = $_POST['patronymic'];
    $passport_series = $_POST['passport_series'];
    $passport_number = $_POST['passport_number'];
    $issue_date = $_POST['issue_date'];
    $issued_by = $_POST['issued_by'];
    $birth_date = $_POST['birth_date'];
    $birth_place = $_POST['birth_place'];

    // Вставка в таблицу Users
    $sql = "INSERT INTO Users (username, password, is_admin) VALUES ('$username', '$password', '$is_admin')";
    if ($conn->query($sql) === TRUE) {
        $user_id = $conn->insert_id; // Получаем ID только что добавленного пользователя

        // Вставка в таблицу PersonalData
        $sql = "INSERT INTO PersonalData (user_id, first_name, last_name, patronymic, passport_number, passport_series, issue_date, issued_by, birth_date, birth_place) VALUES ('$user_id', '$first_name', '$last_name', '$patronymic', '$passport_number', '$passport_series', '$issue_date', '$issued_by', '$birth_date', '$birth_place')";
        if ($conn->query($sql) === TRUE) {
            echo "<center><p>Пользователь успешно добавлен</p></center>";
        } else {
            echo "<p>Ошибка: " . $sql . "<br>" . $conn->error . "</p>";
        }
    } else {
        echo "<p>Ошибка: " . $sql . "<br>" . $conn->error . "</p>";
    }
    $conn->close();
}
?>
  <form method="POST" class="user_form">
    <div class="user_login">
    <!-- Данные пользователя -->
    <input class="input_login" type="text" name="username" placeholder="Логин" required>
    <input class="input_password" type="password" name="password" placeholder="Пароль" required>
    <select name="is_admin" class="user_login-admin">
      <option value="0">Пользователь</option>
      <option value="1">Администратор</option>
    </select>
    </div>
    <div class="user_passport">
    <!-- Персональные данные -->
    <input class="user_last_name" type="text" name="last_name" placeholder="Фамилия" required>
    <input class="user_name" type="text" name="first_name" placeholder="Имя" required>
    <input class="user_patronymic" type="text" name="patronymic" placeholder="Отчество">
    <input class="passport_series" type="text" name="passport_series" placeholder="Серия паспорта"   minlength="4"  maxlength="4" required>
    <input class="passport_number" type="text" name="passport_number" placeholder="Номер паспорта" minlength="6"  maxlength="6" required>
    <p class="date_text_user">Дата выдачи:</p>
    <input class="issue_date" type="date" name="issue_date" required>
    <input class="issued_by" type="text" name="issued_by" placeholder="Кем выдан" required>
    <p class="date_text_user">Дата рождения:</p>
    <input class="birth_date" type="date" name="birth_date" required>
    <input class="birth_place" type="text" name="birth_place" placeholder="Место рождения" required>
    </div>
    <input class="new_user-btn" type="submit" value="Добавить">
  </form>
</div>



</body>
</html>
