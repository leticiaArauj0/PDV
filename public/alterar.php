<?php 

    include "conexao.php";

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $id = $_POST['id'];
        $codigo = $_POST['codigo'];
        $nome = $_POST['nome'];
        $valor = $_POST['valor'];
        $quantidade = $_POST['quantidade'];

        $sql = "UPDATE produtos SET nome='$nome', valor=$valor, quantidade=$quantidade, codigo=$codigo WHERE id=$id";

        $result = mysqli_query($conn, $sql);

        if($result){
            header('Location: produtos.php');
            exit();

        } else {
            echo "Erro ao atualizar dados do produto";
            die(mysqli_error($conn));
        }

    } elseif (isset($_GET['id'])){

        $id = $_GET['id'];
        $sql = "SELECT * FROM produtos WHERE id = $id";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        
    }

?>

<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>WildFlower - Alterar Produto</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0" />
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/formulario.css">
    </head>

    <body>
        <div class="container">
            <!-- ----------------- INÍCIO SIDEBAR ----------------- -->
            <aside>
                <div>
                    <div class="top">
                        <div class="logo">
                            <img src="img/flower__1_-removebg-preview.png" alt="logo">
                            <h2>WildFlower</h2>
                        </div>
                        <div class="close" id="close-btn">
                            <span class="material-symbols-rounded">
                                close
                            </span>
                        </div>
                    </div>
                    
                    <div class="sidebar">
                        <a href="index.php">
                            <span class="material-symbols-rounded">grid_view</span>
                            <h3>Painel de Controle</h3>
                        </a>
                        <a href="vender.php">
                            <span class="material-symbols-rounded">paid</span>
                            <h3>Vender</h3>
                        </a>
                        <a href="produtos.php" class="active">
                            <span class="material-symbols-rounded">package_2</span>
                            <h3>Produtos</h3>
                        </a>
                        <a href="adicionar-produto.php">
                            <span class="material-symbols-rounded">add_shopping_cart</span>
                            <h3>Adicionar Produto</h3>
                        </a>
                        <a href="#">
                            <span class="material-symbols-rounded">logout</span>
                            <h3>Logout</h3>
                        </a>
                </div>
            </aside>
            <!-- ----------------- FIM SIDEBAR ----------------- -->

            <!-- ----------------- INÍCIO ALTERAR PRODUTO ----------------- -->
            <main>
                <?php if($row): ?>
                    <h1>Alterar Produto</h1>

                    <div class="container-formulario">
                        <form action="" method="POST" class="formulario">

                            <input type="hidden" name="id" value="<?php echo $row['id'] ?>">

                            <div class="campo">
                                <label for="codigo">Código:</label><br>
                                <input id="codigo" type="text" name="codigo" value="<?php echo $row['codigo']?>" minlength="5" maxlength="5" onkeypress="return somenteNumeros(event)" required>
                            </div>

                            <div class="campo">
                                <label for="nome">Nome:</label><br>
                                <input id="nome" type="text" name="nome" value="<?php echo $row['nome']?>" maxlength="40" required>
                                <br>
                            </div>

                            <div class="campo">
                                <label for="valor">Valor R$:</label><br>
                                <input type="number" step="0.01" name="valor" value="<?php echo $row['valor']?>" min="0.01" required>
                                <br>
                            </div>

                            <div class="campo">
                                <label for="quantidade">Quantidade</label><br>
                                <input type="number" name="quantidade" value="<?php echo $row['quantidade']?>" maxlength="10" required> <br>
                            </div>

                            <div class="container-btn">
                                <input class="btn btn-submit" type="submit" value="Alterar">
                                <a class="btn btn-cancelar" href="produtos.php">Cancelar</a>
                            </div>

                        </form>
                    </div>
                <?php else: ?>
                    <p>Erro ao atualizar o livro</p>
                <?php endif; ?>
            </main>
            <!-- ----------------- FIM ALTERAR PRODUTO ----------------- -->

            <!-- ----------------- INÍCIO TOP ----------------- -->
            <div class="right">
                <div class="top">
                    <button id="menu-btn">
                        <span class="material-symbols-rounded">menu</span>
                    </button>
                    <div class="profile">
                        <div class="info">
                            <p>Olá, <b>Zendaya</b></p>
                            <small class="text-muted">Administradora</small>
                        </div>
                        <div class="profile-photo">
                            <img src="https://s2-quem.glbimg.com/RH9wUO8RcyTrQ2-xPW3J30nvUes=/0x0:884x884/fit-in/884x888/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_b0f0e84207c948ab8b8777be5a6a4395/internal_photos/bs/2022/8/2/r2nTdEQVqKJhm1T0cWxw/2020-02-05-zendaya.jpeg" alt="profile-photo">
                        </div>
                    </div>
                </div>
            <!-- ----------------- FIM TOP ----------------- -->
            </div>
        </div>
    </body>
    <script src="js/script.js"></script>
    <script src="js/navbar.js"></script>
</html>

