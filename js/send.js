function sendForm(form) {
  const formData = new FormData(form);
  const inputs = form.querySelectorAll('input')
  const preloader = document.querySelector('.preloader');
  const modals = document.querySelectorAll(".modal");
  $.ajax({
      url: "https://smartswim.ru/ajax/handler.php",
      type: "POST",
      cache: false,
      data: formData,
      contentType: false,
      processData: false,
      beforeSend: () => {
          preloader.classList.add("shown")
          inputs.forEach(input => input.disabled = true);
      },
      success: function(response) {
      },
      error: function(error) {
        inputs.forEach((input) => input.disabled = false);
          setTimeout(() => {
            preloader.classList.remove("shown");
            openModal(document.querySelector(".thank-modal"));
          }, 2000);
      }
  })
}