document.getElementById('loginForm').addEventListener('submit', async function(e) {
    e.preventDefault();

    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;

    if (!email || !password) {
        showMessage('error', 'Будь ласка, заповніть всі поля');
        return;
    }

    try {
        await loginUser({ email, password });
    } catch (error) {
        showMessage('error', 'Помилка під час входу: ' + error.message);
    }
});

async function loginUser(credentials) {
    const response = await fetch('api/login.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(credentials)
    });

    const data = await response.json();

    if (!response.ok) {
        throw new Error(data.error || 'Невідома помилка сервера');
    }

    showMessage('success', 'Вхід успішний! Перенаправлення...');
    setTimeout(() => {
        window.location.href = 'users.html';
    }, 1500);
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