<?php

function autoloadClasses($className)
{
    // Lista de diretórios onde as classes podem estar
    $directories = [
        __DIR__ . '/models/',
        __DIR__ . '/controllers/',
        __DIR__ . '/conexao/'
    ];

    // Percorre os diretórios para encontrar a classe
    foreach ($directories as $directory) {
        $filename = $directory . $className . '.class.php';
        if (is_readable($filename)) {
            require_once $filename;
            return;
        }
    }
}

// Registra a função autoload
spl_autoload_register('autoloadClasses');
