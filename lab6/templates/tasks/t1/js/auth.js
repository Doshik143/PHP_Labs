document.getElementById('loginForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;

    if (!email || !password) {
        showMessage('error', 'Будь ласка, заповніть всі поля');
        return;
    }

    loginUser({ email, password });
});

function loginUser(credentials) {
    fetch('api/login.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(credentials)
    })
        .then(response => response.json())
        .then(data => {
            if (data.error) {
                showMessage('error', data.error);
            } else {
                showMessage('success', 'Вхід успішний! Перенаправлення...');
                setTimeout(() => {
                    window.location.href = 'users.html';
                }, 1500);
            }
        })
        .catch(error => {
            showMessage('error', 'Помилка під час входу: ' + error);
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