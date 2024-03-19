<?php

    require "php/conexao_bd.php";
    require "php/src/Dispositivo.php";


// CADASTRA DISPOSITIVO...
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $dispositivo = NEW Dispositivo($mysql);
        $dispositivo->cadastraDispositivo(
            $_POST['marca'], $_POST['modelo'], $_POST['imei'],
            $_POST['linha'], $_POST['operadora'], $_POST['uf'],
            $_POST['servico'], $_POST['perfil'], $_POST['cdc'],
            $_POST['unidade'], $_POST['nome_usuario'], $_POST['mat_usuario'],
            $_POST['email_usuario'], $_POST['nome_gestor'], $_POST['nome_ponto_focal'], $_POST['data_cadastro']
        );

        header('Location: cadastrar.php');
        die();
    }
//_________________________________________________

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Cadastro de dispositivo</title>
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
                    <h3>DISPOSITIVOS / CADASTRAR</h3>
                    <div>
                        <i class="fa-solid fa-house-laptop"></i>
                        <i class="fa-solid fa-mobile-screen-button"></i>
                    </div>
                </header>
                    <section class="conteudo-center">
                        <h3>Cadastrar um dispositivo</h3>

                        <form class="" action="cadastrar.php" method="post">
                            <i class="fa-solid fa-circle-plus"></i>
                            <label><p>Marca<span style="color: #ff0000"> *</span></p>
                                <input type="text" name="marca" id="marca" placeholder="Insira a marca" required>
                            </label>
                            <label><p>Modelo<span style="color: #ff0000"> *</span></p>
                                <input type="text" name="modelo" id="modelo" placeholder="Insira o modelo" required>
                            </label>
                            <label><p>IMEI</p>
                                <input type="number" name="imei" id="imei" placeholder="Insira o IMEI" required>
                            </label>
                            <label><p>Linha</p>
                                <input type="text" name="linha" id="linha" placeholder="Insira a linha" required>
                            </label>
                            <label><p>Operadora</p>
                                <input type="text" name="operadora" id="operadora" placeholder="Insira a operadora" required>
                            </label>
                            <label><p>Estado UF<span style="color: #ff0000"> *</span></p>
                                <input type="text" name="uf" id="uf" placeholder="Insira a UF" required>
                            </label>
                            <label><p>Serviço</p>
                                <input type="text" name="servico" id="servico" placeholder="Insira o serviço" required>
                            </label>
                            <label><p>Perfil</p>
                                <input type="text" name="perfil" id="perfil" placeholder="Insira o perfil" required>
                            </label>
                            <label><p>Centro de Custo<span style="color: #ff0000"> *</span></p>
                                <input type="number" name="cdc" id="cdc" placeholder="Insira o CDC" required>
                            </label>
                            <label><p>Unidade<span color="red"> *</span></p>
                                <select name="unidade" id="unidade">
                                    <option value="" selected>Selecione</option>
                                    <option>AGHNKJU</option>
                                    <option>AGICORJ</option>
                                    <option>AGMWMJU</option>
                                    <option>AGNIVJU</option>
                                    <option>AGSHIJU</option>
                                    <option>AGZARAJU</option>
                                    <option>CDAMASBC</option>
                                    <option>CDAMBEX</option>
                                    <option>CDAMBSL</option>
                                    <option>CDARCEX</option>
                                    <option>CDBR</option>
                                    <option>CDD</option>
                                    <option>CDDIAEX</option>
                                    <option>CDDNBR</option>
                                    <option>CDDNPA</option>
                                    <option>CDESLSE</option>
                                    <option>CDHEIEX</option>
                                    <option>CDJJNOD</option>
                                    <option>CDNIVEX</option>
                                    <option>CDDOCEX</option>
                                    <option>CDPRIEX 2.0</option>
                                    <option>CDPUIGES</option>
                                    <option>CDYPEEX</option>
                                    <option>CDWELEX</option>
                                    <option>FBAMBCG</option>
                                    <option>FBAMBJU</option>
                                    <option>FBAMBLATABSL</option>
                                    <option>FBAMBSL</option>
                                    <option>FBDLNPC</option>
                                    <option>FBDNPC</option>
                                    <option>FBMERSP</option>
                                    <option>FBUNISP</option>
                                    <option>MATRIZ</option>
                                    <option>PTFBR</option>
                                    <option>PTFD</option>
                                 </select>
                            </label>
                            <label><p>Nome Usuário</p>
                                <input type="text" name="nome_usuario" id="nome_usuario" placeholder="Insira o usuário" required>
                            </label>
                            <label><p>Mat Usuário</p>
                                <input type="text" name="mat_usuario" id="mat_usuario" placeholder="Insira a matrícula do usuário" required>
                            </label>
                            <label><p>E-mail Usuário</p>
                                <input type="text" name="email_usuario" id="email_usuario" placeholder="Insira o e-mail do usuário" required>
                            </label>
                            <label><p>Nome gestor<span style="color: #ff0000"> *</span></p>
                                <input type="text" name="nome_gestor" id="nome_gestor" placeholder="Insira o gestor" required>
                            </label>
                            <label><p>Nome Ponto Focal<span style="color: #ff0000"> *</span></p>
                                <input type="text" name="nome_ponto_focal" id="nome_ponto_focal" placeholder="Insira o ponto focal" required>
                            </label>
                            <input type="text" name="data_cadastro" id="data_cadastro" hidden>
                            <div>
                                <button type="reset" id="resetar">Resetar</button>
                                <button type="submit" id="cadastrar">Cadastrar</button>
                            </div>
                        </form>
                        
                    </section>

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