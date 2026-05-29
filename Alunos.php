<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <title>Alunos</title>

</head>
<body>
     <?php require_once '_parts/_menu.php';

     spl_autoload_register(function($class){
        require_once "class/{$class}.class.php";
     });
     
     $aluno = new Aluno();

     

    $alunos = $aluno->all();
     
 ?> 


     <main class="container">
        <div class="mt-5 d-flex justify-content-between p-5 ">
            <h3>Alunos</h3> 
            <a href="ger-aluno.php" class="btn btn-success">Novo Aluno</a>
        </div>
        <div>
          <div class="mb-3">
            <input type="text" name="campo-filtro" id="campo-filtro" class="form-control" placeholder="🔎 Digite para filtrar" title="Digite para filtar pelo nome do aluno">
          </div>
          <table id="tabela-alunos" class="table table-dark table-striped">
            <thead>
              <tr>
                <th class="text-center">#</th>
                <th>Nome</th>
                <th>Celular</th>
                <th>Email</th>
                <th class="text-center">Ações</th>

                
              </tr>
            </thead>
            <tbody>

              <?php 
              foreach ($alunos as $al):
              ?>

              <tr>
                <td class="text-center"><?= $al->idaluno ?></td>
                <td><?php echo $al->nome; ?></td> 
                <td><?php echo $al->celular; ?></td> 
                
                
                <td  class="d-flex gap-1 justify-content-center">
                  <a href="#" class="btn btn-info"> <i class="bi bi-eye-fill"></i> </a>
                  <a href="ger-aluno.php?id=<?= $al->idaluno ?>" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>
                  <form action="db-aluno.php" method="post">
                    <input type="hidden" name="id" value="<?= $al->idaluno ?>">
                   <button type="submit" class="btn btn-danger" name="btn-deletar" onclick="return confirm('Tem certeza que deseja deletar o aluno?');">
                    <i class="bi bi-trash3-fill"></i>
                   </button> 
                  </form>
                
                 
                </td>
              </tr>
              <?php endforeach ?>
            </tbody>
          </table>
          <div id="msg-vazio" class="d-flex justify-content-center alert alert-info p-3 d-none">
      <i class="bi bi-info-circle mx-2"></i> Nenhum aluno encontrado para o filtro digitado.
    </div>  
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/tb-interativa.js"></script>
    <script src="js/alunos.js"></script>
</body>
</html>