<?php
$sql = new ConectarBD();

if($aux = $sql->select("SELECT `nomeServ`, CONCAT(`nomeServ`,' ',`sobrenomeServ`) as `nomeCompleto` FROM `demhab_servidor`  WHERE (idReg = 1 or idReg = 2) and statusServ = true ORDER BY `nomeServ` ASC ")){
    foreach ($aux as $coluna) {
        echo "\n";
        echo "<option value=\"" . $coluna["nomeCompleto"] . "\">". $coluna["nomeServ"] . "</option>";
    }
}