<?php

require_once '../entity/Perfil.php'; 

// funçao para verificar se o tipo do perfil do usuario é adm
function isAdmin(): bool {
    return isset($_SESSION['perfil']) && $_SESSION['perfil'] == Perfil::ADMINISTRADOR;
}

// chama a funcao admin e se o perfil nao for adm ele nao libera o acesso
function requireAdmin() {
    if (!isAdmin()) {
        echo "Acesso negado. Esta funcionalidade é restrita a administradores.";
        exit;
    }
}