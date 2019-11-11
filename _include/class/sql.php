<?php

/**
 * Created by PhpStorm.
 * User: Administrador
 * Date: 16/08/2016
 * Time: 11:27
 **/
//echo "<pre>";

class ConectarBD{
    private $conexao;

    function __construct(){
        $conecta = new mysqli('localhost', 'root', '', 'portaldemhab');
        if ($conecta->connect_error) {
            die("Conexão falhou: " . $this->conexao->connect_error);
        } else {
            $this->conexao = $conecta;
        }
    }

    public function getConexao(){
        return $this->conexao;
    }

    public function select($consulta){
        $sql = $this->conexao->query($consulta);

        if ($sql->num_rows) {
            while ($row = $sql->fetch_assoc()) {
                $rows[] = array_map("utf8_encode", $row);
            }
            return $rows;
            $this->desconetar();
        } else {
            return FALSE;
            $this->desconetar();
        }
    } // Fecha função select

    public function delete($consulta){
        $this->conexao->query($consulta);

        if ($this->conexao->affected_rows == 1) {
            return TRUE;
            $this->desconetar();
        } else {
            return FALSE;
            $this->desconetar();
        }
    } // Fecha função delete

    public function insert($consulta){
        $this->conexao->query($consulta);

        if ($this->conexao->affected_rows == 1) {
            return TRUE;
            $this->desconetar();
        } else {
            return FALSE;
            $this->desconetar();
        }
    } // Fecha função insert

    public function update($consulta){
        $this->conexao->query($consulta);

        if ($this->conexao->affected_rows == 1) {
            return TRUE;
            $this->desconetar();
        } else {
            return FALSE;
            $this->desconetar();
        }
    } // Fecha função update

    private function desconetar(){
        $this->conexao->close();
    }
}

/******* Como selecionar *******
if($aux = $c1->select("Select * from usuario")){
foreach ($aux as $coluna){
echo $coluna["nome_usuario"];
}
}else{
echo "Nenhum registro";
}
/******* Como deletar *******
if($c1->delete("DELETE FROM usuario WHERE nome_usuario = 'Izadora'")){
echo "Excluido com sucesso";
}else{
echo "Não foi possivel excluir";
}
/******* Como incluir *******
if($c1->insert("insert into usuario values('Izadora', '3')")){
echo "Incluido com sucesso";
}else{
echo "Não foi possivel incluir";
}
/******* Como alterar *******
if($c1->update("UPDATE usuario SET nome_usuario = 'Zezinho' where senha_usuario = 2")){
echo "Alterado com sucesso";
}else{
echo "Não foi possivel alterado";
}
 */
