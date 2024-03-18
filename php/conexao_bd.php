<?php 

// CONEXÃO COM O BANCO DE DADOS...
    $mysql = new mysqli("localhost", "root", "root", "telefonia_db");
    $mysql->set_charset("utf8");
//____________________________________________________________________________________________________

// VALIDAÇÃO SE A CONEXÇAO COM O BANCO DE DADOS FOI BEM SUCEDIDA OU NÃO...
    if($mysql == false) {
        echo  "Conexão mal sucedida!" ;
    }
//_____________________________________