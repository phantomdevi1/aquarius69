<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Добавление новостей</title>
  <link rel="stylesheet" href="style.css" />
  <link rel="icon" href="img/admin_favicon.png" type="image/x-icon" />
</head>
<body>
<header id="myHeader" class="staff_header">
    <a href="admin_home.php"><img src="img/logo_admin_header.svg" alt="" /></a>
</header>

<div class="news_content">
  <div class="title_page">
    <h1>Добавить новость</h1>
  </div>
  <div class="new_news_content">
    <form action="" method="post">
      <input type="text" name="title" placeholder="Заголовок" class="title_new_news" required>
      <textarea name="content" cols="30" rows="10" placeholder="Новость" required></textarea>
      <input type="submit" class="send_new_news" value="Опубликовать">
    </form>
  </div>
</div>

<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Проверяем, что поля не пустые
    if (!empty($_POST['title']) && !empty($_POST['content'])) {
        // Получаем данные из формы
        $title = $_POST['title'];
        $content = $_POST['content'];
        $date = date('Y-m-d');

        // Вставляем новость в таблицу News
        $sql = "INSERT INTO News (title, content, date) VALUES ('$title', '$content', '$date')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Новость успешно опубликована!');</script>";
        } else {
            echo "Ошибка: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "<script>alert('Пожалуйста, заполните все поля.');</script>";
    }
}

// Закрываем соединение с базой данных
$conn->close();
?>

</body>
</html>