<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome            = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
    $cpf             = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_SPECIAL_CHARS);
    $email           = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $celular         = filter_input(INPUT_POST, 'celular', FILTER_SANITIZE_SPECIAL_CHARS);
    $data_nascimento = filter_input(INPUT_POST, 'data_nascimento', FILTER_SANITIZE_SPECIAL_CHARS);
    $genero          = filter_input(INPUT_POST, 'genero', FILTER_SANITIZE_SPECIAL_CHARS);
    $cep             = filter_input(INPUT_POST, 'cep', FILTER_SANITIZE_SPECIAL_CHARS);
    $numero          = filter_input(INPUT_POST, 'numero', FILTER_SANITIZE_SPECIAL_CHARS);
    $experiencia     = filter_input(INPUT_POST, 'experiencia', FILTER_SANITIZE_SPECIAL_CHARS);
    $mensagem        = filter_input(INPUT_POST, 'mensagem', FILTER_SANITIZE_SPECIAL_CHARS);

    if ($nome && $cpf && $email && $celular && $data_nascimento && $genero && $cep && $numero && $experiencia) {

        $_SESSION['revendedor_nome'] = $nome;
        $_SESSION['revendedor_celular'] = $celular;

        header('Location: suporteRevendedor.php');
        exit();
    }
}

header('Location: revendedor.php');
exit();
?>