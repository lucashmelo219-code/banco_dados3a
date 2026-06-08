<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" >
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <title>Gerenciar Alunos</title>

</head>
<body>
     <?php require_once '_parts/_menu.php';
      $sexo = ['Masculino', 'Feminino', 'Outro'];
     
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

<!-- DADOS DE ACESSO -->
<div class="col-12 ">
    <h4><strong>Dados de Acesso</strong></h4>
</div>

<!-- E-mail -->
<div class="col-md-5">
    <label for="email" class="form-label">E-mail</label>
    <div class="input-group">
        <span class="input-group-text">@</span>
        <input type="email" class="form-control" id="email" name="email"value="<?= $aluno->email ?? null; ?>">
    </div>
</div>

<!-- Usuário -->
<div class="col-md-3">
    <label for="usuario" class="form-label">Usuário</label>
    <input  type="text"  class="form-control"  id="usuario"  name="usuario" value="<?= $aluno->usuario ?? null; ?>">
</div>

<!-- Senha -->
<div class="col-md-2">
    <label for="senha" class="form-label">Senha</label>
    <div class="input-group">
      <button type="button" class="btn btn-outline-secondary" id="toggleSenha">
        <i class="bi bi-eye-slash-fill"></i>
      </button>
      <input  type="password"  class="form-control"  id="senha"  name="senha">
    </div>
</div>

<!-- Confirmar Senha -->
<div class="col-md-2">
    <label for="confirmar_senha" class="form-label">Confirmar Senha</label>
    <div class="input-group">
      <button type="button" class="btn btn-outline-secondary" id="toggleConfirmarSenha">
        <i class="bi bi-eye-slash-fill"></i>
      </button>
      <input  type="password"  class="form-control"  id="confirmar_senha"  name="confirmar_senha">
    </div>
</div>
            <div class="col-6 mt-4" >
              <h5 class="form-label"><strong>Dados Pessoais</strong></h5>
            </div>

             <input type="hidden" name="id" value="<?= $id ?? null?>">
            <div class="col-12">
              <label for="nome" class="form-label">Nome do Aluno</label>
              <input type="text" class="form-control" id="nome" name="nome"  required value="<?= $aluno->nome ?? null;?>">
            </div>

            <!-- E-mail pessoal removido (já existe campo E-mail em Dados de Acesso) -->


            <div class="col-md-6">
              <label for="sexo">Sexo</label>

             <?php
              $sexo_sel = $aluno->sexo ?? null;
              ?>

              <select name="Sexo" id="sexo" class="form-select">
                <option value="">Selecione o sexo do aluno</option>

                   <?php foreach($sexo as $sx):?>
                  <option value="<?= $sx ?>"
                  <?php
                  if ($sx == $sexo_sel) echo'selected';
                  ?>
                  >
                    <?= $sx ?>
                  </option>
                <?php endforeach;?>  
              </select>
              </div>

   
            <div class="row g-3">


  <!-- Nascimento -->
  <div class="col-md-6">
    <label for="nascimento" class="form-label">Data de Nascimento</label> 
    <input type="date" class="form-control" id="nascimento" name="nascimento" value="<?= $aluno->nascimento ?? null; ?>">
  </div>

  <!-- Celular -->
  <div class="col-md-6">
    <label for="celular" class="form-label">Celular</label>
    <input type="text" class="form-control" id="celular" name="celular" maxlength="20" value="<?= $aluno->celular ?? null; ?>" data-mascara ="(00) 00000-0000">
  </div>

  <!-- Logradouro -->
  <div class="col-6">
    <label for="logradouro" class="form-label">Logradouro</label>
    <input type="text" class="form-control" id="logradouro" name="logradouro" maxlength="100" value="<?= $aluno->logradouro ?? null; ?>">
  </div>

  <!-- Bairro -->
  <div class="col-md-6">
    <label for="bairro" class="form-label">Bairro</label>
    <input type="text" class="form-control" id="bairro" name="bairro" maxlength="100" value="<?= $aluno->bairro ?? null; ?>">
  </div>

  <!-- Cidade -->
  <div class="col-md-5">
    <label for="cidade" class="form-label">Cidade</label>
    <input type="text" class="form-control" id="cidade" name="cidade" maxlength="100" value="<?= $aluno->cidade ?? null; ?>">
  </div>

  <!-- Estado -->
  <div class="col-md-2">
    <label for="estado" class="form-label">Estado</label>
    <input type="text" class="form-control" id="estado" name="estado" maxlength="2" placeholder="UF" value="<?= $aluno->estado ?? null; ?>">
  </div>

  <!-- CEP -->
  <div class="col-md-5  ">
    <label for="cep" class="form-label">CEP</label>
    <input type="text" class="form-control" id="cep" name="cep" maxlength="9" placeholder="00000-000" value="<?= $aluno->cep ?? null; ?>" data-mascara="00000-000">
  </div>

  <!-- Objetivo -->
  <div class="col-12">
    <label for="objetivo" class="form-label">Objetivo</label>
    <textarea class="form-control" id="objetivo" name="objetivo" rows="4"><?= $aluno->objetivo ?? null; ?></textarea>
  </div>


  </div>
  </div>

            </div>



            <div class="col-12 mt-3"> 
              <a href="Alunos.php" class="btn btn-secondary"> Voltar </a>
              <button type="submit" class="btn btn-primary" name="btnEnviar"> Enviar </button>
            </div>

          
          </form>

        </div>
     </main>

  
    <script src="js/utils.js"></script>                
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>