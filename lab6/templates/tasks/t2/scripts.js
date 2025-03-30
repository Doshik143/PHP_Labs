document.addEventListener('DOMContentLoaded', function() {
    const authModal = document.getElementById('authModal');
    const editModal = document.getElementById('editModal');
    const authForm = document.getElementById('authForm');
    const noteForm = document.getElementById('noteForm');
    const editNoteForm = document.getElementById('editNoteForm');
    const notesContainer = document.getElementById('notesContainer');
    const loginBtn = document.getElementById('loginBtn');
    const registerBtn = document.getElementById('registerBtn');
    const closeAuthBtn = document.querySelector('.close');
    const closeEditBtn = document.querySelector('.close-edit');

    let isLoginMode = true;
    let currentNoteId = null;

    function showMessage(type, text) {
        const messageDiv = document.createElement('div');
        messageDiv.className = `message ${type}`;
        messageDiv.textContent = text;
        document.body.appendChild(messageDiv);

        setTimeout(() => messageDiv.remove(), 5000);
    }

    //Modal Windows
    function setupModal(modal, openButtons, closeButton) {
        openButtons.forEach(btn => {
            btn.addEventListener('click', () => {
                modal.style.display = 'block';
            });
        });

        closeButton.addEventListener('click', () => {
            modal.style.display = 'none';
        });

        window.addEventListener('click', (event) => {
            if (event.target === modal) {
                modal.style.display = 'none';
            }
        });
    }

    setupModal(authModal, [loginBtn, registerBtn], closeAuthBtn);
    setupModal(editModal, [], closeEditBtn);

    //Authorization
    authForm.addEventListener('submit', async (e) => {
        e.preventDefault();
        const username = document.getElementById('username').value;
        const password = document.getElementById('password').value;

        try {
            const endpoint = isLoginMode ? 'api/login.php' : 'api/register.php';
            const response = await fetch(endpoint, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ username, password })
            });

            const data = await response.json();

            if (!response.ok) {
                throw new Error(data.error || 'Помилка авторизації');
            }

            authModal.style.display = 'none';
            updateAuthUI();
            loadNotes();
            showMessage('success', isLoginMode ? 'Успішний вхід!' : 'Реєстрація успішна!');
        } catch (error) {
            showMessage('error', error.message);
        }
    });

    //Note Form
    noteForm.addEventListener('submit', async (e) => {
        e.preventDefault();
        const title = document.getElementById('title').value;
        const content = document.getElementById('content').value;

        if (!title || !content) {
            showMessage('error', 'Заповніть всі поля');
            return;
        }

        try {
            const response = await fetch('api/create.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ title, content })
            });

            const data = await response.json();

            if (!response.ok) {
                throw new Error(data.error || 'Помилка при додаванні');
            }

            noteForm.reset();
            loadNotes();
            showMessage('success', 'Нотатку додано!');
        } catch (error) {
            showMessage('error', error.message);
        }
    });

    //Note Edit Form
    editNoteForm.addEventListener('submit', async (e) => {
        e.preventDefault();
        const title = document.getElementById('editTitle').value;
        const content = document.getElementById('editContent').value;

        try {
            const response = await fetch('api/update.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({
                    id: currentNoteId,
                    title: title,
                    content: content
                })
            });

            const data = await response.json();

            if (!response.ok) {
                throw new Error(data.error || 'Помилка при оновленні');
            }

            editModal.style.display = 'none';
            loadNotes();
            showMessage('success', 'Нотатку оновлено!');
        } catch (error) {
            showMessage('error', error.message);
        }
    });

    //Work With Note
    async function loadNotes() {
        try {
            const response = await fetch('api/read.php');
            const notes = await response.json();
            displayNotes(notes);
        } catch (error) {
            showMessage('error', 'Помилка завантаження нотаток');
        }
    }

    function displayNotes(notes) {
        notesContainer.innerHTML = notes.length ? '' : '<p>Немає нотаток. Додайте першу!</p>';

        notes.forEach(note => {
            const noteElement = document.createElement('div');
            noteElement.className = 'note';
            noteElement.dataset.id = note.id;
            noteElement.innerHTML = `
                <h3>${escapeHtml(note.title)}</h3>
                <p>${escapeHtml(note.content)}</p>
                <div class="date">Оновлено: ${new Date(note.updated_at).toLocaleString()}</div>
                <div class="actions">
                    <button class="edit" data-id="${note.id}">Редагувати</button>
                    <button class="delete" data-id="${note.id}">Видалити</button>
                </div>
            `;
            notesContainer.appendChild(noteElement);
        });

        //Buttons
        document.querySelectorAll('.edit').forEach(btn => {
            btn.addEventListener('click', function() {
                const noteId = this.getAttribute('data-id');
                const noteElement = this.closest('.note');
                const title = noteElement.querySelector('h3').textContent;
                const content = noteElement.querySelector('p').textContent;
                openEditModal(noteId, title, content);
            });
        });

        document.querySelectorAll('.delete').forEach(btn => {
            btn.addEventListener('click', function() {
                const noteId = this.getAttribute('data-id');
                deleteNote(noteId);
            });
        });
    }

    //Edit Modal Window
    async function openEditModal(noteId, title, content) {
        try {
            const response = await fetch('api/check_note.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ id: noteId })
            });

            const data = await response.json();

            if (!data.isOwner) {
                showMessage('error', 'Ви можете редагувати лише свої нотатки');
                return;
            }

            currentNoteId = noteId;
            document.getElementById('editTitle').value = decodeHtmlEntities(title);
            document.getElementById('editContent').value = decodeHtmlEntities(content);
            document.getElementById('editModal').style.display = 'block';

        } catch (error) {
            console.error('Помилка при перевірці прав доступу:', error);
            showMessage('error', 'Не вдалося перевірити права доступу');
        }
    }

    //+ View HTML Content
    function decodeHtmlEntities(text) {
        const textArea = document.createElement('textarea');
        textArea.innerHTML = text;
        return textArea.value;
    }

    //Delete Note
    async function checkNoteOwnership(noteId) {
        try {
            const response = await fetch('api/check_note.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ id: noteId })
            });
            const data = await response.json();
            return data.isOwner;
        } catch (error) {
            console.error('Помилка перевірки власності:', error);
            return false;
        }
    }

    window.deleteNote = async (noteId) => {
        const isOwner = await checkNoteOwnership(noteId);
        if (!isOwner) {
            showMessage('error', 'Ви можете видаляти лише свої нотатки');
            return;
        }

        if (!confirm('Видалити цю нотатку?')) return;

        try {
            const response = await fetch('api/delete.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ id: noteId })
            });

            if (!response.ok) {
                throw new Error('Помилка видалення');
            }

            loadNotes();
            showMessage('success', 'Нотатку видалено!');
        } catch (error) {
            showMessage('error', error.message);
        }
    };

    //Edit Note
    window.openEditModal = async (noteId, currentTitle, currentContent) => {
        const isOwner = await checkNoteOwnership(noteId);
        if (!isOwner) {
            showMessage('error', 'Ви можете редагувати лише свої нотатки');
            return;
        }

        currentNoteId = noteId;
        document.getElementById('editTitle').value = currentTitle;
        document.getElementById('editContent').value = currentContent;
        document.getElementById('editModal').style.display = 'block';
    };

    //Additionally
    function escapeHtml(unsafe) {
        return unsafe
            .replace(/&/g, "&amp;")
            .replace(/</g, "&lt;")
            .replace(/>/g, "&gt;")
            .replace(/"/g, "&quot;")
            .replace(/'/g, "&#039;");
    }

    //Authentication
    async function updateAuthUI() {
        try {
            const response = await fetch('api/check_auth.php');
            const data = await response.json();

            if (data.authenticated) {
                document.getElementById('userGreeting').textContent = `Вітаю, ${data.username}!`;
                document.getElementById('logoutBtn').style.display = 'inline';
                loginBtn.style.display = 'none';
                registerBtn.style.display = 'none';
                noteForm.style.display = 'block';
            } else {
                document.getElementById('logoutBtn').style.display = 'none';
                loginBtn.style.display = 'inline';
                registerBtn.style.display = 'inline';
                noteForm.style.display = 'none';
            }
        } catch (error) {
            console.error('Помилка перевірки авторизації:', error);
        }
    }

    //Initialization
    updateAuthUI();
    loadNotes();

    //Logout
    document.getElementById('logoutBtn').addEventListener('click', async () => {
        try {
            const response = await fetch('api/logout.php');
            if (response.ok) {
                await updateAuthUI();
                await loadNotes();
                showMessage('success', 'Ви вийшли з системи');
            }
        } catch (error) {
            showMessage('error', 'Помилка при виході');
        }
    });
});