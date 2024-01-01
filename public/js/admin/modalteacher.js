
function openModal() {
    document.getElementById('modalOverlay').classList.remove('hidden');
    document.getElementById('modalContent').classList.remove('hidden');
}

function closeModal() {
    document.querySelector('[name="email"]').value = '';
    document.querySelector('[name="first_name"]').value = '';
    document.querySelector('[name="last_name"]').value = '';
    document.querySelector('[name="teacher_id"]').value = '';
    document.querySelector('[name="password"]').value = '';
    document.querySelector('[name="password_confirmation"]').value = '';

    document.getElementById('modalOverlay').classList.add('hidden');
    document.getElementById('modalContent').classList.add('hidden');
}

function openUpdateModal(id, firstName, lastName, teacherId, email) {
    // Menampilkan modal
    document.getElementById('modalOverlayUpdate').classList.remove('hidden');
    document.getElementById('modalContentUpdate').classList.remove('hidden');

    // Mengisi nilai textfield dengan data dari tabel
    document.getElementById('update_id').value = id;
    document.getElementById('update_first_name').value = firstName;
    document.getElementById('update_last_name').value = lastName;
    document.getElementById('update_teacher_id').value = teacherId;
    document.getElementById('update_email').value = email;
}

function closeUpdateModal() {
    document.getElementById('modalOverlayUpdate').classList.add('hidden');
    document.getElementById('modalContentUpdate').classList.add('hidden');
}