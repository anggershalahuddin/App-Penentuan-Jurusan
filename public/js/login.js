document.addEventListener("DOMContentLoaded", function () {
    document
        .getElementById("toggle-password")
        .addEventListener("click", function () {
            const passwordField = document.getElementById("password");
            const type =
                passwordField.getAttribute("type") === "password"
                    ? "text"
                    : "password";
            passwordField.setAttribute("type", type);
            this.classList.toggle("fa-eye");
            this.classList.toggle("fa-eye-slash");
        });
});

document.getElementById("select").addEventListener("click", function () {
    alert("Selamat Datang");
});
