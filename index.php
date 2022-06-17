<?php 
  require './config.php';
  $post = filter_input_array(INPUT_POST,FILTER_DEFAULT);
  $get = filter_input_array(INPUT_GET,FILTER_DEFAULT);

  if(!empty($post['nome'])){ 
   

    $nome = $post['nome'];
    $email = $post['email'];
    $numero = $post['numero'];
    $sql = "INSERT INTO `contatos` (`id`, `nome`, `email`, `numero`) VALUES (NULL, '$nome', '$email', '$numero');";
    
    $db->query($sql);
   
  }
  $select = $db->query("SELECT * FROM contatos");
  $select2 = $db->query("SELECT * FROM contatos");
  $select3 = $db->query("SELECT * FROM contatos");

  if($get['edit'] == 1){ 
    $id = $get['id'];
    $select_edit = $db->query("SELECT * FROM contatos WHERE id = '$id'");
    $list = $select_edit->fetch_assoc();
    print_r($list);
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<title>Agenda</title>
</head>
<body class="bg-info">
    <header>
        <h1 class="d-flex justify-content-center mb-5 text-white">Bem vindo a agenda Telefonica</h1>
    </header>
        <!-- menu-->
    <section class="container d-flex justify-content-center mt-5">
        <div class="col-6 align-self-center">
            <div class=" d-flex row   justify-content-center mt-5">
                <button class="col-lg-2  " data-toggle="modal" data-target="#criar">Criar contatos</button>
            </div>
            <div class="white-box text-info">...</div>
            <div class="d-flex row   justify-content-center mt  mt-5">
                <button class="col-lg-2 " data-toggle="modal" data-target="#lista">Listar contatos</button>
            </div>
            <div class="white-box text-info">...</div>
            <div class="d-flex row   justify-content-center mt  mt-5">
                <button class="col-lg-2 " data-toggle="modal" data-target="#editar" >Editar contatos</button>
            </div>
            <div class="white-box text-info">...</div>
            <div class="d-flex row   justify-content-center mt  mt-5">
                <button class="col-lg-2 " data-toggle="modal" data-target="#excluir">Excluir contatos</button>
            </div>
        </div>
    </section>
    <!-- Modal1 -->
<div class="modal fade" id="criar" tabindex="-1" role="dialog" aria-labelledby="criarTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="criarTitle">Criar contatos</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="" method="post" id="001">
            <table>
              <thead>
                <tr>
                  <th scope="col-lg-4">
                    <label for="nome">Nome</label>
                  </th>
                  <th scope="col-lg-4">
                    <label for="email">E-mail</label>
                  </th>
                  <th scope="col-lg-4">
                    <label for="numero">Telefone</label>
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <input type="hidden" name="contatos" id="contatos" value="1">
                  <input type="hidden" name="edit" id="edit"value="<?php $list['id'] ?>">
                  <input type="hidden" name="id" id="id" value="1">
                  <td scope="col-lg-4">
                    <input type="text" name="nome" id="nome" value="">
                  </td>
                  <td scope="col-lg-4">
                    <input type="text" name="email" id="email" value="">
                  </td>
                  <td scope="col-lg-4">
                    <input type="text" name="numero" id="numero" value="">
                  </td>
                </tr>
              </tbody>

            </table>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" form="001">Salvar mudanças</button>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal2 -->
<div class="modal fade" id="lista" tabindex="-1" role="dialog" aria-labelledby="listaTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="listaTitle">Sua lista de contatos</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col-lg-3">#id</th>
                <th scope="col-lg-3">Nome</th>
                <th scope="col-lg-3">E-mail</th>
                <th scope="col-lg-3">Telefone</th>
              </tr>
            </thead>
            <tbody>
              <?php
                while($linhas = $select->fetch_assoc()){

              ?>
              <tr>
                  <td><?=$linhas['id'] ?></td>
                  <td><?=$linhas['nome'] ?></td>
                  <td><?=$linhas['email'] ?></td>
                  <td><?=$linhas['numero'] ?></td>
              </tr>
              <?php }?>
            </tbody>  
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
    <!-- Modal3 -->
<div class="modal fade" id="editar" tabindex="-1" role="dialog" aria-labelledby="editarTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editarTitle">Selecione o contato a ser editado</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <table class="table table-bordered ">
              <thead>
                <tr>
                  <th scope="col-lg-3">#id</th>
                  <th scope="col-lg-3">Nome</th>
                  <th scope="col-lg-3">E-mail</th>
                  <th scope="col-lg-3">Telefone</th>
                  <th style="height:50px; width:50px;"><img class="img-fluid" src="lapis.jpg" style="height:50px; width:50px;"></th>
                </tr>
              </thead> 
              <tbody>
                <?php
                  while($linhas2 = $select2->fetch_assoc()){

                ?>
                <tr>
                    <td><?=$linhas2['id'] ?></td>
                    <td><?=$linhas2['nome'] ?></td>
                    <td><?=$linhas2['email'] ?></td>
                    <td><?=$linhas2['numero'] ?></td>
                    <th >
                     <a href="index.php?edit=1&id=<?= $linhas2['id']?>" >
                        <button class="btn text-nowrap" href="index.php?edit=1&id=<?= $linhas2['id']?>" type="button"data-bs-toggle="tooltip" data-bs-placement="right" title="editar esse contato" style="height:50px; width:50px; padding:0px 0px ;">
                          <img class="img-fluid" src="engrenagem.jpg" style="height:50px; width:50px;">
                        </button>
                      </a>  
                    </th>
                </tr>
                <?php }?>
              </tbody> 
            </table>
            <h5 class="modal-title text-center" id="editarTitle">Edite o contato selecionado nos campos abaixo</h5>
            <form action="" method="post" id="002">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col-lg-4">
                    <label for="nome">Nome</label>
                  </th>
                  <th scope="col-lg-4">
                    <label for="email">E-mail</label>
                  </th>
                  <th scope="col-lg-4">
                    <label for="numero">Telefone</label>
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td scope="col-lg-4">
                    <input type="text" name="nome" id="nome" value="<?= $list['nome'] ?>">
                  </td>
                  <td scope="col-lg-4">
                    <input type="text" name="email" id="email" value="<?= $list['email'] ?>">
                  </td>
                  <td scope="col-lg-4">
                    <input type="text" name="numero" id="numero" value="<?= $list['numero'] ?>">
                  </td>
                </tr>
              </tbody>

            </table>
          </form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" form="002">Salvar mudanças</button>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal4 -->
<div class="modal fade" id="excluir" tabindex="-1" role="dialog" aria-labelledby="excluirTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="excluirTitle">Selecione os contatos a serem excluidos</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <table class="table table-bordered ">
              <thead>
                <tr>
                  <th scope="col-lg-3">#id</th>
                  <th scope="col-lg-3">Nome</th>
                  <th scope="col-lg-3">E-mail</th>
                  <th scope="col-lg-3">Telefone</th>
                  <th style="height:50px; width:50px;"><img class="img-fluid" src="lixeira.jpg" style="height:50px; width:50px;"></th>
                </tr>
              </thead> 
              <tbody>
                <?php
                  while($linhas3 = $select3->fetch_assoc()){

                ?>
                <tr>
                    <td><?=$linhas3['id'] ?></td>
                    <td><?=$linhas3['nome'] ?></td>
                    <td><?=$linhas3['email'] ?></td>
                    <td><?=$linhas3['numero'] ?></td>
                    <th >
                      <button class="btn text-nowrap" type="button"data-bs-toggle="tooltip" data-bs-placement="right" title="excluir esse contato" style="height:50px; width:50px; padding:0px 0px ;">
                        <img class="img-fluid" src="deletar.jpg" style="height:50px; width:50px;">
                      </button>
                    </th>
                </tr>
                <?php }?>
              </tbody> 
            </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Salvar mudanças</button>
        </div>
      </div>
    </div>
  </div>
    
    
    
    
    
    
    
    
    
    
    
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>
</html>
