<?php

class Dispositivo
{
    private $mysql;

    public function __construct(mysqli $mysql)
    {
        $this->mysql = $mysql;
    }

// EXIBE OS 10 ÚLTIMOS DISPOSITIVOS CADASTR5ADOS...
    public function getUltimosCadastrados(): array
    {
        $resultadoDaConsulta = $this->mysql->query("SELECT *, DATE_FORMAT(data_cadastro, '%d/%m/%Y') AS data_cadastro FROM tb_dispositivos LIMIT 10");
        $dispositivo = $resultadoDaConsulta->fetch_all(MYSQLI_ASSOC);
        return $dispositivo;
    }
//_________________________________________________


// CADASTRA DISPOSITIVO...
    public function cadastraDispositivo(
        $marca, $modelo, $imei, $linha, $operadora, 
        $uf, $servico, $perfil, $cdc, $unidade, 
        $nome_usuario, $mat_usuario, $email_usuario,
        $nome_gestor, $nome_ponto_focal
    )
    {
        $addDispositivo = $this->mysql->prepare(
            "INSERT INTO tb_dispositivos (marca, modelo, imei, linha, operadora, uf, servico, perfil, cdc, unidade, nome_usuario, mat_usuario, email_usuario, nome_gestor, nome_ponto_focal, data_cadastro) 
            VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,NOW())"
        );
        $addDispositivo->bind_param('sssssssssssssss',$marca, $modelo, $imei, $linha, $operadora, $uf, $servico, $perfil, $cdc, $unidade, $nome_usuario, $mat_usuario, $email_usuario, $nome_gestor, $nome_ponto_focal);
        $addDispositivo->execute();
    }
//_________________________________________________


// EXCLUI DISPOSITIVO...

    public function excluiDispositivo(string $id): void  // FUNÇÃO CHAMADA NO ARQUIVO editar_dispositivo.php
    {
        $excluiDispositivo = $this->mysql->prepare("DELETE FROM tb_dispositivos WHERE id = ?");
        $excluiDispositivo->bind_param('s', $id);
        $excluiDispositivo->execute();
    }
//_________________________________________________
}