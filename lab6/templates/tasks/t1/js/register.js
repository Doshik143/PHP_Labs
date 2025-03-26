document.getElementById('registerForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;

    if (!name || !email || !password) {
        showMessage('error', 'Будь ласка, заповніть всі поля');
        return;
    }

    if (password.length < 6) {
        showMessage('error', 'Пароль повинен містити щонайменше 6 символів');
        return;
    }

    registerUser({ name, email, password });
});

function registerUser(userData) {
    fetch('api/register.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(userData)
    })
        .then(response => response.json())
        .then(data => {
            if (data.error) {
                showMessage('error', data.error);
            } else {
                showMessage('success', 'Реєстрація успішна! Тепер ви можете увійти.');
                document.getElementById('registerForm').reset();
            }
        })
        .catch(error => {
            showMessage('error', 'Помилка під час реєстрації: ' + error);
        });
}

function showMessage(type, text) {
    const messageDiv = document.getElementById('message');
    messageDiv.textContent = text;
    messageDiv.className = type;

    setTimeout(() => {
        messageDiv.textContent = '';
        messageDiv.className = '';
    }, 5000);
}