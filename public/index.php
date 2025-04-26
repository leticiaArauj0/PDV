<?php
    include "config.php";

    $sql = "SELECT * FROM vendidos ORDER BY id DESC";
    $result = $conn->query($sql);

    $sql_2 = "SELECT SUM(valor) AS valor_total FROM vendidos";
    $result_2 = $conn->query($sql_2);
    $valor_total = $result_2->fetch(PDO::FETCH_ASSOC);

    $sql_3 = "SELECT COUNT(*) AS vendas_total FROM vendidos";
    $result_3 = $conn->query($sql_3);
    $vendas_total = $result_3->fetch(PDO::FETCH_ASSOC);

    if (!$result) {
        die("Erro na consulta: " . mysqli_error($conn));
    }
?>

<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>WildFlower - Painel de Controle</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0" />
        <link rel="stylesheet" href="css/style.css">
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
                        <a href="#"  class="active">
                            <span class="material-symbols-rounded">grid_view</span>
                            <h3>Painel de Controle</h3>
                        </a>
                        <a href="vender.php">
                            <span class="material-symbols-rounded">paid</span>
                            <h3>Vender</h3>
                        </a>
                        <a href="produtos.php">
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

            <!-- ----------------- INÍCIO Painel de Controle ----------------- -->
            <main>
                <h1>Painel de Controle</h1>

                <div class="date">
                    <input type="date">
                </div>
                
                <!-- --------------------- INÍCIO ESTATÍSTICAS ------------------- -->
                <div class="insights">
                    <div class="produtos">
                        <span class="material-symbols-rounded">paid</span>
                        <div class="middle">
                            <div class="left">
                                 <h3>Quantidade de Vendas</h3>
                                 <h1><?= $vendas_total['vendas_total'] ?></h1>
                            </div>
                            <div class="progress">
                                <svg>
                                    <circle cx="38" cy="38" r="36"></circle>
                                </svg>
                                <div class="number">
                                    <p>20%</p>
                                </div>
                            </div>
                        </div>
                        <small class="text-muted">Últimas 24 horas</small>
                    </div>

                    <div class="sales">
                        <span class="material-symbols-rounded">analytics</span>
                        <div class="middle">
                            <div class="left">
                                 <h3>Valor Total</h3>
                                 <h1><?= $valor_total['valor_total'] ?></h1>
                            </div>
                            <div class="progress">
                                <svg>
                                    <circle cx="38" cy="38" r="36"></circle>
                                </svg>
                                <div class="number">
                                    <p>81%</p>
                                </div>
                            </div>
                        </div>
                        <small class="text-muted">Últimas 24 horas</small>
                    </div>
                </div>
                <!-- --------------------- FIM ESTATÍSTICAS ------------------- -->

                <!-- --------------------- INÍCIO ÚLTIMAS VENDAS ------------------ -->
                <div class="recent-orders">
                    <table style="margin-bottom: 2rem;">
                        <thead>
                            <tr>
                                <th>Código</th>
                                <th>Nome</th>                              
                                <th>Valor Total</th>
                                <th>Qtd. Vendida</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)): ?>
                                <tr>
                                    <td><?php echo $row['codigo']; ?></td>
                                    <td><?php echo $row['nome']; ?></td>
                                    <td><?php echo "R$ " . $row['valor']; ?></td>
                                    <td><?php echo $row['qtd_venda']; ?></td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                    <!-- ----------------- FIM ÚLTIMAS VENDAS ---------------- -->
                </div>
            </main>
            <!-- ----------------- FIM Painel de Controle ----------------- -->

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
