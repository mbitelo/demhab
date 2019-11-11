<?php
$sql = new ConectarBD();

if($aux = $sql->select("SELECT `idServ`, `nomeServ` FROM `demhab_servidor` WHERE statusServ = true ORDER BY `nomeServ` ASC")){
    foreach ($aux as $coluna) {
        echo "\n";
        echo "<option value=\"" . $coluna["idServ"] ."\">". $coluna["nomeServ"] . "</option>";
    }
}