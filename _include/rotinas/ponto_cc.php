<?php
$sql = new ConectarBD();

if($aux = $sql->select("SELECT `nomeServ`, CONCAT(`nomeServ`,' ',`sobrenomeServ`) as `nomeCompleto`, `txtJur`, `cargo` FROM `demhab_servidor`  WHERE idReg= 3 and statusServ = true ORDER BY `nomeServ` ASC")){
    foreach ($aux as $coluna) {
        echo "\n";
        echo "<option value=\"". $coluna["nomeCompleto"] . "*" . $coluna["txtJur"] . "*" . $coluna["cargo"] . "\">". $coluna["nomeServ"] . "</option>";
    }
}