<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Техника безопасности</title>
  <link rel="stylesheet" href="style.css" />
  <link rel="icon" href="img/favicon.png" type="image/x-icon" />
  <!-- Подключаем стили Slick Slider -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css"/>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css"/>
  <style>
    /* Стили для ограничения размера изображений */
    #slider img {
      max-width: 100%; /* Максимальная ширина изображения */
      max-height: 80vh; /* Максимальная высота изображения */
      margin: 0 auto; /* Центрирование изображений */
    }

    /* Стили для контейнера слайдера */
    .slider-container {
      margin-top: 20px; /* Отступ от верха страницы */
      max-width: 1500px; /* Максимальная ширина контейнера */
      margin-left: auto; /* Выравнивание по центру */
      margin-right: auto; /* Выравнивание по центру */
    }

    /* Стили для кнопок перелистывания */
    .slick-prev, .slick-next {
      top: 50%; /* Положение по вертикали относительно контейнера */
      transform: translateY(-50%); /* Смещение вверх на половину высоты кнопки */
      z-index: 1; /* Размещение над слайдами */
      background-color: #005869; /* Цвет фона кнопок */
      border-color: #005869; /* Цвет рамки кнопок */
      border-radius: 100px;
    }
    .slick-prev:hover, .slick-next:hover {
      background-color: #003a47; /* Цвет фона кнопок при наведении */
      border-color: #003a47; /* Цвет рамки кнопок при наведении */
    }
    .slick-prev:before, .slick-next:before {
      color: #ffffff; /* Цвет стрелок */
    }
  </style>
</head>
<body>
  <header id="myHeader">
    <a href="home.php"><img src="img/logo_header.svg" alt="" /></a>
  </header>

  <div class="slider-container">
    <div id="slider">
      <?php
        include 'config.php';

        // Запрос к базе данных для получения изображений
        $sql = "SELECT img_way FROM briefing";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            // Вывод изображений
            echo '<div><img src="' . $row["img_way"] . '" alt="" /></div>';
          }
        } else {
          echo "0 results";
        }

        // Закрытие соединения с базой данных
        $conn->close();
      ?>
    </div>
  </div>

  <!-- Подключаем скрипты Slick Slider и jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
  <script>
    // Инициализация слайдера
    $(document).ready(function(){
      $('#slider').slick({
        dots: true, // Включаем точки навигации
        arrows: true, // Включаем стрелки навигации
        infinite: true, // Бесконечное прокручивание
        slidesToShow: 1, // Количество отображаемых слайдов
        slidesToScroll: 1, // Количество прокручиваемых слайдов
        prevArrow: '<button class="slick-prev slick-arrow" aria-label="Previous" type="button" style="background-color: #005869; border-color: #005869;">Previous</button>',
        nextArrow: '<button class="slick-next slick-arrow" aria-label="Next" type="button" style="background-color: #005869; border-color: #005869;">Next</button>'
      });
    });
  </script>
</body>
</html>
