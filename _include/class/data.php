<?php
/**
 * Created by PhpStorm.
 * User: Administrador
 * Date: 15/09/2016
 * Time: 14:19
 */
class Data{
    private $DataTime;


    public function __construct(){
        $this->DataTime = new DateTime();
    }
    /* FUNÇÃO SEM UTILIZAÇÃO
    private function instanciarDataTime(){
        $this->DataTime = new DateTime();
    }
    */
/* FUNÇÃO SEM UTILIZAÇÃO
    function timestampBARRA($data){
        $aux = explode("/", $data);
        return date('Y-m-d', @mktime(0, 0, 0, $aux[1], $aux[0], $aux[2]));
    }
*/
    function timestamp($data_mysql){
        return strtotime($data_mysql);
    }
/*
    function hojeMySql(){
        return date('Y-m-d');
    }
*/
    //--------------------------//

    public function diaHojePTBR(){
        return $this->DataTime->format('d/m/Y');
    }

    public function diaHojeMYSQL(){
        return $this->DataTime->format('Y-m-d');
    }

    public function dataDeHoje($data){
        return !(empty($data)) ? $data : $this->diaHojePTBR();
    }
    public function dataDeHojeMYSQL($data){
        $data = str_replace('/', '-', $data);
        $DataTime = new DateTime($data);
        return !(empty($data)) ? $DataTime->format("Y-m-d") : $this->diaHojeMYSQL();
    }

    public function alterarDia($dia,$qtd){
        $trocado = str_replace("/","-",$dia);
        $data = new DateTime("$trocado");
        $data->modify("$qtd days");
        return $data->format("d/m/Y");
    }

    public function MYSQLparaPTBR($data){
        $DataTime = new DateTime($data);
        return $DataTime->format("d/m/Y");
    }

    public function semanaHoje(){
        $DataTime = new DateTime();
        $semana = $DataTime->format("W");
        if($semana % 2){
            return 01;
        }else{
            return 02;
        }
    }

}