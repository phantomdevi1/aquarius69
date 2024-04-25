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
<header id="myHeader" class="staff_header">
    <a href="home.php"><img src="img/logo_header.svg" alt="" /></a>
</header>

<div class="test_content">
<div class="title_page">
    <h1>Тестирование</h1>
  </div>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="test_form">
        <?php
        include 'config.php';

        session_start();
        $user_id = $_SESSION['user_id']; // Получаем ID пользователя из сессии
        $test_id = 1; // Предполагаем, что тест имеет id 1, если другой, замените значение
        $date = date('Y-m-d'); // Получаем текущую дату

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Проверяем, были ли отправлены данные формы
            if(isset($_POST['answer'])) {
                $answers = $_POST['answer']; // Получаем ответы из формы
                
                // Проверяем, что все радио-кнопки были выбраны
                $all_answered = true;
                foreach ($answers as $question_id => $answer) {
                    if (empty($answer)) {
                        $all_answered = false;
                        break;
                    }
                }

                if ($all_answered) {
                    $correct_answers = 0;
                    foreach ($answers as $question_id => $answer) {
                        $sql = "SELECT correct_answer FROM TestQuestions WHERE question_id = '$question_id'";
                        $result = $conn->query($sql);
                        if ($result && $result->num_rows == 1) {
                            $row = $result->fetch_assoc();
                            if ($row['correct_answer'] == $answer) {
                                $correct_answers++;
                            }
                        }
                    }

                    // Рассчитываем процент правильных ответов
                    $total_questions = count($answers);
                    $score = ($correct_answers / $total_questions) * 100;

                    // Добавляем результат теста в таблицу TestResults
                    $sql = "INSERT INTO TestResults (user_id, test_id, score, date) VALUES ('$user_id', '$test_id', '$score', '$date')";
                    if ($conn->query($sql) === TRUE) {
                        echo "<script>alert('Вы успешно прошли тест! Ваш результат: $score% правильных ответов.');";
                        echo "window.location.href = 'home.php';</script>";
                        exit();
                    } else {
                        echo "Ошибка: " . $sql . "<br>" . $conn->error;
                    }
                } else {
                    echo "<script>alert('Пожалуйста, выберите ответы на все вопросы.');</script>";
                }
            } else {
                echo "Не были получены ответы.";
            }
        }

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
        <input type="submit" value="Завершить" class="send_test" onclick="return validateForm()">
    </form>
</div>

<script>
    function validateForm() {
        var answers = document.querySelectorAll('input[type="radio"]:checked');
        var totalQuestions = document.querySelectorAll('.question').length;
        var answeredQuestions = answers.length;

        if (answeredQuestions < totalQuestions) {
            alert("Пожалуйста, выберите ответы на все вопросы.");
            return false;
        }

        return true;
    }
</script>

</body>
</html>
