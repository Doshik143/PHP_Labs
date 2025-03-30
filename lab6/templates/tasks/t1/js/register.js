document.getElementById('registerForm').addEventListener('submit', async function(e) {
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

    try {
        await registerUser({ name, email, password });
    } catch (error) {
        console.error('Error:', error);
        showMessage('error', 'Сталася помилка при реєстрації');
    }
});

async function registerUser(userData) {
    const response = await fetch('api/register.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(userData)
    });

    const data = await response.json();
    console.log(data);

    if (response.ok) {
        showMessage('success', 'Реєстрація успішна!');
    } else {
        showMessage('error', data.message || 'Помилка реєстрації');
    }

    return data;
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