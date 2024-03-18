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
        $resultadoDaConsulta = $this->mysql->query("SELECT marca, modelo, imei, cdc, nome_usuario, linha, nome_ponto_focal FROM tb_dispositivos LIMIT 10");
        $dispositivo = $resultadoDaConsulta->fetch_all(MYSQLI_ASSOC);
        return $dispositivo;
    }
//_________________________________________________
}