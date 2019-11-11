<?php
    $title = "Reservar veículo";
    $tabela = "demhab_reservaveiculo";
    include_once "../_include/header.php";
    $host = gethostbyaddr($_SERVER['REMOTE_ADDR']);
    if($host == "DEMHAB012" || $host == "DEMHAB011"|| $host == "DEMHAB024" || $host == "projeto.demhab") {
        $pcvalido = true;
    }
?>

    <body>

    <!-- Static navbar -->
<?php include "../_include/navbar.php"; ?>


        <div class="container">

            <!-- Main component for a primary marketing message or call to action -->

            <p align="right">Hoje é dia <?php echo $data->diaHojePTBR();?><br>Motorista da semana é o <?php echo $funcoes->motoristaDoDia() ?></p>
            <div class="jumbotron">
                <h2>Intranet - Reserve carro</h2>
                <p>Sistema interno do Departamento Municipal de Habitação de Gravataí para automatização de serviços.</p>
            </div>
            <div class="btn-group">
                <a class="btn btn-primary teste" data-toggle="modal" data-target="#modalNovaReserva">Nova Reserva</a>
            </div><br><br>
<?php if(isset($_POST["reservar"])){ ?>
            <div>
<?php $acao = "Fez uma nova reserva";?>
<?php if($sql->insert("INSERT INTO `locacao_reserva` (`dia`, `hora`, `destino`, `horaRetorno`, `statusRes`, `idServ`, `idCarro`) VALUES ('{$data->dataDeHojeMYSQL($_POST['data'])}', '{$_POST['hora']}', '". utf8_decode($_POST['destino']) ."', '{$_POST['horaretorno']}', true, {$_POST['servidor']}, {$data->semanaHoje()})")){ ?>
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    Reserva efetuada com sucesso
                </div>
<?php } else { ?>
                <br><div class="alert alert-danger" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    Não foi possível efetuar a reserva.
                </div>
<?php } ?>
            </div>
<?php } ?>

<?php if(isset($_POST["alterar"])){ ?>
            <div>
<?php $acao = "Alterou a reserva {$_POST['id']}";?>
<?php if($sql->insert("UPDATE `locacao_reserva` SET `dia`='{$data->dataDeHojeMYSQL($_POST['data'])}' ,`hora`='{$_POST['hora']}',`destino`='". utf8_decode($_POST['destino']) ."',`horaRetorno`='{$_POST['horaretorno']}', `idServ`='{$_POST['servidor']}' WHERE `idReserva` = '{$_POST['id']}'")){ ?>
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    Reserva alterada com sucesso
                </div>
<?php } else { ?>
                <div class="alert alert-danger" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    Não foi possível alterar a reserva.
                </div>
<?php } ?>
            </div>
<?php } ?>
<?php if(isset($_POST["excluir"])){ ?>
            <div>
<?php $acao = "Excluiu a reserva {$_POST['id']}";?>
<?php if($sql->insert("UPDATE `locacao_reserva` SET `statusRes` = false where `idReserva` = {$_POST['id']}")){ ?>
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    Reserva excluída com sucesso
                </div>
<?php } else { ?>
                <div class="alert alert-danger" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    Não foi possível excluir a reserva.
                </div>
<?php } ?>
            </div><?php } ?>
            <br>
            <div>
<?php
    $variavelData = $data->dataDeHoje(@$_GET['data']);
    if(@$aux = $sql->select("SELECT * FROM locacao_reserva AS lr INNER JOIN demhab_servidor ds ON lr.idServ = ds.idServ WHERE dia = '{$data->dataDeHojeMYSQL(@$_GET['data'])}' AND statusRes = true ORDER BY hora")){
?>              <table class="table table-bordered" border="1">
                    <thead>
                        <tr>
                            <th>Hora</th>
                            <th>Usuário</th>
                            <th>Destino</th>
                            <th>Hora do retorno</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
<?php
    foreach ($aux as $coluna) {
        echo "<tr>\n";
        echo "<td>" . date("H:i", $data->timestamp($coluna["hora"])) . "</td>\n";
        echo "<td>" . $coluna["nomeServ"] . "</td>\n";
        echo "<td>" . $coluna["destino"] . "</td>\n";
        echo "<td>";
        echo ($coluna["horaRetorno"] == "00:00:00") ? "" : date("H:i", $data->timestamp($coluna["horaRetorno"]));
        echo "</td>\n";
        echo "<td><a class='btn btn-warning btn-xs' href='registro.php?alterar={$coluna["idReserva"]}' data-toggle='modal' data-target='#myModal'>Alterar</a> "; if(@$pcvalido) echo "<a class='btn btn-danger btn-xs' href='registro.php?excluir={$coluna["idReserva"]}' data-toggle='modal' data-target='#myModal'>Excluir</a>"; echo "</td>\n";
        echo "</tr>\n";
    }
?>
                </table>
<?php } else { ?>
                    <div class="alert alert-warning" role="alert">
                        Não foi encontrado nenhuma reserva no dia <?php echo $variavelData; ?>.
                    </div>
<?php } ?>
                <a class="btn btn-default" href="?data=<?php echo $data->alterarDia($variavelData,-3); ?>" role="button"><?php echo $data->alterarDia($variavelData,-3); ?></a>
                <a class="btn btn-default" href="?data=<?php echo $data->alterarDia($variavelData,-2); ?>" role="button"><?php echo $data->alterarDia($variavelData,-2); ?></a>
                <a class="btn btn-default" href="?data=<?php echo $data->alterarDia($variavelData,-1); ?>" role="button"><?php echo $data->alterarDia($variavelData,-1); ?></a>

                <a class="btn btn-primary" role="button"><?php echo $variavelData ?></a>

                <a class="btn btn-default" href="?data=<?php echo $data->alterarDia($variavelData,1); ?>" role="button"><?php echo $data->alterarDia($variavelData,1); ?></a>
                <a class="btn btn-default" href="?data=<?php echo $data->alterarDia($variavelData,2); ?>" role="button"><?php echo $data->alterarDia($variavelData,2); ?></a>
                <a class="btn btn-default" href="?data=<?php echo $data->alterarDia($variavelData,3); ?>" role="button"><?php echo $data->alterarDia($variavelData,3); ?></a>

                <a class="btn btn-info" href="?data=<?php echo $data->diaHojePTBR(); ?>" role="button">Ir para data de hoje</a>

                <script type="text/javascript">
                    $("[data-target=#myModal]").click(function(ev) {
                        ev.preventDefault();
                        // load the url and show modal on success
                        $( $(this).attr('data-target') + " .modal-content").load($(this).attr("href"), function() {
                            $($(this).attr('data-target')).modal("show");
                        });
                    });
                </script>
            </div>
        </div> <!-- /container -->
<?php
    include_once "../_include/modal.php";
    include_once "../_include/footer.php";
?>