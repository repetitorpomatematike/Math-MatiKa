const body = document.body;
const modals = document.querySelectorAll(".modal");
const forms = document.querySelectorAll(".form");
const inputs = document.querySelectorAll(".form-input");
const navCloses = document.querySelectorAll(".close-menu");
const anchors = document.querySelectorAll(".anchor");
const openButtons = document.querySelectorAll(".open-modal");
const changeButtons = document.querySelectorAll(".change-modal");
const modalForm = document.querySelector(".main-modal .form")
const burger = document.querySelector(".burger");
const burgerMenu = document.querySelector(".burger-menu");
const burgerClose = document.querySelector(".close_burger");
const cardButtons = document.querySelectorAll(".innerCard .button");
const backSides = document.querySelectorAll(".backSide");

function validate(input) {
    let isValid = true
    switch (input.type) {
        case "text":
            isValid = isValidText(input);
            break
        case "email":
            isValid = isValidEmail(input);
            break
        case "tel":
            isValid = isValidPhone(input);
            break
        case "textarea":
            isValid = isValidText(input);
            break
        default:
            break
    }
    return isValid;
}

function setValidationField(element, state) {
    if (state) {
        element.parentNode.classList.add("success")
        element.parentNode.classList.remove("error")
    } else {
        element.parentNode.classList.add("error")
        element.parentNode.classList.remove("success")
    }
}

// Valid fio
function isValidText(text) {
    const re = /^[a-zA-Zа-яА-Я\s]+$/
    if (re.test(String(text.value).toLowerCase())) {
        setValidationField(text, true)
        return true
    }
    setValidationField(text, false)
    return false
}

// Valid Email
function isValidEmail(email) {
    const re =
        /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
    if (re.test(String(email.value).toLowerCase())) {
        setValidationField(email, true)
        return true
    }
    setValidationField(email, false)
    return false
}

function isValidPhone(phone) {
    if (phone.value.length === 18) {
        setValidationField(phone, true)
        return true
    }
    setValidationField(phone, false)
    return false
}

function openModal(modal) {
    modal.classList.add("modal__active");
    body.classList.add("hidden");
}

function closeModal(modal) {
    modal.classList.remove("modal__active");
    body.classList.remove("hidden");
}

function changeModal(closedModal, openedModal) {
    closedModal.classList.remove("modal__active");
    openedModal.classList.add("modal__active");
}


// Masked on telephone
$(".phone").mask("+7 (999) 999-99-99")

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

$('input[type="tel"]').click(function () {
    $(this).setCursorPosition(4) // set position number
})

forms.forEach(form => {
    form.addEventListener("submit", (e) => {
        e.preventDefault();
        const isAllInputsValid = Array.from(form.querySelectorAll(".form__row")).every(item => item.classList.contains("success"));
        if (isAllInputsValid) {
            sendForm(form);
        } else {
            form.querySelectorAll(".form__row input").forEach(input => !input.value && input.parentNode.classList.add("error"))
        }
    })
})

burger.addEventListener("click", () => {
    if (burger.classList.contains("burger__active")) {
        burger.classList.remove("burger__active");
        burgerMenu.classList.remove("active");
    } else {
        burger.classList.add("burger__active");
        burgerMenu.classList.add("active");
    }
});


burgerClose.addEventListener("click", () => {
    burger.classList.remove("burger__active");
    burgerMenu.classList.remove("active");
})



anchors.forEach((anchor) => {
    anchor.addEventListener("click", (e) => {
        e.preventDefault()
        const blockID = anchor.getAttribute("href")
        document.querySelector(blockID).scrollIntoView({
            behavior: "smooth",
            block: "start",
        })
    })
})

cardButtons.forEach(cardButton => cardButton.addEventListener("click", () => cardButton.parentNode.parentNode.classList.add("active")));
backSides.forEach(backSide => backSide.addEventListener("click", () => backSide.parentNode.classList.remove("active")));

const reviewSlider = new Swiper(".reviews_slider", {
    direction: 'horizontal', // 'vertical', 'horizontal'
    loop: true, // true - круговой слайдер, false - слайдер с конечными положениями
    slidesPerView: 1, // кол-во активных слайдов
    centeredSlides: true, // центрирование слайдов
    fade: 'true',
    grabCursor: 'true',
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
})

openButtons.forEach(openButton => {
    openButton.addEventListener("click", () => {
        const modal = document.querySelector(`.${openButton.dataset.modal}-modal`);
        openModal(modal);
    })
})

changeButtons.forEach(changeButton => {
    changeButton.addEventListener("click", () => {
        console.log(changeButton.dataset);
        const closedModal = document.querySelector(`.${changeButton.dataset.closedModal}-modal`);
        const openedModal = document.querySelector(`.${changeButton.dataset.openedModal}-modal`);
        changeModal(closedModal, openedModal);
    })
})

modals.forEach((modal) => {
    modal.addEventListener("click", (e) => {
        if (e.target === modal || e.target.classList.contains("close")) {
            closeModal(modal);
        }
    });
});

const selects = document.querySelectorAll(".select");

selects.forEach((select) => {
    select.addEventListener("click", () => {
        select.classList.toggle("active");
    });
    const options = select.querySelectorAll(".select__content p");
    options.forEach((option) => {
        option.addEventListener("click", () => {
            const title = select.querySelector(".select__header p");
            const input = select.querySelector("input[type='hidden']");
            options.forEach((option) => {
                option.classList.remove("active");
            });
            option.classList.add("active");
            title.innerHTML = option.textContent;
            input.value = option.textContent;
        });
    });
});

const btnUp = {
    el: document.querySelector('.btn-up'),
    scrolling: false,
    show() {
        if (this.el.classList.contains('btn-up_hide') && !this.el.classList.contains('btn-up_hiding')) {
            this.el.classList.remove('btn-up_hide');
            this.el.classList.add('btn-up_hiding');
            window.setTimeout(() => {
                this.el.classList.remove('btn-up_hiding');
            }, 300);
        }
    },
    hide() {
        if (!this.el.classList.contains('btn-up_hide') && !this.el.classList.contains('btn-up_hiding')) {
            this.el.classList.add('btn-up_hiding');
            window.setTimeout(() => {
                this.el.classList.add('btn-up_hide');
                this.el.classList.remove('btn-up_hiding');
            }, 300);
        }
    },
    addEventListener() {
        // при прокрутке окна (window)
        window.addEventListener('scroll', () => {
            const scrollY = window.scrollY || document.documentElement.scrollTop;
            if (this.scrolling && scrollY > 0) {
                return;
            }
            this.scrolling = false;
            // если пользователь прокрутил страницу более чем на 200px
            if (document.body.scrollTop > 300 || document.documentElement.scrollTop > 300) {
                // сделаем кнопку .btn-up видимой
                this.show();
            } else {
                // иначе скроем кнопку .btn-up
                this.hide();
            }
        });
        // при нажатии на кнопку .btn-up
        document.querySelector('.btn-up').onclick = () => {
            this.scrolling = true;
            this.hide();
            // переместиться в верхнюю часть страницы
            window.scrollTo({
                top: 0,
                left: 0,
                behavior: 'smooth'
            });
        }
    }
}

btnUp.addEventListener();