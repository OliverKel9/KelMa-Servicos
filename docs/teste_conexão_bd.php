<?php
include_once 'caminho_para_o_arquivo/db_connect.php';

if ($pdo) {
    echo "Conexão bem-sucedida!";
} else {
    echo "Erro na conexão!";
}
?>