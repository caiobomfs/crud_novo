<?php 
/**
 * Main
 * Pagina principal do site
 * php version  8.1.4
 * 
 * @category Text/html
 * @package  Apache
 * @author   Caio Bomfim <caiobomfimfc@gmail.com>
 * @license  https://github.com/caiobomfs/testecrud 
 * @link     https://github.com/caiobomfs/testecrud 
 */
require 'processos.php';
  
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
  <link rel="shortcut icon" href="#">
  <link rel="stylesheet" href="./CSS/main.css">

  <title>Agenda</title>
</head>
<body class="bg-info">
  <header>
    <h1 class="d-flex justify-content-center mb-5 text-white">
      Bem vindo a agenda Telefonica</h1>
  </header>

        
      
  
<section class="  rounded mx-3   ">
  <table class="table table-bordered table-responsive border-dark bg-light">
    <thead>
      <tr class="bg">
        <th scope="col-lg-2" class="col-lg-1">#id</th>
        <th scope="col-lg-2" class="col-lg-1">Categoria</th>
        <th scope="col-lg-2" class="col-lg-4">Nome</th>
        <th scope="col-lg-2" class="col-lg-4">E-mail</th>
        <th scope="col-lg-2" class="col-lg-2">Telefone</th>
        <th scope="col-lg-1" class="col-lg-1 header_imagem"  >
        <img class="img-fluid img_botao" src="./images/lapis.jpg"></th>
        <th scope="col-lg-1" class="col-lg-1 header_imagem" >
        <img class="img-fluid img_botao" src="./images/lixo.jpg"></th>
      </tr>
    </thead>
    <tbody>
      <?php
        while ($linhas = $select->fetch_assoc()) {

            ?>
          <tr class="fonte">
              <td ><?php echo$linhas['id'] ?></td>
              <td ><?php echo$linhas['categoriaID']?></td>
              <td ><?php echo$linhas['nome'] ?></td>
              <td ><?php echo$linhas['email'] ?></td>
              <td ><?php echo$linhas['numero'] ?></td>
          
              <td >
                <a id="anc1" 
                  href="cadas_edit.php?edit=1&id=<?php echo $linhas['id']?>" >

                  <button class="btn text-nowrap img_botao padder" 
                  href="cadas_edit.php?edit=1&id=<?php echo $linhas['id']?>" 
                  type="button"data-bs-toggle="tooltip" 
                  data-bs-placement="right" title="editar esse contato" >
                    <img class="img-fluid img_botao" src="./images/cog.jpg">
                  </button>
                </a>  
              </td>
              <td >
                <button class="btn text-nowrap img_botao padder" 
                  type="button" data-toggle="modal" 
                  data-target="#modalAviso" data-bs-toggle="tooltip" 
                  data-bs-placement="right" title="excluir esse contato" >
                  <img class="img-fluid img_botao" src="./images/del.jpg">
                </button>
              </td>
            </tr>
            <div class="modal fade" id="modalAviso" tabindex="-1" 
                role="dialog" aria-labelledby="modalAvisoLabel" 
                aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" 
                role="document">

                <div class="modal-content">
                  <div class="modal-header ">
                    <h5 class="modal-title" id="modalAvisoLabel">Aviso</h5>
                    <button type="button" class="close" data-dismiss="modal" 
                      aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body d-flex justify-content-center">
                    <p class="font_modal">
                      Tem certeza que deseja excluir esse contato?
                    </p>
                  </div>
                  <div class="modal-footer d-flex justify-content-center">
                    <button type="button" class="btn btn-secondary btn-lg" 
                    data-dismiss="modal">Não</button>

                    <a id="anc2" 
                      href="index.php?dell=1&id=<?php echo $linhas['id']?>" >
                      <button class="btn btn-primary btn-lg" 
                      type="button" >Sim</button>
                    </a> 
                  </div>
                </div>
              </div>
            </div>
        <?php }?>
    </tbody>  
    </table>
</section>
      
       

        <!-- menu-->
    <section class="container d-flex justify-content-center mt-5">
        <div class="col-6 align-self-center">
            <div class=" d-flex row   justify-content-center mt-5">
              <a  class="col-lg-2 "
                  href="cadas_edit.php">
                  <button type="button" class="btn btn-light menu_font"  
                  id="cc" >Criar Contatos </button>
              </a>
            </div>
        </div>
    </section>
      <br>
      <br>

   
c3bd6104ec
ha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
