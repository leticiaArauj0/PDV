<?php
    include "conexao.php";

    $sql = "SELECT * FROM produtos";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        die("Erro na consulta: " . mysqli_error($conn));
    }
?>

<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>WildFlower - Produtos</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0" />
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/produtos.css">
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
                        <a href="#" class="active">
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

            <!-- ----------------- INÍCIO PRODUTOS ----------------- -->
            <main>
                <h1>Produtos</h1>

                <div class="recent-orders">
                    <table>
                        <thead>
                            <tr>
                                <th>Código</th>
                                <th>Nome</th>                              
                                <th>Valor</th>
                                <th>Quantidade</th>
                                <th>Adicionar</th>
                                <th>Alterar</th>
                                <th>Excluir</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                            <tr>                     
                                <td><?php echo $row['codigo']; ?></td>
                                <td><?php echo $row['nome']; ?></td>
                                <td><?php echo "R$ "; echo $row['valor']; ?></td>
                                <td><?php echo $row['quantidade']; ?></td>
                                <td>
                                    <a href="adicionar-quantidade.php?id=<?php echo $row['id']; ?>">
                                        <button class="btn-produto btn-add">
                                            <span class="material-symbols-rounded">add</span>
                                        </button>
                                    </a>
                                </td>
                                <td>
                                    <a href="alterar.php?id=<?php echo $row['id']; ?>">
                                        <button class="btn-produto btn-edit">
                                            <span class="material-symbols-rounded">edit</span>
                                        </button>
                                    </a>
                                </td>
                                <td>
                                    <a href="excluir.php?id=<?php echo $row['id']; ?>">
                                        <button class="btn-produto btn-delete">
                                            <span class="material-symbols-rounded">delete</span>
                                        </button>
                                    </a>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>                           
                    </table>
            </main>
            <!-- ----------------- FIM PRODUTOS ----------------- -->

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
        <script src="js/navbar.js"></script>
    </body>
</html>
