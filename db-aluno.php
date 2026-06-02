<?php
spl_autoload_register(function($class){
    require_once "class/{$class}.class.php";
});

$aluno = new Aluno();

if (filter_has_var(INPUT_POST, "btnEnviar")) {
    $aluno->setId(filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT));
    $aluno->setNome(filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING));
    $aluno->setCelular(filter_input(INPUT_POST, 'celular', FILTER_SANITIZE_STRING));
    $aluno->setEmail(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING));
    $aluno->setFKUsuario(filter_input(INPUT_POST, 'fkusuario', FILTER_SANITIZE_STRING));
    $aluno->setLogradouro(filter_input(INPUT_POST, 'logradouro', FILTER_SANITIZE_STRING));
    $aluno->setCidade(filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_STRING));
    $aluno->setCep(filter_input(INPUT_POST, 'cep', FILTER_SANITIZE_STRING));
    $aluno->setSexo(filter_input(INPUT_POST, 'Sexo', FILTER_SANITIZE_STRING));
    $aluno->setNascimento(filter_input(INPUT_POST, 'nascimento', FILTER_SANITIZE_STRING));
    $aluno->setEstado(filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_STRING));


    if ($aluno->getId() > 0) {
        $aluno->update();{
        header("Location:index.php");}
    } else {
        $aluno->add();{
             header("Location:index.php");
        }
    }


}

if (filter_has_var(INPUT_POST, "btn-deletar")) {
    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
    if($aluno->delete('idaluno', $id)){
    header("Location:index.php");
    }
   
}
