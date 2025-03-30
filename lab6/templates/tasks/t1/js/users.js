document.addEventListener('DOMContentLoaded', async function() {
    try {
        await checkAuth();
        document.getElementById('logoutBtn').addEventListener('click', logout);
    } catch (error) {
        console.error('Помилка ініціалізації:', error);
        window.location.href = 'login.html';
    }
});

async function checkAuth() {
    try {
        const response = await fetch('api/auth.php');
        const data = await response.json();

        if (data.error || !data.authenticated) {
            window.location.href = 'login.html';
        } else {
            await loadUsers();
        }
    } catch (error) {
        console.error('Помилка перевірки авторизації:', error);
        window.location.href = 'login.html';
    }
}

async function loadUsers() {
    try {
        const response = await fetch('api/users.php');
        if (!response.ok) throw new Error('Помилка завантаження');

        const users = await response.json();
        displayUsers(users);
    } catch (error) {
        console.error('Помилка завантаження:', error);
        showMessage('error', 'Не вдалося завантажити користувачів');
    }
}

function displayUsers(users) {
    const usersList = document.getElementById('usersList');
    usersList.innerHTML = '';

    users.forEach(user => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${user.id}</td>
            <td>${user.name}</td>
            <td>${user.email}</td>
            <td>${new Date(user.created_at).toLocaleString()}</td>
            <td>
                <button class="action-btn edit-btn" data-id="${user.id}">Edit</button>
                <br><br>
                <button class="action-btn delete-btn" data-id="${user.id}">Delete</button>
            </td>
        `;
        usersList.appendChild(row);
    });

    document.querySelectorAll('.edit-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            const userId = btn.getAttribute('data-id');
            openEditModal(userId);
        });
    });

    document.querySelectorAll('.delete-btn').forEach(btn => {
        btn.addEventListener('click', async () => {
            const userId = btn.getAttribute('data-id');
            await deleteUser(userId);
        });
    });
}

async function openEditModal(userId) {
    try {
        const modal = document.getElementById('editModal');
        const span = document.getElementsByClassName('close')[0];
        const response = await fetch(`api/users.php?id=${userId}`);

        if (!response.ok) throw new Error('Помилка завантаження даних');

        const userData = await response.json();

        document.getElementById('editUserId').value = userData.id;
        document.getElementById('editName').value = userData.name;
        document.getElementById('editEmail').value = userData.email;

        modal.style.display = 'block';

        span.onclick = () => modal.style.display = 'none';
        window.onclick = (event) => {
            if (event.target === modal) modal.style.display = 'none';
        };

        document.getElementById('editUserForm').onsubmit = async (e) => {
            e.preventDefault();
            const updatedUser = {
                id: document.getElementById('editUserId').value,
                name: document.getElementById('editName').value,
                email: document.getElementById('editEmail').value
            };
            await updateUser(updatedUser);
        };
    } catch (error) {
        console.error('Помилка відкриття модального вікна:', error);
        showMessage('error', 'Не вдалося завантажити дані користувача');
    }
}

async function updateUser(userData) {
    try {
        const response = await fetch('api/users.php', {
            method: 'PUT',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(userData)
        });

        if (!response.ok) {
            const errorData = await response.json();
            throw new Error(errorData.error || 'Помилка оновлення');
        }

        document.getElementById('editModal').style.display = 'none';
        showMessage('success', 'Дані користувача оновлено');
        await loadUsers();
    } catch (error) {
        console.error('Помилка оновлення:', error);
        showMessage('error', error.message);
    }
}

async function deleteUser(userId) {
    if (!confirm('Ви впевнені, що хочете видалити цього користувача?')) return;

    try {
        const response = await fetch('api/users.php', {
            method: 'DELETE',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ id: userId })
        });

        if (!response.ok) {
            const errorData = await response.json();
            throw new Error(errorData.error || 'Помилка видалення');
        }

        showMessage('success', 'Користувача успішно видалено');
        await loadUsers();
    } catch (error) {
        console.error('Помилка видалення:', error);
        showMessage('error', error.message);
    }
}

async function logout() {
    try {
        await fetch('api/logout.php', { method: 'POST' });
        window.location.href = 'login.html';
    } catch (error) {
        console.error('Помилка виходу:', error);
        showMessage('error', 'Помилка під час виходу з системи');
    }
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