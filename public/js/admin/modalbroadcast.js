function openModal() {
    document.getElementById('modalOverlay').classList.remove('hidden');
    document.getElementById('modalContent').classList.remove('hidden');
}

function closeModal() {
    document.querySelector('#broadcast_title').value = '';
    document.querySelector('#broadcast_content').value = '';

    document.getElementById('modalOverlay').classList.add('hidden');
    document.getElementById('modalContent').classList.add('hidden');
}