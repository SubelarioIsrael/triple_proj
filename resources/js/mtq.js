document.addEventListener("DOMContentLoaded", () => {
    const radioButtons = document.querySelectorAll(".radio-input");

    radioButtons.forEach((radio) => {
        // On hover, temporarily highlight
        radio.nextElementSibling.addEventListener("mouseenter", (e) => {
            const span = e.target;
            if (!radio.checked) {
                span.style.backgroundColor = getComputedStyle(span).borderColor;
            }
        });

        // Reset background when leaving hover
        radio.nextElementSibling.addEventListener("mouseleave", (e) => {
            const span = e.target;
            if (!radio.checked) {
                span.style.backgroundColor = "transparent";
            }
        });

        // On click, ensure only one is selected
        radio.addEventListener("click", () => {
            radioButtons.forEach((btn) => {
                btn.nextElementSibling.style.backgroundColor = "transparent"; // Clear all others
                if (btn.checked) {
                    btn.nextElementSibling.style.backgroundColor =
                        getComputedStyle(btn.nextElementSibling).borderColor; // Set selected
                }
            });
        });
    });
});
