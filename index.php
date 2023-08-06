<?php
    $title = "Math&matika";
    $description = "Изучи математику с репетитором онлайн";
    $keywords = "математика, репетитор по математике, репетитор по математике в Москве ";
    $queryString = $_SERVER['QUERY_STRING'];
?>
<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="keywords" content="<?= $keywords ?>">
  <meta name="description" content="<?= $description ?>">
  <meta property="og:title" content="<?= $title ?>">
  <meta property="og:description" content="<?= $description ?>">
  <title><?= $title ?></title>
  <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="/css/swiper.css">
  <link rel="stylesheet" href="/css/base.css">
  <link rel="stylesheet" href="/css/index.css">
  <link rel="stylesheet" media="(max-width: 1400px)" href="/css/mobile.css">
</head>

<body>
  <?php require_once $_SERVER["DOCUMENT_ROOT"] . '/header.php' ?>
  <main>
    <section class="promo" id="promo">
      <div class="container">
        <h1 class="promo_title">Изучи математику с репетитором <strong>онлайн</strong>
        </h1>
        <p class="promo_text">Запишитесь на первое бесплатное занятие и получи скидку 30% на следующее</p>
        <div class="promo_control">
          <button class="button open-modal" data-modal="main">Записаться на пробный урок</button>
        </div>
        <h3 class="promo_sub-button">Занятия проводятся индивидуально</h3>
      </div>
    </section>
    <section class="about" id="about">
      <div class="container">
        <h2 class="title">Занятия проходят из <strong>любой точки</strong> мира <span>Достаточно ноутбука или
            телефона</span></h2>
        <div class='box-with-img'>
          <div class='box-with-img_left'>
            <img src="/images/author.png" alt="Репетитор по математике">
            <h4>Я — Ирина, преподаю с 2021 года.</h4>
          </div>
          <div class='box-with-img_right'>
            <div class="about_items">
              <div class="about_item">
                <p>Обучаюсь на 5 курсе педагогического вуза, и благодаря этому обладаю
                  уникальной способностью быстро находить общий язык с детьми, так как
                  мне близки их интересы и менталитет. Это позволяет мне не только
                  эффективно обучать, но и вдохновлять учеников на изучение материала с
                  удовольствием и интересом</p>
              </div>
              <div class="about_item">
                <p>Имею все необходимое для проведения онлайн-занятий: ноутбук;
                  качественный интернет и постоянный доступ к нему; онлайн сервисы для
                  объяснения материала; графический планшет для работы с виртуальной
                  доской.</p>
              </div>
              <div class="about_item">
                <p>Создаю поддерживающую и доверительную атмосферу. Обладаю
                  хорошим терпением и пониманием, помогая ученику преодолевать
                  трудности. Учитываю особенности и уровень каждого ученика, создавая
                  индивидуальные учебные программы и задания, чтобы максимально
                  раскрыть потенциал каждого ученика.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class='features' id='features'>
      <div class='container'>
        <h2 class='title'>С любовью к математике, мы создаем <strong>неповторимую атмосферу</strong> обучения!</h2>
        <p class="featres_text"><strong>Моя цель</strong> - помочь каждому ученику полюбить математику и достичь своих
          личных целей в
          обучении. <br> <strong>Моя задача</strong> - создать
          индивидуальную программу обучения для каждого ученика, учитывая его уровень и потребности, чтобы помочь ему
          максимально
          раскрыть свой потенциал.
        </p>
        <div class="features_items">
          <div class="features_item">
            <img src="/images/features/feature01.svg" alt="Студент" class="features_item-img">
            <h3 class="features_item-title">Индивидуальный
              подход</h3>
          </div>
          <div class="features_item">
            <img src="/images/features/feature02.svg" alt="Компьютер" class="features_item-img">
            <h3 class="features_item-title">Интерактивные занятия</h3>
          </div>
          <div class="features_item">
            <img src="/images/features/feature03.svg" alt="Подарок" class="features_item-img">
            <h3 class="features_item-title">Бесплатный
              вводный урок</h3>
          </div>
          <div class="features_item">
            <img src="/images/features/feature04.svg" alt="Часы" class="features_item-img">
            <h3 class="features_item-title">Пробные экзамены</h3>
          </div>
          <div class="features_item">
            <img src="/images/features/feature05.svg" alt="Анкета" class="features_item-img">
            <h3 class="features_item-title">Ознакомительное анкетирование</h3>
          </div>
        </div>
      </div>
    </section>
    <section class='reviews' id='reviews'>
      <div class='container'>
        <div class="reviews_wrapper">
          <h2 class="title"><strong>Отзывы</strong> моих учеников</h2>
          <div class="reviews_slider swiper-container">
            <div class="swiper-wrapper">
              <div class="swiper-slide review_item">
                <h3 class="review_item-title">Евгения</h3>
                <p class="review_item-text">Прошло меньше полугода, а уже отличный результат за столь короткое время.
                  Несмотря на то, что мы также болели и пропускали занятия. В 1 триместре балл 3.55, а в 3 уже 4.25.
                  Если бы последнюю неделю не пропустили по болезни, могли бы на 5 выйти.</p>
              </div>
              <div class="swiper-slide review_item">
                <h3 class="review_item-title">Дарья</h3>
                <p class="review_item-text">Отличное знание своего предмета. Профессиональный и ответственный подход к
                  ученику. Очень рада, что обратилась к ней для подготовки к ОГЭ🥰</p>
              </div>
              <div class="swiper-slide review_item">
                <h3 class="review_item-title">Ирина</h3>
                <p class="review_item-text">Прекрасная девушка! Очень хорошо объясняет. Ребенок доволен.</p>
              </div>
              <div class="swiper-slide review_item">
                <h3 class="review_item-title">Анна</h3>
                <p class="review_item-text">Очень хорошая и приятная девушка! Сыну все понравилось)</p>
              </div>
              <div class="swiper-slide review_item">
                <h3 class="review_item-title">Михаил</h3>
                <p class="review_item-text">Профессионал в своей сфере. Сыну совершенно не нравилась математика, но
                  занятия воодушивили его. Естественно, сам результат зависит и от ученика, так как знания сами в мозг
                  не залезут)
                  Но главное - умение завлечь ребенка. Сыну очень нравится</p>
              </div>
            </div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
          </div>
        </div>
      </div>
    </section>
    <section class='services' id='services'>
      <div class='container'>
        <h2 class='title'>Какие <strong>услуги</strong> я предоставляю</h2>
        <div class="servcies_items">
          <div class="servcies_item">
            <div class="innerCard">
              <div class="frontSide">
                <h3 class="frontSide-title">1-4 класс</h3>
                <img src="/images/school.svg" alt="Школа" class="frontSlide-image">
                <button class="button">Подробнее</button>
              </div>
              <div class="backSide">
                <p class="backSide-text">Помощь с домашними заданиями и школьной программой </p>
                <h3 class="backSide-price">800р/час</h3>
              </div>
            </div>
          </div>
          <div class="servcies_item">
            <div class="innerCard">
              <div class="frontSide">
                <h3 class="frontSide-title">5-9 класс</h3>
                <img src="/images/school.svg" alt="Школа" class="frontSlide-image">
                <button class="button">Подробнее</button>
              </div>
              <div class="backSide">
                <p class="backSide-text">Помощь с домашними заданиями и школьной программой </p>
                <h3 class="backSide-price">1000р/час</h3>
              </div>
            </div>
          </div>
          <div class="servcies_item">
            <div class="innerCard">
              <div class="frontSide">
                <h3 class="frontSide-title"> ОГЭ/ЕГЭ(б) </h3>
                <img src="/images/school.svg" alt="Школа" class="frontSlide-image">
                <button class="button">Подробнее</button>
              </div>
              <div class="backSide">
                <p class="backSide-text">Подготовка к ОГЭ <br> Подготовка к базовому ЕГЭ</p>
                <h3 class="backSide-price">1200р/час</h3>
              </div>
            </div>
          </div>
          <div class="servcies_item">
            <div class="innerCard">
              <div class="frontSide">
                <h3 class="frontSide-title">ЕГЭ(п)</h3>
                <img src="/images/school.svg" alt="Школа" class="frontSlide-image">
                <button class="button">Подробнее</button>
              </div>
              <div class="backSide">
                <p class="backSide-text">Подготовка к профильному ЕГЭ</p>
                <h3 class="backSide-price">1500р/час</h3>
              </div>
            </div>
          </div>
          <div class="servcies_item">
            <div class="innerCard">
              <div class="frontSide">
                <h3 class="frontSide-title">ВПР</h3>
                <img src="/images/school.svg" alt="Школа" class="frontSlide-image">
                <button class="button">Подробнее</button>
              </div>
              <div class="backSide">
                <p class="backSide-text">Подготовка к ВПР. <b>Цена зависит от класса и количества требуемых занятий</b>
                </p>
                <h3 class="backSide-price">от 800р</h3>
              </div>
            </div>
          </div>
          <div class="servcies_item">
            <div class="innerCard">
              <div class="frontSide">
                <h3 class="frontSide-title">Контрольная работа</h3>
                <img src="/images/school.svg" alt="Школа" class="frontSlide-image">
                <button class="button">Подробнее</button>
              </div>
              <div class="backSide">
                <p class="backSide-text">Подготовка к контрольной работе. <b>Цена зависит от класса и количества
                    требуемых занятий</b></p>
                <h3 class="backSide-price">от 500р</h3>
              </div>
            </div>
          </div>
        </div>
        <h3 class="services_text">*Также помогаю с решением различного рода математических задач</h3>
        <button class="button open-modal" data-modal="main">Записаться на пробный урок</button>
      </div>
    </section>
    <section class='feedback'>
      <div class='container'>
        <div class="feedback_wrapper">
          <img src="/images/form.png" alt="Форма" class="feedback_image">
          <div class="feedback_inner">
            <h2 class='title'>Остались вопросы? <strong>Свяжитесь со мной!</strong> <span>или позвоните по номеру +7 901
                758 67 00</span></h2>
            <form method="post" class="form feedback_form" novalidate>
              <div class="form__row">
                <input onchange="validate(this)" type="text" name="fio" class="form-input" placeholder="ФИО" required
                  minlength="2" maxlength="50">
              </div>
              <div class="form__row">
                <input onchange="validate(this)" type="tel" name="phone" class="form-input phone"
                  placeholder="Номер телефона" required>
              </div>
              <div class="form__row">
                <input onchange="validate(this)" type="email" name="email" class="form-input"
                  placeholder="Электронная почта" required>
              </div>
              <div class="form__row">
                <textarea name="commentary" placeholder="Задайте ваш вопрос"></textarea>
              </div>
              <button type="submit" class="button">Отправить</button>
            </form>
          </div>
        </div>

      </div>
    </section>
  </main>
  <!-- <?php require_once $_SERVER["DOCUMENT_ROOT"] . '/footer.php' ?> -->
  <?php require_once $_SERVER["DOCUMENT_ROOT"] . '/addition.php' ?>
</body>
<script src="/libs/jquery.js"></script>
<script src="/libs/swiper.js"></script>
<script src="/js/mask.js"></script>
<script src="/js/index.js"></script>
<script src="/js/send.js"></script>

</html>