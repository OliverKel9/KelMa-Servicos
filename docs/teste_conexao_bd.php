<?php
include_once 'includes/db.php';

if ($pdo) {
    echo "Conexão bem-sucedida!";
} else {
    echo "Erro na conexão!";
}
?>