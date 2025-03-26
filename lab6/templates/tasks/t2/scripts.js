document.addEventListener('DOMContentLoaded', function() {
    const noteForm = document.getElementById('noteForm');
    const notesContainer = document.getElementById('notesContainer');

    loadNotes();

    noteForm.addEventListener('submit', function(e) {
        e.preventDefault();

        const title = document.getElementById('title').value;
        const content = document.getElementById('content').value;

        if (title && content) {
            addNote({ title, content });
            noteForm.reset();
        } else {
            alert('Будь ласка, заповніть всі поля');
        }
    });

    function loadNotes() {
        fetch('api/read.php')
            .then(response => response.json())
            .then(notes => {
                displayNotes(notes);
            })
            .catch(error => console.error('Помилка при завантаженні заміток:', error));
    }

    function displayNotes(notes) {
        notesContainer.innerHTML = '';

        if (notes.length === 0) {
            notesContainer.innerHTML = '<p>No notes:( Add the first one!</p>';
            return;
        }

        notes.forEach(note => {
            const noteElement = document.createElement('div');
            noteElement.className = 'note';
            noteElement.dataset.id = note.id;

            noteElement.innerHTML = `
                <h3>${note.title}</h3>
                <p>${note.content}</p>
                <div class="date">Last Update: ${new Date(note.updated_at).toLocaleString()}</div>
                <div class="actions">
                    <button class="edit" onclick="editNote(${note.id})">Edit</button>
                    <button class="delete" onclick="deleteNote(${note.id})">Delete</button>
                </div>
                <div id="editForm-${note.id}" class="note-form-edit">
                    <form onsubmit="updateNote(event, ${note.id})">
                        <div class="form-group">
                            <label for="editTitle-${note.id}">Title:</label>
                            <input type="text" id="editTitle-${note.id}" value="${note.title}" required>
                        </div>
                        <div class="form-group">
                            <label for="editContent-${note.id}">Text:</label>
                            <textarea id="editContent-${note.id}" rows="4" required>${note.content}</textarea>
                        </div>
                        <button type="submit">Update</button>
                        <button type="button" onclick="cancelEdit(${note.id})">Cancel</button>
                    </form>
                </div>
            `;

            notesContainer.appendChild(noteElement);
        });
    }

    function addNote(noteData) {
        fetch('api/create.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(noteData)
        })
            .then(response => response.json())
            .then(data => {
                console.log('Note Add:', data);
                loadNotes();
            })
            .catch(error => console.error('Помилка при додаванні замітки:', error));
    }

    window.editNote = function(noteId) {
        document.getElementById(`editForm-${noteId}`).style.display = 'block';
    };

    window.cancelEdit = function(noteId) {
        document.getElementById(`editForm-${noteId}`).style.display = 'none';
    };

    window.updateNote = function(e, noteId) {
        e.preventDefault();

        const title = document.getElementById(`editTitle-${noteId}`).value;
        const content = document.getElementById(`editContent-${noteId}`).value;

        if (title && content) {
            fetch('api/update.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    id: noteId,
                    title: title,
                    content: content
                })
            })
                .then(response => response.json())
                .then(data => {
                    console.log('Note Update:', data);
                    loadNotes();
                })
                .catch(error => console.error('Помилка при оновленні замітки:', error));
        } else {
            alert('Будь ласка, заповніть всі поля');
        }
    };

    window.deleteNote = function(noteId) {
        if (confirm('Ви впевнені, що хочете видалити цю замітку?')) {
            fetch('api/delete.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ id: noteId })
            })
                .then(response => response.json())
                .then(data => {
                    console.log('Note Delete:', data);
                    loadNotes();
                })
                .catch(error => console.error('Помилка при видаленні замітки:', error));
        }
    };
});