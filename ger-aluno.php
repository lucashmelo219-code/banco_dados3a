<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" >
    <title>Gerenciar Alunos</title>

</head>
<body>
     <?php require_once '_parts/_menu.php';
     $turmas = ['Turma A', 'Turma B', 'Turma C', 'Turma D', 'Turma E'];
     
      spl_autoload_register(function($class){
        require_once "class/{$class}.class.php";
     });
     if (filter_has_var(INPUT_GET,"id")) {
        $edtAluno = new Aluno();
        $id = intval(filter_input(INPUT_GET,"id"));
        $aluno = $edtAluno->search('idaluno', $id);
      }
     ?>
      <!-- existem 2 metodos de envio de formulario, get e post --- trabalhamos aqui o post -->
     <main class="container" style="margin-top: 80px;">
        <div class="mt-5 ">
            <h4>Cadastro de Alunos</h4>
        </div>


        <div class="card">
          <form action="db-aluno.php" method="post" class="row g3 mt-3 p-3">

             <input type="hidden" name="id" value="<?= $id ?? null?>">
            <div class="col-12">
              <label for="nome" class="form-label">Nome do Aluno</label>
              <input type="text" class="form-control" id="nome" name="nome"  required value="<?= $aluno->nome ?? null;?>">
            </div>


            <div class="col-12">
              <label for="celular">Celular</label>
              <input type="text" class="form-control" id="celular" name="celular" value="<?= $aluno->celular ?? null;?>">
            </div>

            <div class="col-12">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" name="email" value="<?= $aluno->email ?? null;?>">
            </div>
    
            </div>



            <div class="col-12 mt-3"> 
              <a href="Alunos.php" class="btn btn-secondary"> Voltar </a>
              <button type="submit" class="btn btn-primary" name="btnEnviar"> Enviar </button>
            </div>


          </form>

        </div>
     </main>

    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>