<?php

# Atividade Banco De Dados - Estudo de Tecnoloogia

$usuarios = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);

    if (isset($data['cpf']) && isset ($data['nome']) && isset($data['data_nascimento'])) {
        $novoUsuario = [
            'cpf' => $data['cpf'],
            'nome' => $data['nome'],
            'data_nascimento' => $data['data_nascimento']
        ];

        $usuarios[] = $novoUsuario;

        echo json_encode(['EXCELENTE :)' => 'Seu usuario foi criado com sucesso']);
    } else {
        echo json_encode(['Aconteceu um erro :( ' => 'Aconteceu algo de errado, tente novamente']);
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $cpf = $_GET['cpf'];

    $usuarioExiste = null;
    foreach ($usuarios as $usuario) {
        if ($usuario['cpf'] == $cpf) {
            $usuarioExiste = $usuario;
            break;
        }
    }

    if ($usuarioExiste) {
        echo json_encode($usuarioExiste);
    } else {
        echo json_encode(['Aconteceu um erro :( ' => 'Este usuario nao existe']);
    }
}
?>
