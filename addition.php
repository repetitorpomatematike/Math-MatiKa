<div class="modal main-modal">
  <div class="modal__content">
    <div class="close_modal">
      <img src="/images/close.svg" class="close" alt="X">
    </div>
    <h2 class="modal__title">Обратная связь</h2>
    <form method="post" class="form modal__form more__form" novalidate>
      <div class="form__row">
        <input onchange="validate(this)" type="text" name="fio" class="form-input" placeholder="ФИО" required
          minlength="2" maxlength="50">
      </div>
      <div class="form__row">
        <input onchange="validate(this)" type="tel" name="phone" class="form-input phone" placeholder="Номер телефона"
          required>
      </div>
      <div class="form__row">
        <input onchange="validate(this)" type="email" name="email" class="form-input" placeholder="Электронная почта"
          required>
      </div>
      <input type="hidden" name="region" class="region input" />
      <input type="hidden" name="query_string" value="<?= $_SESSION['qs'] ?? $_SERVER['QUERY_STRING'] ?>"
        class="query_string input" />
      <input type="hidden" name="message[Откуда]" value="Обратная связь">

      <button type="submit" class="button">Получить обратную связь</button>
    </form>
  </div>
</div>
<div class="preloader">
  <img src="/images/loading.gif" alt="Отправка данных..." />
</div>