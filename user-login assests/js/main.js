document.addEventListener('DOMContentLoaded', () => {
  const loginForm = document.getElementById('login-form');
  const registerForm = document.getElementById('register-form');
  const loginBtn = document.getElementById('login-btn');
  const registerBtn = document.getElementById('register-btn');

  // Event listener for showing register form
  registerBtn.addEventListener('click', () => {
    loginForm.classList.remove('form-active');
    registerForm.classList.add('form-active');
  });

  // Event listener for showing login form
  loginBtn.addEventListener('click', () => {
    loginForm.classList.add('form-active');
    registerForm.classList.remove('form-active');
  });

  // Function to show/hide password
  const showHiddenPass = (passInputId, eyeIconId) => {
    const input = document.getElementById(passInputId);
    const iconEye = document.getElementById(eyeIconId);

    iconEye.addEventListener('click', () => {
      if (input.type === 'password') {
        input.type = 'text';
        iconEye.classList.add('ri-eye-line');
        iconEye.classList.remove('ri-eye-off-line');
      } else {
        input.type = 'password';
        iconEye.classList.remove('ri-eye-line');
        iconEye.classList.add('ri-eye-off-line');
      }
    });
  };

  // Call showHiddenPass function for login and register forms
  showHiddenPass('login-pass', 'login-eye');
  showHiddenPass('register-pass', 'register-eye');
});
