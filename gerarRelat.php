<?php

include_once "header.php";

if(!$usuario->verificaLogin()){
    echo "<script>history.back();</script>";
}else{
    if($usuario->getTpUser() != 1){
        echo "<script>alert('Aréa Restrita');</script>";
        echo "<script> window.location.href = 'index.php';</script>";
    }
}
if($_POST){
    $dd = $_POST;
    if(@!$dd['relat'] || !$dd['data']){
        ?>
        <p class='bg-success'>
                        <div class='alert alert-danger alert-dismissible' role='alert'>
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                            </button>
                            Por favor escolha o <strong>tipo de relatório</strong> e preecha o <strong>campo Data</strong> corretamente.
                        </div>
                </p>
    <?php
    }
}
?>

<body>
<!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Gerar Relatórios

                </h1>
                <ol class="breadcrumb">
                    <li><a href="index.php">Home</a>
                    </li>
                    <li class="active">Gerar Relatórios</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <!-- Content Row -->
        <div class="row">
            <!-- Sidebar Column -->
            <div class="col-md-3">
                <?php include_once "menuUserCli.php"; ?>
            </div>
            <!-- Content Column -->
            <div class="col-md-9">
                <!--<h2>Bem vindo <?php echo $usuario->getNome(); ?></h2>
                 Contact Form -->
                <!-- In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
                <div class="row">
                    <div class="col-md-12">
                        <h3>Coloque a data e escolha o Relatório Desejado</h3>
                        <form class="form-horizontal" action="" method="post">
                            <div class="form-group">
                                <label class="radio-inline" >
                                    <input type="radio" value="LA" name="relat" >
                                <span class="label label-info">
                                    Clínicas com melhores avaliações
                                </span>
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" value="UA" name="relat">
                                <span class="label label-warning">
                                    Usuários com mais avaliações
                                </span>
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" value="LR" name="relat">
                                <span class="label label-default">
                                    Clínicas que mais responderam
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="inputNome" class="col-sm-2 control-label">Data</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="data" id="data" placeholder="EX: 06/2016">
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">

                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-4">
                                    <button type="submit" class="btn btn-primary">Gerar Relatório</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
                <?php
                switch (@$_POST['relat']) {
                    case 'LA':
                        @$usuario->relatLojasAvaliadas($_POST['data']);
                        break;
                    case 'UA':
                        @$usuario->relatUsarioAv($_POST['data']);
                        break;
                    case 'LR':
                        @$usuario->relatLojasResp($_POST['data']);
                        break;
                }
                
                ?>
                <!-- /.row -->
            </div>
        </div>

        <!-- /.row -->

        <?php include_once "footer.php"; ?>

    </div>
    <!-- /.container -->

<script src="js/jquery.js"></script>
<script src="js/jquery.maskedinput.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
<script>
    jQuery(function($){
        $("#data").mask("99/9999");

    });
</script>

</body>

</html>
