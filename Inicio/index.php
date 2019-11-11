<?php
    $title = "Ínicio";
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
            <div class="jumbotron">
                <h2>Portal DEMHAB</h2>
                <p>Sistema interno do Departamento Municipal de Habitação de Gravataí para automatização de serviços.</p>
            </div>
            <div class="page-header">
                <h1>Links úteis</h1>
                <a href="https://gravatai.atende.net/#!/tipo/inicial" title="Prefeitura Municipal de Gravataí">
                    <img src="../_include/img/gravatai.png" alt="Prefeitura Municipal de Gravataí" width="130px" style="border: 1px solid black; padding: 2px"></a>

                <a href="https://www.cmgravatai.rs.gov.br/#!/tipo/inicial" title="Câmara de Vereadores de Gravataí">
                    <img src="../_include/img/cmgravatai.png" alt="Câmara de Vereadores de Gravataí" width="130px" style="border: 1px solid black; padding: 2px"></a>

                <a href="http://www.rs.gov.br/inicial" title="Estado do Rio Grande do Sul">
                    <img src="../_include/img/riograndedosul.png" alt="Estado do Rio Grande do Sul" width="130px" style="border: 1px solid black; padding: 2px"></a>

                <a href="http://www1.tce.rs.gov.br/portal/page/portal/tcers/" title="Tribunal de Contas do Estado / RS">
                    <img src="../_include/img/tce-rs.png" alt="Tribunal de Contas do Estado / RS" width="134px" style="border: 1px solid black; padding: 0px"></a>
            </div>

<?php if(isset($_POST["salvarAviso"])){ ?>
<?php $acao = "Salvou um novo aviso";?>
<?php if($sql->insert("INSERT INTO `portal_aviso`(`texto`, `dataPost`, `dataLimite`) VALUES ('" . utf8_decode($_POST["texto"]) . "',  NOW(),'{$data->dataDeHojeMYSQL($_POST["datalimite"])}')")){ ?>
                    <br><div class="alert alert-success" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        Aviso salvo com sucesso
                    </div>
<?php } else { ?>
                    <br><div class="alert alert-danger" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        Não foi possível salvar o aviso.
                    </div>
<?php } ?>
<?php } ?>

            <div class="page-header">
                <div><h1>Últimos avisos <small></small></h1></div>
<?php if(@$pcvalido) { ?>
                    <div class="botaodireito">
                        <div class="btn-group">
                            <a class="btn btn-primary teste" data-toggle="modal" data-target="#modalNovoAviso">Novo aviso</a>
                        </div>
                    </div>
<?php } ?>
            </div>

<?php
            $datalimite = date("Y-m-d");
            if($aux = $sql->select("SELECT texto FROM `portal_aviso` WHERE dataLimite >= \"$datalimite\"")){?>
                    <?php
                    foreach ($aux as $coluna) {
                        echo "<div class=\"alert alert-info\" role=\"alert\">";
                        echo $coluna["texto"];
                        echo "</div>";
                    }
                    ?>
<?php } else { ?>
                <div class="alert alert-warning" role="alert">
                    Nenhum aviso.
                </div>
<?php } ?>

        </div> <!-- /container -->

<?php
    include_once "../_include/modal.php";
    include_once "../_include/footer.php";
?>