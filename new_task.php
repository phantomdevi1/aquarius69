<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Добавление вопросов</title>
  <link rel="stylesheet" href="style.css" />
  <link rel="icon" href="img/admin_favicon.png" type="image/x-icon" />
</head>
<body>
<header id="myHeader" class="staff_header">
  <a href="admin_home.php"><img src="img/logo_admin_header.svg" alt=""></a>
</header>
<div class="new_user-content">
  <div class="title_page">
    <h1>Добавить вопрос</h1>
  </div>
  
  <?php
  // Проверяем, был ли успешно добавлен вопрос
  if (isset($_GET['success']) && $_GET['success'] == 1) {
      echo '<center></center><p class="success_message">Вопрос успешно добавлен в тест!</p></center>';
  }
  ?>
  <form method="post" class="form_question">
    <!-- Скрытое поле для test_id -->
    <input type="hidden" name="test_id" value="1">
    <textarea class="textarea_question_form" name="question_text" placeholder="Текст вопроса"  required></textarea>
    <div class="option_question_form">
      <input class="option_question_text" type="text" name="option_text[]" placeholder="Вариант ответа" required>
      <input class="option_question_checkbox" type="checkbox" name="is_correct[]"><span>Правильный</span>
    </div>
    <button class="new_option_question" type="button" onclick="addOption()">Добавить вариант</button>
    <input class="submit_option_question" type="submit" value="Добавить вопрос">
  </form>
</div>


<script>
function addOption() {
  const container = document.querySelector('.form_question');
  const newOption = document.createElement('div');
  newOption.classList.add('option_question_form');
  newOption.innerHTML = `
    <input class="option_question_text" type="text" name="option_text[]" placeholder="Вариант ответа" required>
    <input class="option_question_checkbox" type="checkbox" name="is_correct[]"> Правильный
  `;
  container.appendChild(newOption);
}
</script>

<?php
// Подключение к базе данных
include 'config.php'; // Убедитесь, что этот файл содержит информацию для подключения к вашей БД

// Проверка, что данные были отправлены методом POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Получаем данные из формы
    $test_id = $_POST['test_id'];
    $question_text = $_POST['question_text'];
    $option_texts = $_POST['option_text'];
    $is_corrects = $_POST['is_correct'];

    // Вставка вопроса в таблицу TestQuestions
    $query = $conn->prepare("INSERT INTO TestQuestions (test_id, question_text) VALUES (?, ?)");
    $query->bind_param("is", $test_id, $question_text);
    $query->execute();
    $question_id = $query->insert_id; // Получаем ID вставленного вопроса

    // Вставка вариантов ответов в таблицу QuestionOptions
    $query = $conn->prepare("INSERT INTO QuestionOptions (question_id, option_text, is_correct) VALUES (?, ?, ?)");
    foreach ($option_texts as $index => $option_text) {
        $is_correct = isset($is_corrects[$index]) ? 1 : 0; // Проверяем, отмечен ли checkbox
        $query->bind_param("isi", $question_id, $option_text, $is_correct);
        $query->execute();
    }

    // Закрытие запроса и соединения
    $query->close();
    $conn->close();

    // Переадресация обратно на форму с сообщением об успешном добавлении
    header("Location: new_task.php?success=1");
    exit;
}
?>

</body>
</html>
