
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" >
    <title>Index - PHP</title>

</head>
<body>
     <?php require_once '_parts/_menu.php';
     $gruposMusculares = [' Peito', 'Costas', 'Pernas', 'Braços', 'Ombros', 'Abdômen', 'Glúteos', 'Panturrilhas', 'Trapézio', 'Antebraços', 'Quadríceps', 'Adutores', 'Abdutores', 'Lombar', 'Deltoides Anteriores', 'Deltoides Laterais', 'Deltoides Posteriores'];
      spl_autoload_register(function($class){
        require_once "class/{$class}.class.php";
     });
     ?>
      <!-- existem 2 metodos de envio de formulario, get e post --- trabalhamos aqui o post -->
     <main class="container" style="margin-top: 80px;">
        <div class="mt-5 ">
            <h4> Cadastro de Exercícios</h4>
        </div>


        <div class="card">
          <form action="db-exercicio.php" method="post" class="row g3 mt-3 p-3">
            <div class="col-12">
              <label for="nome" class="form-label">Nome do Exercício</label>
              <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o nome do exercício" required>
            </div>


            <div class="col-12">
              <label for="descricao">Descrição</label>
              <textarea name="descricao" id="descricao" class="form-control" ></textarea>
            </div>

            <div class="col-md-6">
              <label for="grupoMuscular">Grupo Muscular</label>
              <select name="grupoMuscular" id="grupoMuscular" class="form-select">
                <option value="">Selecione o grupo muscular</option>
                <?php foreach($gruposMusculares as $grupo): ?>
                  <option value="<?php echo $grupo; ?>"><?php echo $grupo; ?></option>
                <?php endforeach; ?>
              </select>
            </div>



            <div class="col-12 mt-3"> 
              <a href="exercicios.php" class="btn btn-secondary"> Voltar </a>
              <button type="submit" class="btn btn-primary" name="btnEnviar"> Enviar </button>
            </div>


          </form>

        </div>
     </main>

    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>