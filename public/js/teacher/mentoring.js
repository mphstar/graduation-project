const backdropp = document.getElementById('bg_modal')
const contentt = document.getElementById('konten_modal')
const question = document.getElementById('question')
const id = document.getElementById('id')

const setModalAnswer = (item) => {
    question.innerHTML = item.question
    console.log(item);
    id.value = item.id
    handleAnswer()
}

const handleAnswer = () => {
    
    if(backdropp.classList.contains('opacity-0')){
        contentt.classList.replace('scale-0', 'scale-100')
        backdropp.classList.replace('opacity-0', 'opacity-30')

        backdropp.classList.replace('pointer-events-none', 'pointer-events-auto')
    } else {
        contentt.classList.replace('scale-100', 'scale-0')
        backdropp.classList.replace('opacity-30', 'opacity-0')

        backdropp.classList.replace('pointer-events-auto', 'pointer-events-none')
    }
}