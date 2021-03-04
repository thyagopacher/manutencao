<?php
include "validacaoLogin.php";
if (isset($_GET["codmanutencao"]) && $_GET["codmanutencao"] != NULL && trim($_GET["codmanutencao"]) != "") {
    $sql = "select *
        from manutencao where codmanutencao = '{$_GET["codmanutencao"]}' $andManutencao";
    $manutencaop = $conexao->comandoArray($sql);
} 

$action = "../control/SalvarManutencao.php";
?>  
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <?php include 'head.php';?>
    </head>
    <body class="hold-transition skin-blue sidebar-mini">

        <div class="wrapper">

            <?php include "header.php"; ?>
            <?php include "menu.php"; ?>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        <?= $titulo ?>

                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#"><?= $nivelp["modulo"] ?></a></li>
                        <li class="active"><?= $nivelp["pagina"] ?></li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div id="tabs">
                        <ul>
                            <li><a href="#tabs-1">Cadastro</a></li>
                            <?php if ($nivelp["procurar"] == 1 || $_SESSION["codnivel"] == '1') { ?>
                                <li><a href="#tabs-2">Procurar</a></li>
                            <?php } ?>

                        </ul>   
                        <div id="tabs-1">
                            <?php include("formManutencao.php"); ?>
                        </div>
                        <?php if ($nivelp["procurar"] == 1 || $_SESSION["codnivel"] == '1') { ?>
                            <div id="tabs-2">
                                <?php include("formProcurarManutencao.php"); ?>
                            </div>
                        <?php } ?>

                        <span style="float: right; color: grey;width: 100%;text-align: right;">@ GestCCon</span>                            
                    </div>

                </section><!-- /.content -->
            </div><!-- /.content-wrapper -->
            <?php include "footer.php" ?>
        </div><!-- ./wrapper -->

        <?php include './javascriptFinal.php';?>
        <script type="text/javascript" src="./recursos/js/jquery.form.min.js"></script>
        <script type="text/javascript" src="./recursos/js/ajax/Manutencao.js"></script>
    </body>
</html>
