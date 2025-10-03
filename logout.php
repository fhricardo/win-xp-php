<?php
session_start();
$_SESSION = [];  // limpa todas as variáveis de sessão
session_destroy(); // destrói a sessão
header("Location: index.php");
exit;
