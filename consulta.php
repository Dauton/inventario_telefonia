<?php

    require "php/conexao_bd.php";
    require "php/src/Dispositivo.php";

    $dispositivo = new Dispositivo($mysql);
    $dispositivos = $dispositivo->getUltimosCadastrados();

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Consulta de dispositivo</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <meta name="desciption" content="Invenário de telefonia corporativa">
    <meta name="author" content="Dauton Pereira Félix - 2024">
    <link rel='stylesheet' type='text/css' media='screen' href='css/style.css'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playpen+Sans:wght@500&family=Ubuntu:wght@300&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/d8ed80570b.js" crossorigin="anonymous"></script>

</head>
<body>
    <main class="corpo">
        <div id="back-menu"></div>
        <nav class="menu">
            <div class="menu-user-info">
                <span>
                    <i class="fa-solid fa-circle-user"></i>
                    <h3>Bem-vindo(a)!</h3>
                    <p>Dauton Félix</p>
                <span>
                <button type="button" id="btn-sair">Sair</button>
            </div>

            <div class="menu-divisoria">
                <div></div><div></div><div></div>
            </div>
            <ul>
                <li><a href="index.php"><i class="fa-solid fa-house"></i>Início<i class="fa-solid fa-angle-right"></i></a></li>
                
                <li id="menu_02"><a><i class="fa-solid fa-mobile-screen"></i>Dispositivos<i class="fa-solid fa-angle-down"></i></a>
                    <ul id="menusub_02">
                        <li><a href="cadastrar.php"><i class="fa-solid fa-arrow-pointer"></i>Cadastrar<i class="fa-solid fa-angle-right"></i></a></li>
                        <li><a href="consulta.php"><i class="fa-solid fa-arrow-pointer"></i>Consultar<i class="fa-solid fa-angle-right"></i></a></li>
                    </ul>
                </li>
                
                <li id="menu_03"><a><i class="fa-solid fa-gear"></i>Admin<i class="fa-solid fa-angle-down"></i></a>
                    <ul id="menusub_03">
                        <li><a href="novo_usuario.php"><i class="fa-solid fa-arrow-pointer"></i>Cadastrar usuário<i class="fa-solid fa-angle-right"></i></a></li>
                        <li><a href="gerenciar_usuarios.php"><i class="fa-solid fa-arrow-pointer"></i>Gerenciar usuários<i class="fa-solid fa-angle-right"></i></a></li>
                    </ul>
                </li>
            </ul>

            <img src="img/id-logo-branco-extenso.png" class="menu-logo-id">
        </nav>
        <section class="principal">
            <header class="cabecalho">
                <div>
                    <a href="#"><div id="cabecalho-my-cdc">
                        <i class="fa-solid fa-house-laptop"></i>
                        <span>
                            <p>Exibir dispositivos do</p>
                            <h3>Meu Centro de Custo</h3>
                        </span>
                    </div></a>
                    <a href="#"><div id="cabecalho-my-device">
                        <i class="fa-solid fa-mobile-screen-button"></i>
                        <span>
                            <p>Exibir o</p>
                            <h3>Meu Dispositivo</h3>
                        </span>
                    </div></a>
                </div>
                <img src="img/sistema-logo.png">
                <i class="fa-solid fa-bars" id="btn-menu"></i>
            </header>
            <article class="conteudo">
                <header class="conteudo-cabecalho">
                    <h3>DISPOSITIVOS / CONSULTAR</h3>
                    <div>
                        <i class="fa-solid fa-house-laptop"></i>
                        <i class="fa-solid fa-mobile-screen-button"></i>
                    </div>
                </header>
                    <section class="conteudo-center" id="conteudo-center-consulta">
                        <h3>Consulta de Dispositivos</h3>

                        <form>
                            <label><p>Campo de busca</p>
                                <input type="search" name="busca" id="busca" placeholder="Complete com alguma característica" required>
                            </label>
                            <div>
                                <button type="submit">Buscar</button>
                            </div>
                            <p>O resultado será exibido abaixo</p>
                        </form>
                        <table>
                            <thead>
                                <td>Marca</td>
                                <td>Modelo</td>
                                <td>IMEI</td>
                                <td>Linha</td>
                                <td>Operadora</td>
                                <td>Estado UF</td>
                                <td>Serviço</td>
                                <td>Perfil</td>
                                <td>Centro de Custo</td>
                                <td>Unidade</td>
                                <td>Nome Usuário</td>
                                <td>Mat Usuário</td>
                                <td>E-mail Usuário</td>
                                <td>Nome Gestor</td>
                                <td>Nome Ponto Focal</td>
                                <td>Editar</td>
                                <td>Excluir</td>
                            </thead>
                            <tbody>
                                <?php foreach($dispositivos as $dispositivo): ?>
                                <tr>
                                    <td><?= $dispositivo['marca'] ?></td>
                                    <td><?= $dispositivo['modelo'] ?></td>
                                    <td><?= $dispositivo['imei'] ?></td>
                                    <td><?= $dispositivo['linha'] ?></td>
                                    <td><?= $dispositivo['operadora'] ?></td>
                                    <td><?= $dispositivo['uf'] ?></td>
                                    <td><?= $dispositivo['servico'] ?></td>
                                    <td><?= $dispositivo['perfil'] ?></td>
                                    <td><?= $dispositivo['cdc'] ?></td>
                                    <td><?= $dispositivo['unidade'] ?></td>
                                    <td><?= $dispositivo['nome_usuario'] ?></td>
                                    <td><?= $dispositivo['mat_usuario'] ?></td>
                                    <td><?= $dispositivo['email_usuario'] ?></td>
                                    <td><?= $dispositivo['nome_gestor'] ?></td>
                                    <td><?= $dispositivo['nome_ponto_focal'] ?></td>
                                    <td><button id="btn-editar">Editar</button></td>
                                    <td>
                                        <form method="post" action="php/excluir_dispositivo.php">
                                            <input type="hidden" name="id" value="<?= $dispositivo['id'] ?>">
                                            <button id="btn-excluir">Excluir</button>
                                        </form>
                                    </td>
                                </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </section>
                    
                <button type="button" id="btn-excel" title="Extrair para Excel"><img src="img/logo-excel.png"></button>
                
                <footer class="conteudo-rodape">
                    <small>Inventário de Telefonia - ID DO BRASIL LOGISTICA LTDA - 2024</small>
                </footer>
            </article>
        </section>
    </main>

    <script src="js/jquery.js"></script>
    <script type="text/javascript" src="js/javascript.js"></script>

</body>
</html>