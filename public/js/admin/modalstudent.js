function openUpdateModal(id, firstName, lastName, studentId, major) {
    document.getElementById('modalOverlayUpdate').classList.remove('hidden');
    document.getElementById('modalContentUpdate').classList.remove('hidden');

    document.getElementById('update_id').value = id;
    document.getElementById('update_first_name').value = firstName;
    document.getElementById('update_last_name').value = lastName;
    document.getElementById('update_student_id').value = studentId;
    document.getElementById('update_major').value = major;
}

function closeUpdateModal() {
    document.getElementById('modalOverlayUpdate').classList.add('hidden');
    document.getElementById('modalContentUpdate').classList.add('hidden');
}