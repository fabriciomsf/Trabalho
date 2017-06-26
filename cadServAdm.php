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

    if(!$dd['serv']){
        ?>
        <p class='bg-success'>
                        <div class='alert alert-danger alert-dismissible' role='alert'>
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                            </button>
                            Por favor <strong>preencha todos os dados</strong>.
                        </div>
                </p>
    <?php
    }else{

    $usuario->cadServico($dd['serv']);
    }
}


?>

<body>
<!-- Page Content -->
<div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Cadastrar Especialidades
                <small> </small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="index.php">Home</a>
                </li>
                <li class="active">Cadastrar Especialidades para Clínicas</li>
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
<!--            <h2>Bem vindo --><?php //echo $usuario->getNome(); ?><!--</h2>-->
            <!-- Contact Form -->
            <!-- In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->

<!--                    <h3>Por favor preencha os dados abaixo</h3>-->
                    <form class="form-horizontal" action="" method="post">
                        
                        
                        <div class="form-group">
                            <label for="inputNome" class="col-sm-2 control-label">Especialidade Médica</label>
                            <div class="col-sm-10">
                                <input type="text" name="serv" class="form-control">
                            </div>
                        </div>



                        
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <!--                      <div class="checkbox">
                                                        <label>
                                                          <input type="checkbox"> Me lembre
                                                        </label>
                                                      </div>-->
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-4">
                                <button type="submit" class="btn btn-primary">Cadastrar Especialidade Médica</button>
                            </div>
                        </div>
                    </form>

            <!-- /.row -->
        </div>
    </div>
    <!-- /.row -->

    <?php include_once "footer.php"; ?>

</div>
<!-- /.container -->

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

</body>

</html>
