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
  require './config/config.php';
  $post = filter_input_array(INPUT_POST, FILTER_DEFAULT);
  $get = filter_input_array(INPUT_GET, FILTER_DEFAULT);
  
 
  
if (isset($post['contatos']) && $post['contatos'] == 1) {
    if (!empty($post['nome']) ) {

        $nome = $post['nome'];
        $email = $post['email'];
        $numero = $post['numero'];
        $sql = "INSERT INTO `contatos` (`id`, `nome`, `email`, `numero`) VALUES (NULL, '$nome', '$email', '$numero');";
        
        $db->query($sql);
    }

}


 


if (isset($get['edit']) && $get['edit'] == 1) {
  
      $id = $get['id'];
      $select_edit = $db->query("SELECT * FROM contatos WHERE id = '$id'");
      $list = $select_edit->fetch_assoc();

}

if (isset($post['edit']) && $post['edit'] == 1) {

      $id = $post['id'];
      $nome = $post['nome'];
      $email = $post['email'];
      $numero = $post['numero'];


      $sql_update = " UPDATE contatos SET nome = '$nome', email = '$email', numero = '$numero' WHERE id = '$id' ";

      $db->query($sql_update);

}


if (isset($get['dell']) && $get['dell'] == 1) {

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
  <link rel="stylesheet" href="./CSS/main.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.slim.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

  <title>Agenda</title>
</head>
<body class="bg-info">
  <header>
    <h1 class="d-flex justify-content-center mb-5 text-white">
      Bem vindo a agenda Telefonica</h1>
  </header>

        
      
  
<section class="  rounded mx-3   ">
  <table class="table table-bordered   table-responsive border-dark bg-light">
    <thead>
      <tr class="bg">
        <th scope="col-lg-2" class="col-lg-1">#id</th>
        <th scope="col-lg-2" class="col-lg-4">Nome</th>
        <th scope="col-lg-2" class="col-lg-4">E-mail</th>
        <th scope="col-lg-2" class="col-lg-2">Telefone</th>
        <th class="col-lg-1 header_imagem"  >
        <img class="img-fluid img_botao" src="./images/lapis.jpg"></th>
        <th class="col-lg-1 header_imagem" >
        <img class="img-fluid img_botao" src="./images/lixo.jpg"></th>
      </tr>
    </thead>
    <tbody>
      <?php
        while ($linhas = $select->fetch_assoc()) {

            ?>
          <tr class="fonte">
              <td ><?php echo$linhas['id'] ?></td>
              <td ><?php echo$linhas['nome'] ?></td>
              <td ><?php echo$linhas['email'] ?></td>
              <td ><?php echo$linhas['numero'] ?></td>
          
              <td>
                <a id="anc1" 
                  href="index.php?edit=1&id=<?php echo $linhas['id']?>" >

                  <button class="btn text-nowrap img_botao padder" 
                  href="index.php?edit=1&id=<?php echo $linhas['id']?>" 
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
                <button type="button" class="col-lg-2 btn btn-light" style="font-size: 18px ; font-weight: 500; " id="cc" >Criar contatos</button>
            </div>
        </div>
    </section>
      <br>
      <br>

    <div class="d-flex justify-content-center">
                
                <?php if (isset($get['edit']) && $get['edit'] == 1) { ?>
                  
                  <form action="index.php" method="post" id="form1">
                  <div id="ed" >
                    <input type="hidden" name="edit" id="edit" value="1">
                    <input type="hidden" name="id" id="idE" value="<?php echo $list['id'] ?>">
                    <label for="nome">Nome</label><br>
                    <input type="text" name="nome" id="nomeE" value="<?php echo $list['nome'] ?>">
                    <br>
                    <label for="email">email</label><br>
                    <input type="text" name="email" id="emailE" value="<?php echo  $list['email'] ?>">
                    <br>
                    <label for="numero">Telefone</label><br>
                    <input type="text" name="numero" id="numeroE" value="<?php echo $list['numero'] ?>">
                    <br>
                    <br>
                    <input type="submit" value="gravar edições " id="editSave" form="form1"> 
                
                  </div>
            </form>  
                <?php } else {?>

                  
            <form action="index.php" method="post" id="form2">
            <input type="hidden" name="contatos" id="contatos" value="1">
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
                <?php }?>
        </div>
        
        
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
    
    <script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
