const backdrop = document.getElementById('backdrop')
const content = document.getElementById('content')

const handleModal = () => {
    if(backdrop.classList.contains('opacity-0')){
        content.classList.replace('translate-x-[1280px]', 'translate-x-0')
        backdrop.classList.replace('opacity-0', 'opacity-30')

        backdrop.classList.replace('pointer-events-none', 'pointer-events-auto')
    } else {
        content.classList.replace('translate-x-0', 'translate-x-[1280px]')
        backdrop.classList.replace('opacity-30', 'opacity-0')

        backdrop.classList.replace('pointer-events-auto', 'pointer-events-none')
    }
}