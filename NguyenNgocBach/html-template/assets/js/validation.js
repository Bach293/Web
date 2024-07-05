(() => {
    'use strict';

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    const forms = document.querySelectorAll('.needs-validation');

    // Loop over them and prevent submission
    Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            }

            form.classList.add('was-validated');
        }, false);

        const password1 = form.querySelector("#passwordInput1");
        const password2 = form.querySelector("#passwordInput2");
        const emailInput = form.querySelector("#emailInput");
        const phoneInput = form.querySelector("#phoneInput");

        password1.addEventListener("input", () => {
            if (password1.value !== password2.value) {
                password2.setCustomValidity("Mật khẩu không khớp.");
            } else {
                password2.setCustomValidity("");
            }
        });

        password2.addEventListener("input", () => {
            if (password1.value !== password2.value) {
                password2.setCustomValidity("Mật khẩu không khớp.");
            } else {
                password2.setCustomValidity("");
            }
        });

        emailInput.addEventListener("input", () => {
            const emailPattern = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/;
            if (!emailPattern.test(emailInput.value)) {
                emailInput.setCustomValidity("Vui lòng nhập địa chỉ email hợp lệ.");
            } else {
                emailInput.setCustomValidity("");
            }
        });

        phoneInput.addEventListener("input", () => {
            const phonePattern = /^[0-9]{10,}$/;
            if (!phonePattern.test(phoneInput.value)) {
                phoneInput.setCustomValidity("Vui lòng nhập số điện thoại hợp lệ.");
            } else {
                phoneInput.setCustomValidity("");
            }
        });

        // Remove 'was-validated' class when input fields change
        const inputFields = form.querySelectorAll('input');
        Array.from(inputFields).forEach(field => {
            field.addEventListener('input', () => {
                form.classList.remove('was-validated');
            });
        });
    });
})();