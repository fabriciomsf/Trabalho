<?php

include_once "header.php";
include_once "class/classCliente.php";


if(!$usuario->verificaLogin()){
    echo "<script>history.back();</script>";

}
$cliente = new classCliente();


?>

<body>
<!-- Page Content -->
<div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Lista de Clínicas
                <small>Lista de Clínicas Cadastradas </small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="index.php">Home</a>
                </li>
                <li class="active">Lista de Clínicas Cadastradas </li>
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

                   
            <table class="table table-hover">
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th>Bairro</th>
                            <th>Telefone</th>
                            <th>Status</th>
                            <th></th>
                            <th></th>
                        </tr>
                        <?php
                            $cliente->listaLoja($usuario->getIdUser());
                        ?>
                    </table>

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
