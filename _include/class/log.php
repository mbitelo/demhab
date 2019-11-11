<?php

/**
 * Created by PhpStorm.
 * User: Administrador
 * Date: 01/11/2016
 * Time: 12:00
 */
class log{
    private $sql;
    private $acao;

    public function __construct($acao = null){
        $this->sql = new ConectarBD();
        $this->acao = $acao;
        $this->salvarlog();
    }

    public function salvarlog(){
        $registro = Array("computador" => gethostbyaddr($_SERVER['REMOTE_ADDR']),
            "ip" => $_SERVER['REMOTE_ADDR'],
            "datahora" => date("Y-m-d H:i:s"),
            "pagina" => $_SERVER['REQUEST_URI'],
            "acao" => $this->acao,
        );
        $this->sql->insert("INSERT INTO `portal_log` (`computador`, `ip`, `datahora`, `pagina`, `acao`) VALUES ('{$registro["computador"]}','{$registro["ip"]}','{$registro["datahora"]}','{$registro["pagina"]}','{$registro["acao"]}')");
    }

}