document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("login-form");
    form.addEventListener("submit", function (e) {
        e.preventDefault();

        document.getElementById("email").classList.remove("is-invalid");
        document.getElementById("password").classList.remove("is-invalid");
        document.getElementById("email-error").textContent = "";
        document.getElementById("password-error").textContent = "";

        const email = document.getElementById("email").value;
        const password = document.getElementById("password").value;

        if (email.trim() === "") {
            document.getElementById("email").classList.add("is-invalid");
            document.getElementById("email-error").innerHTML = '<strong>O campo de Email deve ser preenchido.</strong>';
        }

        if (password.trim() === "") {
            document.getElementById("password").classList.add("is-invalid");
            document.getElementById("password-error").innerHTML = '<strong>O campo de Senha deve ser preenchido.</strong>';
        }
    });
});