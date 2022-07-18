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

        $categoriaID = $post['categoriaID'];
        $nome = $post['nome'];
        $email = $post['email'];
        $numero = $post['numero'];
        $sql = "INSERT INTO `contatos` (`id`, `categoriaID`, `nome`, `email`, `numero`) 
        VALUES (NULL,  '$categoriaID', '$nome', '$email', '$numero');";
        
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
      $categoriaID = $post['categoriaID'];
      $nome = $post['nome'];
      $email = $post['email'];
      $numero = $post['numero'];


      $sql_update = " UPDATE contatos SET categoriaID = '$categoriaID', nome = '$nome', email = '$email', 
      numero = '$numero' WHERE id = '$id' ";

      $db->query($sql_update);

}


if (isset($get['dell']) && $get['dell'] == 1) {

      $id = $get['id'];

      $sql_dell = "DELETE FROM contatos WHERE  id = '$id'";

      $db->query($sql_dell); 
}

   $select = $db->query("SELECT * FROM contatos");
  
?>