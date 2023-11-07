import "./bootstrap";
import "flowbite";
import "./icons";
import "./icons-brands";
import "./icons-duotone";

document.addEventListener("DOMContentLoaded", function () {
    const images = document.querySelectorAll(".transition-opacity");

    images.forEach((image) => {
        image.onload = function () {
            image.style.filter = "blur(0)";
            image.style.opacity = "1";
        };
    });
});
