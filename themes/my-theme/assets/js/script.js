const burgerBtnElem = document.querySelector("[data-burger-btn]");
const mobileMenuElem = document.querySelector("[data-mobile-menu]");

burgerBtnElem.addEventListener("click", () => {
    mobileMenuElem.classList.toggle("active");
    mobileMenuElem.toggleAttribute("inert");
});
