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

        $idCategoria = $post['id_categoria'];
        $nome = $post['nome'];
        $email = $post['email'];
        $telefone = $post['telefone'];
        $sql = "INSERT INTO `contatos` (`id`, `id_categoria`, `nome`, `email`, `telefone`) 
        VALUES (NULL,  '$idCategoria', '$nome', '$email', '$telefone');";
        
        $db->query($sql);
    }

}


 


if (isset($get['edit']) && $get['edit'] == 1) {

      $id = $get['id'];
      $query = "SELECT * FROM contatos WHERE id = '$id'";
      $select_edit = $db->query($query);
      $list = $select_edit->fetch_assoc();
}

if (isset($post['edit']) && $post['edit'] == 1) {

      $id = $post['id'];
      $idCategoria = $post['id_categoria'];
      $nome = $post['nome'];
      $email = $post['email'];
      $telefone = $post['telefone'];
      

      $sql_update = " UPDATE contatos SET id_categoria = '$idCategoria', nome = '$nome', email = '$email', 
      telefone = '$telefone' WHERE id = '$id' ";

      $db->query($sql_update);

}


if (isset($get['dell']) && $get['dell'] == 1) {

      $id = $get['id'];

      $sql_dell = "DELETE FROM contatos WHERE  id = '$id'";

      $db->query($sql_dell); 
}

     //query old
     // $query = "SELECT * FROM contatos";

     $query = "SELECT co.id, id_categoria, categoria, nome, email, telefone
     FROM contatos co INNER JOIN categorias ca ON 
     co.id_categoria = ca.id;";

   $select = $db->query($query);


  

  
?>