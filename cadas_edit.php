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

  <title>cadastro e edição</title>
</head>
<body class="bg-info">
<div class="d-flex justify-content-center">
                
                <?php if (isset($get['edit']) && $get['edit'] == 1) { ?>
                  
                  <form action="index.php" method="post" id="form1">
                  <div id="ed" >
                    <input type="hidden" name="edit" id="edit" value="1">
                    <input type="hidden" name="id" id="idE" 
                    value="<?php echo $list['id'] ?>">
                    
                    <label for="categoriaID">categoria</label><br>
                    <?php
                    while ($linhas = $select->fetch_assoc()) {

                        ?>
                    <select name="categoriaID" id="categoriaID" form="form2">
                        <option value="<?php echo$linhas['categoriaID']?>">
                        <?php echo$linhas['categoriaID']?></option>
                    </select>
                    <?php } ?>
                    <br>
                    <label for="nome">Nome</label><br>
                    <input type="text" name="nome" id="nomeE" 
                    value="<?php echo $list['nome'] ?>">

                    <br>
                    <label for="email">email</label><br>
                    <input type="text" name="email" id="emailE" 
                    value="<?php echo  $list['email'] ?>">

                    <br>
                    <label for="numero">Telefone</label><br>
                    <input type="text" name="numero" id="numeroE" 
                    value="<?php echo $list['numero'] ?>">
                    
                    <br>
                    <br>
                    <input type="submit" value="gravar edições" 
                    id="editSave" form="form1"> 
                
                  </div>
            </form>  
                <?php } else {?>

                  
            <form action="index.php" method="post" id="form2">
            <input type="hidden" name="contatos" id="contatos" value="1">
                  <div id="criador" >
                    <label for="categoriaID">categoria</label><br>
                    <?php
                    while ($linhas = $select->fetch_assoc()) {

                        ?>
                    <select name="categoriaID" id="categoriaID" form="form2">
                        <option value="<?php echo$linhas['categoriaID']?>">
                        <?php echo$linhas['categoriaID']?></option>
                    </select>
                    <?php } ?>
                    <br>
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
        <!-- <script>
        const revelador = document.getElementById("criador");
        const btn2 = document.getElementById("cc");
        btn2.onclick = function () {
            revelador.style.display = "block";
        };
        const btnoff2 = document.getElementById("createSave");

        btnoff2.onclick = function(){
          
            revelador.style.display = "none";
            
            }

            
        
        </script> -->
    
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
