<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Тест</title>
  <link rel="stylesheet" href="style.css" />
  <link rel="icon" href="img/favicon.png" type="image/x-icon" />
</head>
<body>
<header id="myHeader">
    <a href="home.php"><img src="img/logo_header.svg" alt="" /></a>
</header>

<div class="test_content">
<div class="title_page">
    <h1>Тестирование</h1>
  </div>
    <form action="process_test.php" method="post" class="test_form">
        <?php
        include 'config.php';

        session_start();
        $user_id = $_SESSION['user_id']; // Получаем ID пользователя из сессии

        // Запрос к базе данных для получения вопросов теста
        $sql = "SELECT * FROM TestQuestions";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                // Выводим вопросы
                echo '<div class="question">';
                echo '<h3>' . $row["question_text"] . '</h3>';
                // Отображаем варианты ответов
                echo '<label><input type="radio" name="answer[' . $row["question_id"] . ']" value="1"> Вариант 1</label><br>';
                echo '<label><input type="radio" name="answer[' . $row["question_id"] . ']" value="2"> Вариант 2</label><br>';
                echo '<label><input type="radio" name="answer[' . $row["question_id"] . ']" value="3"> Вариант 3</label><br>';
                echo '</div>';
            }
        } else {
            echo "Нет вопросов для тестирования.";
        }

        // Закрываем соединение с базой данных
        $conn->close();
        ?>
        <input type="submit" value="Завершить" class="send_test">
    </form>
</div>

</body>
</html>
