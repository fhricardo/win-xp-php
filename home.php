<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Windows XP</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/script.js" defer></script>
    <script src="js/clock.js" defer></script>
    <script src="js/newWindows.js" defer></script>
</head>

<body>
    <!-- Menu iniciar -->
    <div id="start-menu" class="hide">
        <div class="user">
            <div class="userProfile" id="userProfile">
                <img src="assets/user-profile.webp" alt="">
            </div>
            <h3>Username</h3>
        </div>
        <div class="mid">
            <div class="left">
                <div class="l-top">
                    <div class="l-item" onclick="newWindow('cmd', 'cmd')">
                        <img src="assets/ico-cmd.webp" alt="">Prompt de Comando
                    </div>
                </div>
                <div class="hr"></div>
                <div class="l-item-bold">
                    Todos os Programas <img src="assets/ico-all-prog.ico" alt="">
                </div>
            </div>
            <div class="right">
                <!-- Cliente -->
                <div class="r-item-bold" onclick="newWindow('Cadastrar Cliente', 'Conteúdo da primeira janela')">
                    <img src="assets/user.ico" alt="">Cadastrar Cliente
                </div>
                <div class="r-item-bold" onclick="newWindow('Exibir Clientes', 'show_users')">
                    <img src="assets/users-list.ico" alt="">Exibir Clientes
                </div>
                <div class="hr"></div>

                <!-- Fornecedor -->
                <div class="r-item-bold" onclick="newWindow('Cadastrar Fornecedor', 'add_supplier')">
                    <img src="assets/supplier.ico" alt="">Cadastrar Fornecedor
                </div>
                <div class="r-item-bold" onclick="newWindow('Exibir Fornecedores', 'show_suppliers')">
                    <img src="assets/suppliers.ico" alt="">Exibir Fornecedores
                </div>
                <div class="hr"></div>

                <!-- Produto -->
                <div class="r-item-bold" onclick="newWindow('Cadastrar Produto', 'Conteúdo da primeira janela')">
                    <img src="assets/product-add.webp" alt="">Cadastrar Produto
                </div>
                <div class="r-item-bold" onclick="newWindow('Exibir Produtos', 'Conteúdo da primeira janela')">
                    <img src="assets/product.webp" alt="">Exibir Produtos
                </div>
                <div class="hr"></div>

                <div class="r-item" id="run"><img src="assets/ico-run.ico" alt="">Executar...</div>

            </div>
        </div>
        <div class="logout">
            <div class="logoff">
                <button><img src="assets/ico-logoff.ico" alt="">Sair</button>

            </div>
            <div class="shutdown">
                <a href="logout.html"><button><img src="assets/ico-shutdown.ico" alt="">Desligar</button></a>


            </div>
        </div>
    </div>
    <!-- Barra de Tarefas -->
    <footer>
        <div class="task-bar">
            <button id="start-btn"><img src="assets/logo-start-button.webp" alt="Start">iniciar</button>

        </div>
        <div class="tray">
            <div class="icons">
                <div class="icon">
                    <img src="assets/ico-printer.ico" alt="" title="1 documento na fila">
                </div>
                <div class="icon">
                    <img src="assets/ico-network.ico" alt="">
                </div>
                <div class="icon">
                    <img src="assets/ico-volume.ico" alt="">
                </div>
            </div>
            <div class="clock">
                <p id="clock"></p>
            </div>
        </div>
    </footer>
    <script>
        // Esse script reproduz o som ao entrar
        window.addEventListener("load", () => {
            let ref = document.referrer; // URL da página anterior
            // Verifica se a URL contém "pagina1.html"
            if (ref.includes("index.html")) {
                let audio = new Audio("assets/audio/win-xp-startup.mp3");
                audio.play()
                    .then(() => console.log("Som tocando!"))
                    .catch(err => console.log("Reprodução bloqueada:", err));
            }
        });
    </script>
</body>

</html>