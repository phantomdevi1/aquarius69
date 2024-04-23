<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Результаты тестирования</title>
  <link rel="stylesheet" href="style.css" />
  <link rel="icon" href="img/admin_favicon.png" type="image/x-icon" />
  <style>    
    .passed {
      color: green;
    }
    .failed {
      color: red;
    }
  </style>
</head>
<body>
<header id="myHeader">
    <a href="admin_home.php"><img src="img/logo_admin_header.svg" alt="" /></a>
</header>

<div class="test_result-content">
  <div class="title_page">
    <h1>Результаты тестирования</h1>
  </div>
  <table>
    <tr>
      <th>ФИО сотрудника</th>
      <th>Логин</th>
      <th>Процент теста</th>
      <th>Дата прохождения</th>
    </tr>
    <?php
    include 'config.php';

    // Запрос к базе данных для получения информации о результатах тестирования
    $sql = "SELECT PersonalData.first_name, PersonalData.last_name, PersonalData.patronymic, Users.username, TestResults.score, TestResults.date
            FROM PersonalData
            INNER JOIN Users ON PersonalData.user_id = Users.user_id
            INNER JOIN TestResults ON PersonalData.user_id = TestResults.user_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        // Определяем цвет в зависимости от процента теста
        $color_class = ($row['score'] > 87) ? 'passed' : 'failed';

        // Выводим информацию о результатах тестирования в таблицу
        echo "<tr>";
        echo "<td>" . $row['last_name'] . " " . $row['first_name'] . " " . $row['patronymic'] . "</td>";
        echo "<td>" . $row['username'] . "</td>";
        echo "<td class='$color_class'>" . $row['score'] . "%</td>";
        echo "<td>" . $row['date'] . "</td>";
        echo "</tr>";
      }
    } else {
      echo "<tr><td colspan='4'>Нет данных о результатах тестирования.</td></tr>";
    }

    // Закрываем соединение с базой данных
    $conn->close();
    ?>
  </table>
</div>

</body>
</html>
