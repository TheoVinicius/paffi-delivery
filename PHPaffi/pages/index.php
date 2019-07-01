<?php
require_once '../POO/usuarios.php';
$u = new Usuario;

if (isset($_POST['email'])) {
  $emaill = addslashes($_POST['email']);
  $senhal = addslashes($_POST['senha']);
if (!empty($emaill) && !empty($senhal))
{ $u->bdconnect("paffi2", "127.0.0.1", "root", "");
  if ($u->error == "") {
    if($u->logar($emaill, $senhal)){
      header("location: home.php");
    }else{
      $x = "E-mail ou senha incorretos.";
    }
  }else{
    $x = $u->error;
  }
}
else{
  $x = "Preencha todos os Campos";
}
}

if (isset($_POST['nomec'])) {
  $nome = addslashes($_POST['nomec']);
  $sobrenome = addslashes($_POST['sobrenomec']);
  $nome = $nome.' '.$sobrenome;
  $matricula = addslashes($_POST['matriculac']);
  $senha = addslashes($_POST['senhac']);
  $confsenha = addslashes($_POST['confsenhac']);
  $email = addslashes($_POST['emailc']);
  $confemail = addslashes($_POST['confemailc']);
  $conta = ($_POST['conta']);
if (!empty($nome) && !empty($sobrenome) && !empty($senha) && !empty($confsenha) && !empty($email) && !empty($confemail) && !empty($conta) && $conta != 2)
{
  $u->bdconnect("paffi2", "127.0.0.1", "root", "");
  if ($u->error == "") { 
    if($senha == $confsenha){
      if($u->cadastro($nome,$senha,$matricula, $email)){
        $x = "Cadastro realizado com sucesso.";
      }else{
        $x = "Matrícula já cadastrada";
      }

    }else{
      $x = "As senhas não coincidem.";
    }
    
  } else {
    $x = $u->error;
  }
}
else {
  $x = "Preencha todos os campos.";

}
}
?>

<html lang="pt-br">

<head>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link type="text/css" rel="stylesheet" href="../css/materialize.min.css" media="screen,projection" />
  <link type="text/css" rel="stylesheet" href="../css/login.css" media="screen,projection" />
  <link rel="icon" type="image/png" href="../src/imgs/paffi-logo1.png" sizes="16x16">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>
  <div class="row">
    <div class="col l4 s12 offset-l4" id="principal">

      <h2 style="margin-left: 16%">Paffi Delivery</h2>
      <form class="col s12" method="POST">
      <div class="input-field col s8 offset-s2">
        <input id="email" name="email" type="text" class="validate">
        <label for="email">E-Mail</label>
      </div>

      <div class="input-field col s8 offset-s2">
        <input id="senha" name="senha" type="password" class="validate">
        <label for="senha">Senha</label>
        <a href="index.html">Esqueci minha senha</a>
      </div>

      <div class="col s8 offset-s2">
        <button class="hoverable light-blue darken-4 btn waves-effect waves-light" type="submit" name="action" style="width: 100%">Entrar</button>
      </div>

      <div class="col s12" style="padding: 10px;">
        <p class="type-sidelines"><span>Novo por Aqui?</span></p>
        <a class="waves-effect light-blue darken-1 waves-light btn modal-trigger" style="width: 60%; margin-left: 20%" href="#cadastrocard">Cadastrar-se</a>
      </div>

      </form>
    </div>
  </div>

  <div id="cadastrocard" class="modal">
    <div class="modal-content">
      <h4>Cadastre-se</h4>

      <div class="row">
        <form class="col s12" method="POST">
          <div class="row">
            <div class="input-field col l6 s12">
              <input id="nomec" name="nomec" type="text" class="validate" maxlength="15">
              <label for="nomec">Nome *</label>
            </div>
            <div class="input-field col l6 s12">
              <input id="sobrenomec" name="sobrenomec" type="text" class="validate" maxlength="45">
              <label for="sobrenomec">Sobrenome *</label>
            </div>
          </div>

          <div class="row">
            <div class="input-field col l6 s12">
              <input id="matriculac" name="matriculac" type="text" class="validate" maxlength="20">
              <label for="matriculac">Matrícula/Siape</label>
            </div>
          <div class="col l6 s12">
            <select name="conta">
              <option value="" disabled selected>Selecione o tipo de conta *</option>
              <option value="1">Aluno Cliente</option>
              <option value="2">Aluno Vendedor</option>
              <option value="3">Funcionário</option>
              <option value="4">Professor</option>
            </select>
            </div>
          </div>
          
          <div class="row">
              <div class="input-field col l6 s12">
                <input id="emailc" name="emailc" type="email" class="validate" maxlength="20">
                <label for="emailc">E-Mail *</label>
              </div>
              <div class="input-field col l6 s12">
                <input id="confemailc" name="confemailc" type="email" class="validate" maxlength="20">
                <label for="confemailc">Confirme seu e-Mail *</label>
              </div>
            </div>
          <div class="row">
            <div class="input-field col s6">
              <input id="senhac" name="senhac" type="password" class="validate" maxlength="20">
              <label for="senhac">Senha *</label>
            </div>
            <div class="input-field col s6">
              <input id="confsenha" name="confsenhac" type="password" class="validate">
              <label for="confsenha">Confirme sua senha *</label>
            </div>
          </div>
          <div class="modal-footer">
      <button class="hoverable light-blue darken-4 btn waves-effect waves-light" type="submit" value="cadastro" name="cadastro" style="width: 100%">Cadastrar-se</button>
    </div>
        </form>
      </div>
    </div>
  </div>

  <?php
  
  ?>
  <script type="text/javascript" src="../js/materialize.min.js"></script>
  <script>
    M.AutoInit();
  </script>
  <script>
      <?php
    echo "M.toast( {
      html: '$x',
      classes: 'rounded',
      displayLength:1000
  })";

  ?>
  </script>
</body>

</html>