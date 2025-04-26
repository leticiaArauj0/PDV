<?php 

    if(isset($_GET['id'])){
        include "conexao.php";

        $id = $_GET['id'];
        $sql = "DELETE FROM produtos WHERE id = $id";
        $result = mysqli_query($conn, $sql);

        if($result){
            header("Location: produtos.php");
            exit();
        } else {
            echo "Erro ao excluir o livro";
        }
    }

?>
