<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Продукция</title>
  <link rel="stylesheet" href="style.css" />
  <link rel="icon" href="img/favicon.png" type="image/x-icon" />
</head>
<body>
<header id="myHeader">
  <img src="img/logo_header.svg" alt="" />
  <div class="toolbar">
        <a href="index.html">О компании</a>
        <a href="products.php">Продукция</a>
        <a href="news.php">Новости</a>
        <a href="authentication.php">Сотрудникам</a>
        <a href="contacts.html">Контакты</a>
      </div>
</header>

<div class="content_products">
  <div class="title_page">
    <h1>Продукция</h1>
  </div>
  <div class="content_products-cards">
    <?php
    include 'config.php';

    // Запрос к базе данных
    $sql = "SELECT `name`, `image_url` FROM `Products`";
    $result = $conn->query($sql);

    // Вывод данных
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        echo '<div class="product_block">';
        echo '<p>' . $row["name"] . '</p>';
        echo '<img src="' . $row["image_url"] . '" alt="">';
        echo '</div>';
      }
    } else {
      echo "0 результатов";
    }
    $conn->close();
    ?>
  </div>
  <a class="where_buy" href="https://www.aq.ru/where-buy/"><button>Где купить?</button></a>
</div>

<footer>
  <p class="footer_title">Аквариус на связи</p>
  <div class="adress_footer">
    <p>2А, д. Садыково</p>
    <a href="https://yandex.ru/maps/-/CDVf5I73" target="_blank">посмотреть на карте</a>
  </div>
  <div class="contacts_footer">
    <a class="phone_footer" href="tel:+74957295150">+7 (495) 729-51-50</a>
    <a class="mail_footer" href="question@aq.ru">question@aq.ru</a>
  </div>
  <div class="support_footer">
    <p>Техническая поддержка</p>
    <a class="phone_footer" href="tel:+78002502600">8 800 250-26-00</a>
  </div>
  <div class="network_footer">
    <p>Следите за нами в социальных сетях</p>
    <div class="networl_footer-img">
      <a href="https://dzen.ru/aquarius" target="_blank"><img src="img/dzen.svg" alt=""/></a>
      <a href="https://t.me/aquariuspublic" target="_blank"><img src="img/telegram.svg" alt=""/></a>
      <a href="https://vk.com/gk.aquarius" target="_blank"><img src="img/vk.svg" alt=""/></a>
    </div>
  </div>
</footer>

<script src="sticky.js"></script>
</body>
</html>
