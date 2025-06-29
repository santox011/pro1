document.getElementById('forgotPasswordForm').addEventListener('submit', function (e) {
    e.preventDefault();
    const email = document.getElementById('email').value;

    // Here you can add logic to handle the password reset, e.g., API call

    alert(`A password reset link has been sent to: ${email}`);
});
