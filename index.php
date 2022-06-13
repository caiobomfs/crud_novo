<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="assets/css/style.css">
<title>Agenda</title>
</head>
<body class="bg-info">
    <header>
        <h1 class="d-flex justify-content-center mb-5 text-white">Bem vindo a agenda Telefonica</h1>
    </header>
        <!-- menu-->
    <section class="container d-flex justify-content-center mt-5">
      <?php 
      require_once 'config.php';
      $users = readUserAction($conn); ?>
        <div class="col-6 align-self-center">
            <div class=" d-flex row   justify-content-center mt-5">
                <button class="col-lg-2  " data-toggle="modal" data-target="#lista">Listar contatos</button>
            </div>
            <div class="white-box text-info">...</div>
            <div class="d-flex row   justify-content-center mt  mt-5">
                <button class="col-lg-2 " data-toggle="modal" data-target="#editar">Editar contatos</button>
            </div>
            <div class="white-box text-info">...</div>
            <div class="d-flex row   justify-content-center mt  mt-5">
                <button class="col-lg-2 " data-toggle="modal" data-target="#excluir">Excluir contatos</button>
            </div>
        </div>
    </section>
    <!-- Modal1 -->
<div class="modal fade" id="lista" tabindex="-1" role="dialog" aria-labelledby="listaTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="listaTitle">Sua lista de contatos</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
    <!-- Modal2 -->
<div class="modal fade" id="editar" tabindex="-1" role="dialog" aria-labelledby="editarTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editarTitle">selecione e edite os contatos</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Salvar mudanças</button>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal3 -->
<div class="modal fade" id="excluir" tabindex="-1" role="dialog" aria-labelledby="excluirTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="excluirTitle">Selecione os contatos a serem excluidos</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Salvar mudanças</button>
        </div>
      </div>
    </div>
  </div>
    
    
    
    
    
    
    
    
    
    
    
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>
</html>