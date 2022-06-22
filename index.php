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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.slim.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

<title>Agenda</title>
</head>
<body class="bg-info">
    <header>
        <h1 class="d-flex justify-content-center mb-5 text-white">Bem vindo a agenda Telefonica</h1>
    </header>

        
      
  
        <section>
        <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col-lg-2" class="col-lg-2">#id</th>
                <th scope="col-lg-2" class="col-lg-3">Nome</th>
                <th scope="col-lg-2" class="col-lg-3">E-mail</th>
                <th scope="col-lg-2" class="col-lg-3">Telefone</th>
                <th class="col-lg-1"  style="height:50px; width:50px;"  style="width: 12.499999995%;flex: 0 0 12.499%;max-width: 12.499%;">
                <img class="img-fluid" src="lapis.jpg" style="height:50px; width:50px;"></th>
                <th class="col-lg-1" style="height:50px; width:50px;"  style="width: 12.499999995%;flex: 0 0 12.499%;max-width: 12.499%;">
                <img class="img-fluid" src="lixeira.jpg" style="height:50px; width:50px;"></th>
              </tr>
            </thead>
            <tbody>
              <?php
                while($linhas = $select->fetch_assoc()){

              ?>
              <tr>
                  <td ><?=$linhas['id'] ?></td>
                  <td ><?=$linhas['nome'] ?></td>
                  <td ><?=$linhas['email'] ?></td>
                  <td ><?=$linhas['numero'] ?></td>
                  
             
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
      <br>
      <br>

    <div class="d-flex justify-content-center">
          <form action="" method="post" id="form1">
            
                
                <?php if(isset($get['edit']) && $get['edit'] == 1){ ?>
                  <div id="ed">
                    <input type="hidden" name="edit" id="edit" value="1">
                    <input type="hidden" name="id" id="id" value="<?php $list['id'] ?>">
                    <label for="nome">Nome</label><br>
                    <input type="text" name="nome" id="nomeE" value="<?php $list['nome'] ?>">
                    <br>
                    <label for="email">email</label><br>
                    <input type="text" name="email" id="emailE" value="<?php  $list['email'] ?>">
                    <br>
                    <label for="numero">Telefone</label><br>
                    <input type="text" name="numero" id="numeroE" value="<?php $list['numero'] ?>">
                    <br>
                    <br>
                    <input type="submit" value="gravar edições " id="editSave" form="form1"> 
                
                  </div>
            </form>  
                  <?php }else {?>

                  <input type="hidden" name="contatos" id="contatos" value="1">

                  <?php }?>
            <form action="" method="post" id="form2">
                  <div id="criador" style="display: none;" >
                    <label for="nome">Nome</label><br>
                    <input type="text" name="nome" id="nome" value="">
                    <br>
                    <label for="email">email</label><br>
                    <input type="text" name="email" id="email" value="">
                    <br>
                    <label for="numero">Telefone</label><br>
                    <input type="text" name="numero" id="numero" value="">
                    <br>
                    <br>
                
                <input type="submit" value="gravar " id="createSave" form="form2"> 
                <br>
                <br>
                </div>
          </form>
        </div>
        
          <script>
          const btn = document.getElementById('createSave');

            btn.addEventListener('click', function handleClick(event) {
              //  if you are submitting a form (prevents page reload)
              event.preventDefault(); 
              const inputs = document.querySelectorAll('#nome, #email, #numero');

              inputs.forEach(input => {
                input.value = '';
              });

              });
              </script>
        
    <script>
        const targetDiv = document.getElementById("ed");
        const btnA = document.getElementById("anc1");
        const btnoff = document.getElementById("editSave");
        if (btnA !== undefined && btnA !== null) {
        btnA.onclick = function () {
            targetDiv.style.display = "block";
        }};
        
        if (btnoff !== undefined && btnoff !== null) {
        btnoff.onclick = function(){
            targetDiv.style.display = "none";
            
            document.getElementById("form1").submit();
            
            window.location.href = "http://localhost:3000/index.php"
        } }
        </script>
        <script>
        const revelador = document.getElementById("criador");
        const btn2 = document.getElementById("cc");
        btn2.onclick = function () {
            revelador.style.display = "block";
        };
        const btnoff2 = document.getElementById("createSave");

        btnoff2.onclick = function(){
          
            revelador.style.display = "none";
            
            }

            
        
        </script>
    
    
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
