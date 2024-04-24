<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Добавление продукции</title>
  <link rel="stylesheet" href="style.css" />
  <link rel="icon" href="img/admin_favicon.png" type="image/x-icon" />
</head>
<body>
<header id="myHeader" class="staff_header">
    <a href="admin_home.php"><img src="img/logo_admin_header.svg" alt="" /></a>
</header>

<div class="news_content">
  <div class="title_page">
    <h1>Добавить продукт</h1>
  </div>
  <div class="new_news_content">
    <form class="new_product_form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
      <input type="text" name="title" placeholder="Название продукта" class="title_new_news" required>
      <p>Вставьте изображение</p>
      <input class="input_img_product" type="file" name="image" required accept="image/*">
      <input type="submit" class="send_new_news" value="Добавить">
    </form>
  </div>
</div>

<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Проверяем, что поля не пустые
    if (!empty($_POST['title']) && !empty($_FILES['image']['name'])) {
        // Получаем данные из формы
        $title = $_POST['title'];
        $image_name = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
        $image_url = "img/products/" . $image_name; // Путь для сохранения в базе данных

        // Перемещаем изображение в нужную директорию
        if (move_uploaded_file($image_tmp, $image_url)) {
            // Вставляем продукт в таблицу Products
            $sql = "INSERT INTO Products (name, image_url) VALUES ('$title', '$image_url')";

            if ($conn->query($sql) === TRUE) {
                echo "<p class='success'>Продукт успешно добавлен!</p>";
            } else {
                echo "<p class='error'>Ошибка: " . $sql . "<br>" . $conn->error . "</p>";
            }
        } else {
            echo "<p class='error'>Ошибка при загрузке изображения.</p>";
        }
    } else {
        echo "<p class='error'>Пожалуйста, заполните все поля.</p>";
    }
}

// Закрываем соединение с базой данных
$conn->close();
?>

</body>
</html>
