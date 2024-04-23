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

        $correct_answers = 0;
        foreach ($answers as $question_id => $answer) {
            $sql = "SELECT correct_answer FROM TestQuestions WHERE question_id = '$question_id'";
            $result = $conn->query($sql);
            if ($result->num_rows == 1) {
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
          echo "<center>";
            echo "<p>Вы успешно прошли тест! Ваш результат: $score% правильных ответов.</p>";
            $conn->close();
            echo "<p>Вы будете перенаправлены на главную страницу через 10 секунд...</p>";
            echo "<meta http-equiv='refresh' content='10;url=home.php'>";
            echo "</center>";
            exit();
        } else {
            echo "Ошибка: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Не были получены ответы.";
    }
}
?>
