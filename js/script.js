const startBtn = document.getElementById('start-btn');
const menu = document.getElementById('start-menu');

// Toggle ao clicar no botão
startBtn.addEventListener('click', (e) => {
    e.stopPropagation(); // impede o clique de fechar imediatamente
    menu.classList.toggle('show');
    menu.classList.toggle('hide');
});

// Fecha ao clicar fora do menu
document.addEventListener('click', (e) => {
    if (!menu.contains(e.target) && e.target !== startBtn) {
        menu.classList.remove('show');
        menu.classList.add('hide');
    }
});

// BSOD
const bsod = document.getElementById('run')
const error = new Audio('assets/audio/win-xp-error.mp3')
bsod.addEventListener('click', () => {
    error.currentTime = 0
    error.play()
    setTimeout(() => {
        window.location.href = "bsod.html";
    }, 1250)
})

function cadastra() {
    window.location.href = "signup.php";
}
function start() {
    window.location.href = "index.php";
}
function logoff() {
    window.location.href = "logout.php"
}