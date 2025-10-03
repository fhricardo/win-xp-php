let zIndexAtual = 1000;
let contador = 0;

function newWindow(titulo, ref, id) {
    contador++;

    const win = document.createElement('div');
    win.className = 'window inactive';
    win.style.top = (100 + contador * 30) + 'px';
    win.style.left = (200 + contador * 30) + 'px';
    win.style.zIndex = zIndexAtual++;
    win.style.display = 'block';
    switch (ref) {
        case 'cmd':
            win.innerHTML = `
                <div class="titleBar">
                <span style="display:flex;align-items:center;gap:4px;"> <img src="assets/ico-cmd.webp" width="24">C:&bsol;WINDOWS&bsol;System32&bsol;cmd.exe</span>
                <button class="close">&times;</button>
                </div>
                <div class="contents-cmd">
                Microsoft Windows XP [Version 5.1.2600]<br>
                (C) Copyright 1985-2001 Microsoft Corp.<br>
                <br>C:&bsol;Users&bsol;Username&gt;
                </div>
            `
            break
        case 'users':
            win.innerHTML = `
            <div class="titleBar">
                <span>${titulo}</span>
                <button class="close">&times;</button>
            </div>
            <div class="contents">
                &lt;?php include 'includes/users.php';?&gt;
            </div>
            `
            break
        default:
            win.innerHTML = `
            <div class="titleBar">
                <span>${titulo}</span>
                <button class="close">&times;</button>
            </div>
            <div class="contents">
                <p>Olá! Eu sou uma Janela!</p>
            </div>
            `
            break
    }
    document.body.appendChild(win);

    // botão da taskbar
    const taskBtn = document.createElement('div');
    taskBtn.textContent = titulo;
    taskBtn.className = 'inactiveWindow';
    document.querySelector('.task-bar').appendChild(taskBtn);

    // evento de fechar
    win.querySelector('.close').addEventListener('click', (e) => {
        e.stopPropagation(); // evita conflito com activateWindow
        taskBtn.remove();
        win.remove();
    });

    // clicar no botão da taskbar ativa a janela
    taskBtn.addEventListener('click', () => {
        activateWindow(win, taskBtn);
    });

    // clicar na janela também ativa
    win.addEventListener('mousedown', () => activateWindow(win, taskBtn));

    // drag básico
    const titleBar = win.querySelector('.titleBar');
    //titleBar.style.cursor = "move";
    let dragging = false, startX = 0, startY = 0, startLeft = 0, startTop = 0;

    titleBar.addEventListener('mousedown', (e) => {
        dragging = true;
        startX = e.clientX;
        startY = e.clientY;
        startLeft = parseFloat(getComputedStyle(win).left) || 0;
        startTop = parseFloat(getComputedStyle(win).top) || 0;
        document.addEventListener('mousemove', move);
        document.addEventListener('mouseup', stop);
    });

    function move(e) {
        if (!dragging) return;
        win.style.left = (startLeft + (e.clientX - startX)) + 'px';
        win.style.top = (startTop + (e.clientY - startY)) + 'px';
    }

    function stop() {
        dragging = false;
        document.removeEventListener('mousemove', move);
        document.removeEventListener('mouseup', stop);
    }

    // ativa automaticamente a nova janela
    activateWindow(win, taskBtn);
}

function activateWindow(winAtiva, taskBtnAtivo) {
    // todas ficam inativas
    document.querySelectorAll('.window').forEach(w => w.classList.add('inactive'));
    document.querySelectorAll('.task-bar div').forEach(b => {
        b.classList.remove('activeWindow');
        b.classList.add('inactiveWindow');
    });

    // ativa a escolhida
    winAtiva.classList.remove('inactive');
    winAtiva.style.zIndex = zIndexAtual++;

    taskBtnAtivo.classList.remove('inactiveWindow');
    taskBtnAtivo.classList.add('activeWindow');
}