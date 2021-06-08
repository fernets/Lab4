<?php
session_start();
include("db.php");
$comments = $connect->query("SELECT * FROM Comments ORDER BY id DESC LIMIT 6");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link href="https://fonts.googleapis.com/css2?family=Roboto&family=Roboto+Condensed:wght@400;700&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/slick.css">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <header class="header">
    <div class="container">
      <div class="header-top">
        <div class="logo">
          <a href="#">
            <img src="images/logo.png" alt="">
          </a>
        </div>
        <?php if(isset($_SESSION['id'])){
          $id=$_SESSION['id'];
          $request = $connect->query("SELECT name FROM Users WHERE id=$id");
          $user = $request->fetch_array();?>
        <a href="exit.php" class="header-btn"><?php echo $user['name']?></a>
        <?php } ?>
      </div>
      <div class="header-content">
        <h1 class="header-content__title">
          Roadster
        </h1>
        <?php if(!isset($_SESSION['id'])){?>
        <form action="login.php" method="POST">
        <div class="header-content__text">
          <input type="text" class="input" placeholder="Логин" name="name" required>
          <input type="password" class="input" placeholder="Пароль" name="password" required>
        </div>
        <input type="submit" class="button" value="Войти">
        </form>
        <?php }else{?>
          <div class="header-content__text">
          Самый быстрый автомобиль в мире, с рекордным ускорением, дальностью и производительностью.
        </div>
        <a href="#comment" class="button">Комментировать</a>
        <?php }?> 
      </div>
    </div>
  </header>
  <section class="slider-top">
    <div class="slider">
      <div class="slider__item" style="background-image: url(images/slide-1.jpg);"></div>
      <div class="slider__item" style="background-image: url(images/slide-2.jpg);"></div>
      <div class="slider__item" style="background-image: url(images/slide-3.jpg);"></div>
    </div>
  </section>
  <section class="statistics">
    <div class="container">
      <div class="statistics-items">
        <div class="statistics-item">
          <div class="statistics-item__title">
            Двигатель
          </div>
          <div class="statistics-item__num">
            2,1 <span>сек</span>
          </div>
          <div class="statistics-item__descr">
            разгон до 100 км
          </div>
        </div>
        <div class="statistics-item">
          <div class="statistics-item__title">
            Батарея
          </div>
          <div class="statistics-item__num">
            1000 <span>км</span>
          </div>
          <div class="statistics-item__descr">
            запас хода
          </div>
        </div>
        <div class="statistics-item">
          <div class="statistics-item__title">
            Скорость
          </div>
          <div class="statistics-item__num statistics-item__num--speed">
            400 <span>км/ч</span>
          </div>
          <div class="statistics-item__descr">
            макс скорость
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="video">
    <div class="container">
      <img src="images/section-img.jpg" alt="">
    </div>
  </section>
  <section class="advantages">
    <div class="container">
      <div class="advantages-inner">
        <div class="advantages-inner__row">

          <div class="advantages-descr">
            <div class="advantages__title">Скорость</div>
            <div class="advantages__text">
              Самый
              быстроразгоняющийся
              серийный автомобиль
              из когда-либо созданных
            </div>
          </div>

          <div class="advanteages__img">
            <img src="images/advantages-1.jpg" alt="">
          </div>
        </div>

        <div class="advantages-inner__row">
          <div class="advanteages__img">
            <img src="images/advantages-2.jpg" alt="">
          </div>
          <div class="advantages-descr">
            <div class="advantages__text">
              <ul>
                <li>Датчик дождя</li>
                <li>Датчик света</li>
                <li>Автопилот</li>
                <li>Навигационная система</li>
                <li>Обогрев зеркал</li>
                <li>Усилитель руля</li>
                <li>Панорамная крыша</li>
                <li>Ксеноновые фары</li>
              </ul>
            </div>
            <div class="advantages__title
            advantages__title--bottom">Преимущества</div>

          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="design">
    <div class="container">
      <div class="design__images">
        <img src="images/design.jpg" alt="">
      </div>
      <div class="design-row">
        <div class="design-row__item">
          <div class="design-row__item-num">01</div>
          <div class="design-row__item-text">
            Новый родстер был разработан бывшим дизайнером Mazda Францем фон Хольцхаузеном.
            Имеет съёмную стеклянную крышу и кузов с двумя передними сиденьями плюс два небольших сиденья сзади.
          </div>
        </div>
        <div class="design-row__item">
          <div class="design-row__item-num">02</div>
          <div class="design-row__item-text">
            Родстер имеет три электродвигателя, один спереди и два сзади,
            Они обеспечивают полный привод, а также систему адресного распределения крутящего момента для лучшего
            прохождения поворотов.
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php if(isset($_SESSION['id'])){?>
  <section class="design" id="comment">
    <div class="container">
      <h1 style="color:White">Добавить комментарий</h1>
      <form action="post.php" method="POST">
      <div class="design-row">
        
        <div class="design-row__item">
          <div class="design-row__item-text">
            <textarea class="input" name="text" style="width:740px;font-size:14pt" rows=10></textarea>
          </div>
        </div>
        <div class="design-row__item">
          <div class="design-row__item-text">
            <input type="submit" value="Добавить" class="button" style="margin-left:180px">
          </div>
        </div>
        
      </div>
      </form>
    </div>
  </section>
  <?php }?>
  <section class="design">
    <div class="container">
      <h1 style="color:White">Все комментарии</h1>
      
      <?php while ($comment = $comments->fetch_array()) {?>
        <div class="comment">
          <h2><?php echo $comment['creator'];?></h2>
          <p><?php echo $comment['text'];?></p>
          <h5><?php echo $comment['date'];?></h5>
        </div>
        <?php }?>
      
    </div>
  </section>
  <footer class="footer">
    <div class="container">
      <div class="footer-btn">
        <a href="#" class="button">
          Хочу тест драйв
        </a>
      </div>
      <div class="footer-copy">
        <ul>
          <li>Tesla © 2020</li>
          <li><a href="#">Privacy & Legal</a></li>
          <li><a href="#">Contact</a></li>
          <li><a href="#">Careers</a></li>
          <li><a href="#">Get Newsletter</a></li>
          <li><a href="#">Forums</a></li>
          <li><a href="#">Locations</a></li>
        </ul>
      </div>
    </div>
  </footer>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="js/slick.min.js"></script>
  <script src="js/main.js"></script>
</body>
</html>