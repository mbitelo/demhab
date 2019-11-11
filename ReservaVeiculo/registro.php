<?php
include_once "../_include/class/sql.php";
include_once "../_include/class/data.php";
$sql = new ConectarBD();
$data = new Data();
?>
<?php if(!empty($_GET['excluir'])){ ?>
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Excluir reserva</h4>
    </div>
    <div class="modal-body">
        <div class="te">
            Tens certeza que deseja excluir esta reserva?
        </div>
    </div>
    <div class="modal-footer">
        <form action="" method="post">
            <input name="id" value="<?php echo @$_GET["excluir"];?>" type="hidden">
            <button type="submit" name="excluir" class="btn btn-primary">Sim</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Não, fechar</button>
        </form>
    </div>

   <?php } ?>

   <?php if(!empty($_GET['alterar'])){ ?>
       <form action="" method="post" class="form-horizontal">
       <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
           <h4 class="modal-title">Alterar reserva</h4>
       </div>
       <div class="modal-body">
           <?php $coluna = $sql->select("SELECT * FROM locacao_reserva AS lr INNER JOIN demhab_servidor ds ON lr.idServ = ds.idServ WHERE idReserva = {$_GET['alterar']}"); ?>
           <div class="form-group">
               <label class="col-sm-2 control-label" for="hora">Hora:</label>
               <div class="col-sm-4">
                   <select class="form-control" id="hora" name="hora">
                       <option value="08:30" <?php if(@$coluna[0]['hora'] == "08:30:00") echo " selected"; ?>>08:30</option>
                       <option value="08:45" <?php if(@$coluna[0]['hora'] == "08:45:00") echo " selected"; ?>>08:45</option>
                       <option value="09:00" <?php if(@$coluna[0]['hora'] == "09:00:00") echo " selected"; ?>>09:00</option>
                       <option value="09:15" <?php if(@$coluna[0]['hora'] == "09:15:00") echo " selected"; ?>>09:15</option>
                       <option value="09:30" <?php if(@$coluna[0]['hora'] == "09:30:00") echo " selected"; ?>>09:30</option>
                       <option value="09:45" <?php if(@$coluna[0]['hora'] == "09:45:00") echo " selected"; ?>>09:45</option>
                       <option value="10:00" <?php if(@$coluna[0]['hora'] == "10:00:00") echo " selected"; ?>>10:00</option>
                       <option value="10:15" <?php if(@$coluna[0]['hora'] == "10:15:00") echo " selected"; ?>>10:15</option>
                       <option value="10:30" <?php if(@$coluna[0]['hora'] == "10:30:00") echo " selected"; ?>>10:30</option>
                       <option value="10:45" <?php if(@$coluna[0]['hora'] == "10:45:00") echo " selected"; ?>>10:45</option>
                       <option value="11:00" <?php if(@$coluna[0]['hora'] == "11:00:00") echo " selected"; ?>>11:00</option>
                       <option value="11:15" <?php if(@$coluna[0]['hora'] == "11:15:00") echo " selected"; ?>>11:15</option>
                       <option value="11:30" <?php if(@$coluna[0]['hora'] == "11:30:00") echo " selected"; ?>>11:30</option>
                       <option value="11:45" <?php if(@$coluna[0]['hora'] == "11:45:00") echo " selected"; ?>>11:45</option>
                       <option value="13:00" <?php if(@$coluna[0]['hora'] == "13:00:00") echo " selected"; ?>>13:00</option>
                       <option value="13:15" <?php if(@$coluna[0]['hora'] == "13:15:00") echo " selected"; ?>>13:15</option>
                       <option value="13:30" <?php if(@$coluna[0]['hora'] == "13:30:00") echo " selected"; ?>>13:30</option>
                       <option value="13:45" <?php if(@$coluna[0]['hora'] == "13:45:00") echo " selected"; ?>>13:45</option>
                       <option value="14:00" <?php if(@$coluna[0]['hora'] == "14:00:00") echo " selected"; ?>>14:00</option>
                       <option value="14:15" <?php if(@$coluna[0]['hora'] == "14:15:00") echo " selected"; ?>>14:15</option>
                       <option value="14:30" <?php if(@$coluna[0]['hora'] == "14:30:00") echo " selected"; ?>>14:30</option>
                       <option value="14:45" <?php if(@$coluna[0]['hora'] == "14:45:00") echo " selected"; ?>>14:45</option>
                       <option value="15:00" <?php if(@$coluna[0]['hora'] == "15:00:00") echo " selected"; ?>>15:00</option>
                       <option value="15:15" <?php if(@$coluna[0]['hora'] == "15:15:00") echo " selected"; ?>>15:15</option>
                       <option value="15:30" <?php if(@$coluna[0]['hora'] == "15:30:00") echo " selected"; ?>>15:30</option>
                       <option value="15:45" <?php if(@$coluna[0]['hora'] == "15:45:00") echo " selected"; ?>>15:45</option>
                       <option value="16:00" <?php if(@$coluna[0]['hora'] == "16:00:00") echo " selected"; ?>>16:00</option>
                       <option value="16:15" <?php if(@$coluna[0]['hora'] == "16:15:00") echo " selected"; ?>>16:15</option>
                       <option value="16:30" <?php if(@$coluna[0]['hora'] == "16:30:00") echo " selected"; ?>>16:30</option>
                       <option value="16:45" <?php if(@$coluna[0]['hora'] == "16:45:00") echo " selected"; ?>>16:45</option>
                       <option value="17:00" <?php if(@$coluna[0]['hora'] == "17:00:00") echo " selected"; ?>>17:00</option>
                   </select>
               </div>
           </div>
           <div class="form-group">
               <label class="col-sm-2 control-label" for="usuario">Usuário:</label>
               <div class="col-sm-6">
                   <select class="form-control" id="usuario" name="servidor">
                       <option value="1" <?php if(@$coluna[0]['idServ'] == "1") echo " selected"; ?>>Mikhael</option>
                       <option value="2" <?php if(@$coluna[0]['idServ'] == "2") echo " selected"; ?>>Priscila</option>
                       <option value="3" <?php if(@$coluna[0]['idServ'] == "3") echo " selected"; ?>>Larte</option>
                       <option value="4" <?php if(@$coluna[0]['idServ'] == "4") echo " selected"; ?>>Andréa</option>
                       <option value="5" <?php if(@$coluna[0]['idServ'] == "5") echo " selected"; ?>>Alessandro</option>
                       <option value="6" <?php if(@$coluna[0]['idServ'] == "6") echo " selected"; ?>>Iana</option>
                       <option value="7" <?php if(@$coluna[0]['idServ'] == "7") echo " selected"; ?>>Jéssica</option>
                       <option value="8" <?php if(@$coluna[0]['idServ'] == "8") echo " selected"; ?>>Aline</option>
                       <option value="9" <?php if(@$coluna[0]['idServ'] == "9") echo " selected"; ?>>Thalia</option>
                       <option value="10" <?php if(@$coluna[0]['idServ'] == "10") echo " selected"; ?>>Luciane</option>
                       <option value="11" <?php if(@$coluna[0]['idServ'] == "11") echo " selected"; ?>>Victor</option>
                       <option value="12" <?php if(@$coluna[0]['idServ'] == "12") echo " selected"; ?>>Marina</option>
                       <option value="13" <?php if(@$coluna[0]['idServ'] == "13") echo " selected"; ?>>Renata</option>
                       <option value="14" <?php if(@$coluna[0]['idServ'] == "14") echo " selected"; ?>>Valmor</option>
                       <option value="15" <?php if(@$coluna[0]['idServ'] == "15") echo " selected"; ?>>Nilton</option>
                       <option value="16" <?php if(@$coluna[0]['idServ'] == "16") echo " selected"; ?>>Karine</option>
                       <option value="17" <?php if(@$coluna[0]['idServ'] == "17") echo " selected"; ?>>Rafael</option>
                       <option value="18" <?php if(@$coluna[0]['idServ'] == "18") echo " selected"; ?>>Laís</option>
                       <option value="19" <?php if(@$coluna[0]['idServ'] == "19") echo " selected"; ?>>Jorge</option>
                       <option value="20" <?php if(@$coluna[0]['idServ'] == "20") echo " selected"; ?>>Silvana</option>
                   </select>
               </div>
           </div>
           <div class="form-group">
               <label class="col-sm-2 control-label" for="destino">Destino:</label>
               <div class="col-sm-6">
                   <input class="form-control" type="text" id="destino" name="destino" value="<?php echo @$coluna[0]['destino'];?>" required>
               </div>
           </div>
           <div class="form-group">
               <label class="col-sm-2 control-label" for="retorno">Hora de Retorno:</label>
               <div class="col-sm-6">
                   <select class="form-control" id="retorno" name="horaretorno">
                       <option value="00:00">Sem previsão</option>
                       <option value="08:30" <?php if(@$coluna[0]['horaretorno'] == "08:30:00") echo " selected"; ?>>08:30</option>
                       <option value="08:45" <?php if(@$coluna[0]['horaretorno'] == "08:45:00") echo " selected"; ?>>08:45</option>
                       <option value="09:00" <?php if(@$coluna[0]['horaretorno'] == "09:00:00") echo " selected"; ?>>09:00</option>
                       <option value="09:15" <?php if(@$coluna[0]['horaretorno'] == "09:15:00") echo " selected"; ?>>09:15</option>
                       <option value="09:30" <?php if(@$coluna[0]['horaretorno'] == "09:30:00") echo " selected"; ?>>09:30</option>
                       <option value="09:45" <?php if(@$coluna[0]['horaretorno'] == "09:45:00") echo " selected"; ?>>09:45</option>
                       <option value="10:00" <?php if(@$coluna[0]['horaretorno'] == "10:00:00") echo " selected"; ?>>10:00</option>
                       <option value="10:15" <?php if(@$coluna[0]['horaretorno'] == "10:15:00") echo " selected"; ?>>10:15</option>
                       <option value="10:30" <?php if(@$coluna[0]['horaretorno'] == "10:30:00") echo " selected"; ?>>10:30</option>
                       <option value="10:45" <?php if(@$coluna[0]['horaretorno'] == "10:45:00") echo " selected"; ?>>10:45</option>
                       <option value="11:00" <?php if(@$coluna[0]['horaretorno'] == "11:00:00") echo " selected"; ?>>11:00</option>
                       <option value="11:15" <?php if(@$coluna[0]['horaretorno'] == "11:15:00") echo " selected"; ?>>11:15</option>
                       <option value="11:30" <?php if(@$coluna[0]['horaretorno'] == "11:30:00") echo " selected"; ?>>11:30</option>
                       <option value="11:45" <?php if(@$coluna[0]['horaretorno'] == "11:45:00") echo " selected"; ?>>11:45</option>
                       <option value="13:00" <?php if(@$coluna[0]['horaretorno'] == "13:00:00") echo " selected"; ?>>13:00</option>
                       <option value="13:15" <?php if(@$coluna[0]['horaretorno'] == "13:15:00") echo " selected"; ?>>13:15</option>
                       <option value="13:30" <?php if(@$coluna[0]['horaretorno'] == "13:30:00") echo " selected"; ?>>13:30</option>
                       <option value="13:45" <?php if(@$coluna[0]['horaretorno'] == "13:45:00") echo " selected"; ?>>13:45</option>
                       <option value="14:00" <?php if(@$coluna[0]['horaretorno'] == "14:00:00") echo " selected"; ?>>14:00</option>
                       <option value="14:15" <?php if(@$coluna[0]['horaretorno'] == "14:15:00") echo " selected"; ?>>14:15</option>
                       <option value="14:30" <?php if(@$coluna[0]['horaretorno'] == "14:30:00") echo " selected"; ?>>14:30</option>
                       <option value="14:45" <?php if(@$coluna[0]['horaretorno'] == "14:45:00") echo " selected"; ?>>14:45</option>
                       <option value="15:00" <?php if(@$coluna[0]['horaretorno'] == "15:00:00") echo " selected"; ?>>15:00</option>
                       <option value="15:15" <?php if(@$coluna[0]['horaretorno'] == "15:15:00") echo " selected"; ?>>15:15</option>
                       <option value="15:30" <?php if(@$coluna[0]['horaretorno'] == "15:30:00") echo " selected"; ?>>15:30</option>
                       <option value="15:45" <?php if(@$coluna[0]['horaretorno'] == "15:45:00") echo " selected"; ?>>15:45</option>
                       <option value="16:00" <?php if(@$coluna[0]['horaretorno'] == "16:00:00") echo " selected"; ?>>16:00</option>
                       <option value="16:15" <?php if(@$coluna[0]['horaretorno'] == "16:15:00") echo " selected"; ?>>16:15</option>
                       <option value="16:30" <?php if(@$coluna[0]['horaretorno'] == "16:30:00") echo " selected"; ?>>16:30</option>
                       <option value="16:45" <?php if(@$coluna[0]['horaretorno'] == "16:45:00") echo " selected"; ?>>16:45</option>
                       <option value="17:00" <?php if(@$coluna[0]['horaretorno'] == "17:00:00") echo " selected"; ?>>17:00</option>
                   </select>
               </div>
           </div>
           <div class="form-group">
               <label class="col-sm-2 control-label" for="destino">Data:</label>
               <div class="col-sm-4">
                   <input class="form-control" type="text" value="<?php echo $data->MYSQLparaPTBR(@$coluna[0]["dia"]);?>" id="data" name="data" maxlength="10" onkeypress="mascaraData( this, event )">
               </div>
           </div>
       </div>
       <div class="modal-footer">
               <input name="id" value="<?php echo @$_GET["alterar"];?>" type="hidden">
               <button type="submit" name="alterar" class="btn btn-primary">Salvar</button>
               <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
           </form>
       </div>

   <?php } ?>
   