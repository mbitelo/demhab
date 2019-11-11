<?php
    $title = "Alterar Ponto";
    $tabela = "demhab_requerimento";
    include_once "../_include/header.php";
?>
    <style>
        object {
            margin-top: -20px;
            width: 100%;
            height: 700px;/*calc(900px - 208px);*/
        }
    </style>
    <body>

        <!-- Static navbar -->
        <?php include "../_include/navbar.php"; ?>



        <div class="container">
<?php if(isset($_POST["qtd"])){
    $acao = utf8_decode("Gerou uma alteração de ponto");
    $log = new log(@$acao);
    echo "<object data=\"../Imprimir/?id={$funcoes->salvarFormulario($_POST["requerimento"],$_POST)}\" type=\"application/pdf\">alt : <a href=\"teste.php\">example_046.pdf</a></object>";
}else{ ?>
            <!-- Main component for a primary marketing message or call to action -->

            <div class="jumbotron">
                <h2>Intranet - Alterar Registro Ponto</h2>
                <p>Sistema interno do Departamento Municipal de Habitação de Gravataí para automatização de serviços.</p>
            </div>

            

            <div>
                <form method="post" action="">
                <table class="table table-bordered" border="1">
                    <tr><td colspan="7">Alteração de registro ponto</td></tr>
                    <tr>
                        <td colspan="6"><select name="servidor" class="form-control input-sm" required>
                                <option value="">INFORME SEU NOME</option><?php include_once "../_include/rotinas/alterar_ponto.php"; ?>
                            </select></td>
                        <td><select name="mes" class="form-control input-sm" required>
                                <option value="">SELECIONE UM MÊS</option>
                                <option value="Janeiro">Janeiro</option>
                                <option value="Fevereiro">Fevereiro</option>
                                <option value="Março">Março</option>
                                <option value="Abril">Abril</option>
                                <option value="Maio">Maio</option>
                                <option value="Junho">Junho</option>
                                <option value="Julho">Julho</option>
                                <option value="Agosto">Agosto</option>
                                <option value="Setembro">Setembro</option>
                                <option value="Outubro">Outubro</option>
                                <option value="Novembro">Novembro</option>
                                <option value="Dezembro">Dezembro</option>
                            </select>
                        </td>
                    </tr>
                    <tr class="textocentro"><td></td><td>Dia</td><td>Entrada</td><td>Saída</td><td>Entrada</td><td>Saída</td><td style="width:40%">Motivo</td></tr>
                    <?php
                    $dias = Array("25","26","27","28","29","30","31","1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24");
                    foreach ($dias as $aux){  ?>
                        <tr>
                            <td><input type="checkbox" onClick="habilitaText(this,'dia<?php echo $aux;?>');" /></td>
                            <td><?php echo $aux;?></td>
                            <td><input type="text" class="dia<?php echo $aux;?> form-control input-sm hora" name="qtd[<?php echo $aux;?>][]" disabled="disabled"/></td>
                            <td><input type="text" class="dia<?php echo $aux;?> form-control input-sm hora" name="qtd[<?php echo $aux;?>][]" disabled="disabled"/></td>
                            <td><input type="text" class="dia<?php echo $aux;?> form-control input-sm hora" name="qtd[<?php echo $aux;?>][]" disabled="disabled"/></td>
                            <td><input type="text" class="dia<?php echo $aux;?> form-control input-sm hora" name="qtd[<?php echo $aux;?>][]" disabled="disabled"/></td>
                            <td><input type="text" class="dia<?php echo $aux;?> form-control input-sm" name="qtd[<?php echo $aux;?>][]" disabled="disabled"/></td>
                        </tr>
                    <?php } ?>
                </table>
                    <button class="btn btn-primary" type="submit" name="requerimento" value="altera_ponto">Gerar</button>
                    <br><br><br>
                </form>

            </div>
        </div> <!-- /container -->


        <script  type="text/javascript">
            function habilitaText(obj,id) {
                if(obj.checked == true){
                    $('.'+id).attr({
                        disabled : false
                    });
                }else{
                    $('.'+id).attr({
                        disabled : true
                    }).val("");
                }
            }
            $(document).ready(function() {
                $('.hora').timepicker( {
                    showAnim: 'blind'
                } );
            });
        </script>
<?php
    include_once "../_include/modal.php";
    include_once "../_include/footer.php";
?>


            <link rel="stylesheet" href="include/ui-1.10.0/ui-lightness/jquery-ui-1.10.0.custom.min.css" type="text/css" />
            <link rel="stylesheet" href="jquery.ui.timepicker.css?v=0.3.3" type="text/css" />

            <script type="text/javascript" src="include/jquery-1.9.0.min.js"></script>
            <script type="text/javascript" src="include/ui-1.10.0/jquery.ui.core.min.js"></script>
            <script type="text/javascript" src="include/ui-1.10.0/jquery.ui.widget.min.js"></script>
            <script type="text/javascript" src="include/ui-1.10.0/jquery.ui.tabs.min.js"></script>
            <script type="text/javascript" src="include/ui-1.10.0/jquery.ui.position.min.js"></script>

            <script type="text/javascript" src="jquery.ui.timepicker.js?v=0.3.3"></script>
            <script type="text/javascript" src="jquery.ui.timepicker-pt-BR.js?v=0.3.3"></script>

            <style type="text/css">
                /* some styling for the page */
                .ui-widget-content {
                    font-size: 10px; /* for the widget natural size */
                }
            </style>
    <?php } ?>