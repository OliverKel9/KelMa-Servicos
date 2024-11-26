<?php
include_once 'includes/db.php';

if (isset($conn)) {
    echo "Conexão bem-sucedida!";
} else {
    echo "Erro na conexão!";
}
?>