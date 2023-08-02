async function sendForm(form) {
  const formData = new FormData(form);
  // const inputs = form.querySelectorAll('input')
  // const preloader = document.querySelector('.preloader');
  // const modals = document.querySelectorAll(".modal");

  $.ajax({
      url: "handler.php",
      type: "POST",
      cache: false,
      data: formData,
      contentType: false,
      processData: false,
      beforeSend: () => {
          // preloader.classList.add("shown")
          // inputs.forEach((input) => {
          //     input.disabled = true
          // })
      },
      success: (response) => {
        console.log(response);
          // preloader.classList.remove("shown")
          // inputs.forEach((input) => {
              // input.disabled = false
              // input.classList.remove("input-valid")
              // input.value = ""
          // })
          if (response === "success") {
              // form.classList.contains("modal__form") && closeModal(modals[0]);
              // modals[1].classList.add('modal__active');
              // return true;
          } else {
              // swal("Ошибка", response, "error")
          }

      },
      error: (response) => {
          // preloader.classList.remove("shown")
          console.log(`Ошибка ${response.status}`);
          // swal(`Ошибка ${response.status}`, response.statusText, "error")
          // inputs.forEach((input) => {
          //     input.disabled = false
          // })
          return false;
      },
  })
}

$('input[name="phone"]').mask("+7 (999) 999-99-99")

$.fn.setCursorPosition = function (pos) {
    if ($(this).get(0).setSelectionRange) {
        $(this).get(0).setSelectionRange(pos, pos)
    } else if ($(this).get(0).createTextRange) {
        var range = $(this).get(0).createTextRange()
        range.collapse(true)
        range.moveEnd("character", pos)
        range.moveStart("character", pos)
        range.select()
    }
}

$('input[name="phone"]').click(function () {
    $(this).setCursorPosition(4) // set position number
})


const forms = document.querySelectorAll("form");
forms.forEach(form => {
  form.addEventListener("submit", (e) => {
    e.preventDefault();
    sendForm(form);
  })
})