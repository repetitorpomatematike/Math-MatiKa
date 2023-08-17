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
        console.log("Отправлено");
          preloader.classList.add("shown")
          inputs.forEach(input => input.disabled = true);
      },
      success: function(response) {
        console.log(response);
        
      },
      error: function(error) {
        console.table(error);
        inputs.forEach((input) => input.disabled = false);
          setTimeout(() => {
            preloader.classList.remove("shown");
            openModal(document.querySelector(".thank-modal"));
          }, 2000);
      }
  })
}