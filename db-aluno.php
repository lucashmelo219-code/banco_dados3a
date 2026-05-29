<?php
spl_autoload_register(function($class){
    require_once "class/{$class}.class.php";
});

$aluno = new Aluno();

if (filter_has_var(INPUT_POST, "btnEnviar")) {
    $aluno->setId(filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT));
    $aluno->setNome(filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING));
    $aluno->setDescricao(filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING));
    $aluno->setGrupoMuscular(filter_input(INPUT_POST, 'grupoMuscular', FILTER_SANITIZE_STRING));

    if ($aluno->getId() > 0) {
        $aluno->update();
    } else {
        $aluno->add();
    }

    header("Location:index.php");
    exit;
}

if (filter_has_var(INPUT_POST, "btn-deletar")) {
    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
    $aluno->delete('idaluno', $id);
    header("Location:index.php");
    exit;
}
