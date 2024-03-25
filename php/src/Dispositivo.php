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
        string $marca, string $modelo, string $imei, string $linha, string $operadora, 
        string $uf, string $servico, string $perfil, string $cdc, string $unidade, 
        string $nome_usuario, string $mat_usuario, string $email_usuario,
        string $nome_gestor, string $nome_ponto_focal
    ): void
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


// BUSCAR ID PARA EDIÇÃO DE UM DISPOSITIVO...

    public function buscaId(string $id): array
    {
        $selecionaDispositivo = $this->mysql->prepare("SELECT id, marca, modelo, imei, linha, operadora, uf, servico, perfil, cdc, unidade, nome_usuario, mat_usuario, email_usuario, nome_gestor, nome_ponto_focal FROM tb_dispositivos WHERE id = ?");
        $selecionaDispositivo->bind_param('s', $id);
        $selecionaDispositivo->execute();
        $dispositivo = $selecionaDispositivo->get_result()->fetch_assoc();
        return $dispositivo;
    }
//_________________________________________________


// EDITA DISPOSITIVO
    public function editaDispositivo(
        string $id, string $marca, string $modelo, string $imei, string $linha, string $operadora, 
        string $uf, string $servico, string $perfil, string $cdc, string $unidade, 
        string $nome_usuario, string $mat_usuario, string $email_usuario,
        string $nome_gestor, string $nome_ponto_focal
    ): void
    {
        $editaDispositivo = $this->mysql->prepare(
        "UPDATE tb_dispositivos
         SET marca = ?, modelo = ?, imei = ?, linha = ?, operadora = ?, uf = ?, servico = ?, perfil = ?, cdc = ?, unidade = ?, nome_usuario = ?, mat_usuario = ?, email_usuario = ?, nome_gestor = ?, nome_ponto_focal = ?
         WHERE id = ?");
        $editaDispositivo->bind_param('ssssssssssssssss',$marca, $modelo, $imei, $linha, $operadora, $uf, $servico, $perfil, $cdc, $unidade, $nome_usuario, $mat_usuario, $email_usuario, $nome_gestor, $nome_ponto_focal, $id);
        $editaDispositivo->execute();
    }
}
//________________________________________________