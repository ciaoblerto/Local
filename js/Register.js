document.addEventListener("DOMContentLoaded", () => {
    const form = document.getElementById("register-form");
    const firstName = document.getElementById("name");
    const lastName = document.getElementById("surname");
    const email = document.getElementById("email");
    const password = document.getElementById("confirm-password");
    const genderRadios = document.getElementsByName("gender");

    form.addEventListener("submit", (event) => {
        let isValid = true;

        if (!/^[A-Za-z]{2,}$/.test(firstName.value)) {
            alert("First Name must contain only letters and be at least 2 characters long.");
            isValid = false;
        }

        if (!/^[A-Za-z]{2,}$/.test(lastName.value)) {
            alert("Last Name must contain only letters and be at least 2 characters long.");
            isValid = false;
        }

        if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email.value)) {
            alert("Please enter a valid email address.");
            isValid = false;
        }

        if (!/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/.test(password.value)) {
            alert("Password must be at least 8 characters long and contain at least one letter and one number.");
            isValid = false;
        }

        const genderSelected = Array.from(genderRadios).some(radio => radio.checked);
        if (!genderSelected) {
            alert("Please select a gender.");
            isValid = false;
        }
        if (!isValid) {
            event.preventDefault();
        }
    });
});
