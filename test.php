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

                // Запрос к базе данных для получения вариантов ответов для текущего вопроса
                $question_id = $row["question_id"];
                $options_sql = "SELECT * FROM QuestionOptions WHERE question_id = $question_id";
                $options_result = $conn->query($options_sql);

                if ($options_result->num_rows > 0) {
                    while($option_row = $options_result->fetch_assoc()) {
                        // Отображаем варианты ответов
                        echo '<label><input type="radio" name="answer[' . $question_id . ']" value="' . $option_row["option_id"] . '"> ' . $option_row["option_text"] . '</label><br>';
                    }
                } else {
                    echo "Нет вариантов ответов для этого вопроса.";
                }
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