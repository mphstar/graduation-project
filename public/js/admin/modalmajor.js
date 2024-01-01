function openModalAddMajor() {
    document.getElementById('modalOverlayAddMajor').classList.remove('hidden');
    document.getElementById('modalContentAddMajor').classList.remove('hidden');
}

function closeModalAddMajor() {
    document.getElementById('modalOverlayAddMajor').classList.add('hidden');
    document.getElementById('modalContentAddMajor').classList.add('hidden');

    document.querySelector('[name="major"]').value = '';
}

function openModalUpdateMajor(id, name) {
    document.getElementById('modalOverlayUpdateMajor').classList.remove('hidden');
    document.getElementById('modalContentUpdateMajor').classList.remove('hidden');

    document.getElementById('update_id').value = id;
    document.getElementById('update_name').value = name;
}

function closeModalUpdateMajor() {
    document.getElementById('modalOverlayUpdateMajor').classList.add('hidden');
    document.getElementById('modalContentUpdateMajor').classList.add('hidden');
}