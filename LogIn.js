document.addEventListener("DOMContentLoaded", () => {
    const form = document.querySelector("form");
    const emailInput = document.querySelector('input[type="email"]');

    if(!form || !emailInput){
        console.error("Form, email input not found");
        return;
    }
    console.log("form, email input found");


    form.addEventListener("submit", function(e) {
        e.preventDefault();
        const email = emailInput.value.trim();
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        console.log("Validating email:", email);

        if(!emailPattern.test(email)){
            alert("Please enter a valid email address!");
            emailInput.focus();
        } else{
            this.submit();
        }
    });
});
