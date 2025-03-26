document.addEventListener('DOMContentLoaded', function() {
    checkAuth();
    document.getElementById('logoutBtn').addEventListener('click', logout);
});

function checkAuth() {
    fetch('api/auth.php')
        .then(response => response.json())
        .then(data => {
            if (data.error || !data.authenticated) {
                window.location.href = 'login.html';
            } else {
                loadUsers();
            }
        })
        .catch(error => {
            console.error('Error:', error);
            window.location.href = 'login.html';
        });
}

function loadUsers() {
    fetch('api/users.php', {
        method: 'GET',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json'
        }
    })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json().catch(() => {
                throw new Error('Invalid JSON response');
            });
        })
        .then(users => {
            if (users.error) {
                throw new Error(users.error);
            }
            displayUsers(users);
        })
        .catch(error => {
            console.error('Error:', error);
            showMessage('error', 'Помилка завантаження: ' + error.message);

            if (error.message.includes('authoriz') || error.message.includes('Not authenticated')) {
                setTimeout(() => window.location.href = 'login.html', 2000);
            }
        });
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
        btn.addEventListener('click', function() {
            const userId = this.getAttribute('data-id');
            openEditModal(userId);
        });
    });

    document.querySelectorAll('.delete-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const userId = this.getAttribute('data-id');
            deleteUser(userId);
        });
    });
}

function openEditModal(userId) {
    const modal = document.getElementById('editModal');
    const span = document.getElementsByClassName('close')[0];

    const rows = document.querySelectorAll('#usersList tr');
    let userData = null;

    rows.forEach(row => {
        if (row.querySelector('td:first-child').textContent === userId) {
            userData = {
                id: userId,
                name: row.querySelector('td:nth-child(2)').textContent,
                email: row.querySelector('td:nth-child(3)').textContent
            };
        }
    });

    if (!userData) return;

    document.getElementById('editUserId').value = userData.id;
    document.getElementById('editName').value = userData.name;
    document.getElementById('editEmail').value = userData.email;

    modal.style.display = 'block';

    span.onclick = function() {
        modal.style.display = 'none';
    }

    window.onclick = function(event) {
        if (event.target === modal) {
            modal.style.display = 'none';
        }
    }

    document.getElementById('editUserForm').onsubmit = function(e) {
        e.preventDefault();

        const updatedUser = {
            id: document.getElementById('editUserId').value,
            name: document.getElementById('editName').value,
            email: document.getElementById('editEmail').value
        };

        updateUser(updatedUser);
    };
}

function updateUser(userData) {
    fetch('api/users.php', {
        method: 'PUT',
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
                showMessage('success', 'Користувача успішно оновлено');
                loadUsers();
                document.getElementById('editModal').style.display = 'none';
            }
        })
        .catch(error => {
            showMessage('error', 'Помилка під час оновлення користувача: ' + error);
        });
}

function deleteUser(userId) {
    if (!confirm('Ви впевнені, що хочете видалити цього користувача?')) return;

    fetch('api/users.php', {
        method: 'DELETE',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ id: userId })
    })
        .then(response => response.json())
        .then(data => {
            if (data.error) {
                showMessage('error', data.error);
            } else {
                showMessage('success', 'Користувача успішно видалено');
                loadUsers();
            }
        })
        .catch(error => {
            showMessage('error', 'Помилка під час видалення користувача: ' + error);
        });
}

function logout() {
    fetch('api/logout.php', {
        method: 'POST'
    })
        .then(() => {
            window.location.href = 'login.html';
        })
        .catch(error => {
            console.error('Error:', error);
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