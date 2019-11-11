<?php
$title = "Formulários";
include_once "../_include/header.php";
?>
<?php
$meses['m'] = array("jan","fev","mar","abr","mai","jun","jul","ago","set","out","nov","dez");
$meses['M'] = array("janeiro","fevereiro","março","abril","maio","junho","julho","agosto","setembro","outubro","novembro","dezembro");

// Transforma em datetime
$mes['a'] = new Datetime();
$mes['p'] = new Datetime();
$mes['p']->modify("1 month");
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
        <?php if(isset($_POST["requerimento"])){
            $acao = "Gerou um novo requerimento de {$_POST["requerimento"]}";
            $log = new log(@$acao);
            echo "<object data=\"../Imprimir/?id={$funcoes->salvarFormulario($_POST["requerimento"],$_POST)}\" type=\"application/pdf\">alt : <a href=\"teste.php\">example_046.pdf</a></object>";
        }else{ ?>
        <!-- Main component for a primary marketing message or call to action -->

        <div class="jumbotron">
            <h2>Intranet - Formulários</h2>
            <p>Sistema interno do Departamento Municipal de Habitação de Gravataí para automatização de serviços.</p>
        </div>

        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true"> <!-- painel collapse -->
            <div class="panel panel-default"> <!-- painel requerimento folga -->
                <div class="panel-heading" role="tab" id="headingOne">
                    <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#folga" aria-expanded="false" aria-controls="ferias">
                            Requerimento de folga
                        </a>
                    </h4>
                </div>
                <div id="folga" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body">
                        <form method="post" class="form-horizontal">
                            <div class="form-group">
                                <label for="nome" class="col-sm-2 control-label">Nome: </label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" id="nome" name="nome">
                                </div>
                                <label for="matricula" class="col-sm-1 control-label">Matrícula: </label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" id="matricula" name="matricula">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="qtddias" class="col-sm-2 control-label">Quantidade de dia(s): </label>
                                <div class="col-sm-1">
                                    <input type="text" class="form-control" id="qtddias" name="qtddias">
                                </div>

                                <label for="datas" class="col-sm-3 control-label">Data(s): </label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="datas" name="datas">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-1 col-sm-10">
                                    <button type="submit" class="btn btn-primary" name="requerimento" value="folga">Gerar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div> <!-- /requerimento de folga -->
            <div class="panel panel-default"> <!-- painel requerimento ferias -->
                <div class="panel-heading" role="tab" id="headingTwo">
                    <h4 class="panel-title">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#ferias" aria-expanded="false" aria-controls="collapseTwo">
                            Requerimento de férias
                        </a>
                    </h4>
                </div>
                <div id="ferias" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                    <div class="panel-body">
                        <form method="post" class="form-horizontal">
                            <div class="form-group">
                                <label for="nome" class="col-sm-2 control-label">Nome: </label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" id="nome" name="nome">
                                </div>
                                <label for="matricula" class="col-sm-1 control-label">Matrícula: </label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" id="matricula" name="matricula">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="iniciogozo" class="col-sm-2 control-label">Início férias: </label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" id="iniciogozo" name="iniciogozo">
                                </div>

                                <label for="fimgozo" class="col-sm-2 control-label">Fim férias: </label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" id="fimgozo" name="fimgozo">
                                </div>

                                <label for="qtddias" class="col-sm-2 control-label">Quantidade de dias: </label>
                                <div class="col-sm-1">
                                    <input type="text" class="form-control" id="qtddias" name="qtddias">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inicioaquisitivo" class="col-sm-2 control-label">Início aquisitivo: </label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" id="inicioaquisitivo" name="inicioaquisitivo">
                                </div>

                                <label for="fimaquisitivo" class="col-sm-2 control-label">Fim aquisitivo: </label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" id="fimaquisitivo" name="fimaquisitivo">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-2">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="cbum"> Receber apenas 1/3
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-offset-2 col-sm-2">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="cbdois"> Primeiro ou único período aquisitivo
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-offset-2 col-sm-2">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="cbtres"> Saldo de férias
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-1 col-sm-10">
                                    <button type="submit" class="btn btn-primary" name="requerimento" value="ferias">Gerar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div> <!-- /requerimento de ferias -->
            <div class="panel panel-default"> <!-- painel requerimento mudança de horario -->
                <div class="panel-heading" role="tab" id="headingThree">
                    <h4 class="panel-title">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Requerimento de mudança de horário
                        </a>
                    </h4>
                </div>
                <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                    <div class="panel-body">
                        Requerimento indisponível no momento.
                    </div>
                </div>
            </div> <!-- /requerimento de mudança de horario -->
            <div class="panel panel-default"> <!-- folha ponto Cargo em Coamissão -->
                <div class="panel-heading" role="tab" id="headingThree">
                    <h4 class="panel-title">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#ponto_cc" aria-expanded="false" aria-controls="collapseThree">
                            Folha ponto Cargo em Comissão
                        </a>
                    </h4>
                </div>
                <div id="ponto_cc" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                    <div class="panel-body">
                        <form method="post" class="form-horizontal">
                            <div class="form-group">
                                <label for="servidor" class="col-sm-2 control-label">Servidor: </label>
                                <div class="col-sm-3">
                                    <select name="servidor" id="servidor" class="form-control"><?php include_once "../_include/rotinas/ponto_cc.php"; ?>
                                    </select>
                                </div>
                                <label for="mes" class="col-sm-2 control-label">Competência: </label>
                                <div class="col-sm-2">
                                    <select name="mes" id="mes" class="form-control">
                                        <option value="<?php echo $mes['a']->format('Y-m'); ?>"><?php echo $meses['m'][$mes['a']->format('m')-1].$mes['a']->format('/Y') ?></option>
                                        <option value="<?php echo $mes['p']->format('Y-m'); ?>"><?php echo $meses['m'][$mes['p']->format('m')-1].$mes['p']->format('/Y') ?></option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exce" class="col-sm-2 control-label">Exceções: </label>
                                <div class="col-sm-3">
                                    <?php
                                    for($x=01;$x<=31;$x++){
                                        echo '<label class="checkbox-inline" '. (($x == 1) ? ' style="margin-left: 10px"' : '') .'><input type="checkbox" name="exce[]" value="'.$x.'"> '.sprintf("%02s", $x).'</label>';
                                        echo "\n";
                                    }
                                    ?>

                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-1 col-sm-10">
                                    <button type="submit" class="btn btn-primary" name="requerimento" value="ponto_cc">Gerar</button>
                                </div>
                            </div>
                        </form>

                        <form method="post" class="form-horizontal">

                        </form>
                    </div>
                </div>
            </div> <!-- /folha ponto Cargo em Coamissão -->
        </div>


    </div> <!-- /container -->


<?php
include_once "../_include/modal.php";
include_once "../_include/footer.php";
?>

<?php } ?>