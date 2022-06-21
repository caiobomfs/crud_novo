<?php 
  require './config.php';

  $post = filter_input_array(INPUT_POST, FILTER_DEFAULT);
  $get = filter_input_array(INPUT_GET, FILTER_DEFAULT);
  
  
  
  if(isset($post['contatos']) && $post['contatos'] == 1){

      if(!empty($post['nome'])){

          $nome = $post['nome'];
          $email = $post['email'];
          $numero = $post['numero'];
          $sql = "INSERT INTO `contatos` (`id`, `nome`, `email`, `numero`) VALUES (NULL, '$nome', '$email', '$numero');";
          
          $db->query($sql);
      }

  }


 


  if(isset($get['edit']) && $get['edit'] == 1){
      $id = $get['id'];
      $select_edit = $db->query("SELECT * FROM contatos WHERE id = '$id'");
      $list = $select_edit->fetch_assoc();

  }

  if(isset($post['edit']) && $post['edit'] == 1) {

      $id = $post['id'];
      $nome = $post['nome'];
      $email = $post['email'];
      $numero = $post['numero'];


      $sql_update = " UPDATE contatos SET nome = '$nome', email = '$email', numero = '$numero' WHERE id = '$id' ";

      $db->query($sql_update);

  }


  if(isset($get['dell']) && $get['dell'] == 1){
      $id = $get['id'];

      $sql_dell = "DELETE FROM contatos WHERE  id = '$id'";

      $db->query($sql_dell);
  }

   $select = $db->query("SELECT * FROM contatos");
  
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
<title>Agenda</title>
</head>
<body class="bg-info">
    <header>
        <h1 class="d-flex justify-content-center mb-5 text-white">Bem vindo a agenda Telefonica</h1>
    </header>

        <div id="ed">
          <form action="" method="post" id="001">
            
                
                <?php if(isset($get['edit']) && $get['edit'] == 1){ ?>
                  <div id="ed">
                  <input type="hidden" name="edit" id="edit" value="1">
                  <input type="hidden" name="id" id="id" value="<?php $list['id'] ?>">
                  
                    <input type="text" name="nome" id="nome" value="<?php $list['nome'] ?>">
                  
                 
                    <input type="text" name="email" id="email" value="<?php  $list['email'] ?>">
                  
                 
                    <input type="text" name="numero" id="numero" value="<?php $list['numero'] ?>">
                  
                
                    <input type="submit" value="gravar edições " id="editSave"> 
                
                  </div>
                  <?php }else {?>

                  <input type="hidden" name="contatos" id="contatos" value="1">

                  <?php }?>
                  <div id="criador" style="display: block;" >
                    <label for="nome">Nome</label><br>
                    <input type="text" name="nome" id="nome" value="">
                    <br>
                    <label for="email">email</label><br>
                    <input type="text" name="email" id="email" value="">
                    <br>
                    <label for="numero">numero</label><br>
                    <input type="text" name="numero" id="numero" value="">
                    <br>
                    <br>
                
                <input type="submit" value="gravar " id="createSave"> 
                <br>
                <br>
                </div>
          </form>
        </div>
        
          <script>
          const btn = document.getElementById('editSave');

            btn.addEventListener('click', function handleClick(event) {
              //  if you are submitting a form (prevents page reload)
              event.preventDefault(); 
              const inputs = document.querySelectorAll('#nome, #email, #numero');

              inputs.forEach(input => {
                input.value = '';
              });

              });
              </script>
        
      
  </div>
        <section>
        <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col-lg-2">#id</th>
                <th scope="col-lg-2">Nome</th>
                <th scope="col-lg-2">E-mail</th>
                <th scope="col-lg-2">Telenumero</th>
                <th style="height:50px; width:50px;"><img class="img-fluid" src="lapis.jpg" style="height:50px; width:50px;"></th>
                  <th style="height:50px; width:50px;"><img class="img-fluid" src="lixeira.jpg" style="height:50px; width:50px;"></th>
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
                  
             
              <th>
                     <a id="anc1" href="index.php?edit=1&id=<?= $linhas['id']?>" >
                        <button class="btn text-nowrap" href="index.php?edit=1&id=<?= $linhas['id']?>" type="button"data-bs-toggle="tooltip" data-bs-placement="right" title="editar esse contato" style="height:50px; width:50px; padding:0px 0px ;">
                          <img class="img-fluid" src="engrenagem.jpg" style="height:50px; width:50px;">
                        </button>
                      </a>  
                    </th>
                    <th >
                     <a id="anc2" href="index.php?dell=1&id=<?= $linhas['id']?>" >
                        <button class="btn text-nowrap" href="index.php?edit=1&id=<?= $linhas['id']?>" type="button"data-bs-toggle="tooltip" data-bs-placement="right" title="excluir esse contato" style="height:50px; width:50px; padding:0px 0px ;">
                          <img class="img-fluid" src="deletar.jpg" style="height:50px; width:50px;">
                        </button>
                      </a>  
                    </th>
                    </tr>
              <?php }?>
            </tbody>  
          </table>
        </section>
        <!-- menu-->
    <section class="container d-flex justify-content-center mt-5">
        <div class="col-6 align-self-center">
            <div class=" d-flex row   justify-content-center mt-5">
                <button type="button" class="col-lg-2  " id="cc">Criar contatos</button>
            </div>
        </div>
    </section>

    <script>
        const targetDiv = document.getElementById("ed");
        const btn = document.getElementById("anc1");
        btn.onclick = function () {
            targetDiv.style.display = "block";
        };
        const btnoff = document.getElementById("editSave");
        btnoff.onclick = function(){
            targetDiv.style.display = "none";
            event.preventDefault();
        }
        
        const revelador = document.getElementById("criador");
        const btn2 = document.getElementById("cc");
        btn2.onclick = function () {
            revelador.style.display = "block";
        };
        const btnoff2 = document.getElementById("createSave");
        btnoff2.onclick = function(){
            revelador.style.display = "none";
            event.preventDefault();
        }
        
        </script>
    
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>
</html>
