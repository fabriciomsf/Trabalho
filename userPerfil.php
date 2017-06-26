<?php

include_once "header.php";

if(!$usuario->verificaLogin()){
    echo "<script>history.back();</script>";
}else{
    if($_POST){
        $dd = $_POST;
        if(!$dd['nome'] || !$dd['email']){
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
        $usuario->alterarDados($dd['nome'],$dd['email'],$usuario->getIdUser());
        }
    }
}

?>

<body>
<!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Perfil
                    <small>Perfil de Usuários</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="index.php">Home</a>
                    </li>
                    <li class="active">Perfil</li>
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
                    <div class="col-md-8">
                        <h3>Deseja alterar seus dados?</h3>
                        <form class="form-horizontal" action="" method="post">
                            <div class="form-group">
                                <label for="inputNome" class="col-sm-2 control-label">Nome</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="<?=$usuario->getNome();?>" name="nome" id="inputNome" placeholder="Nome Completo">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-6">
                                    <input type="email" class="form-control" value="<?=$usuario->getEmail();?>" name="email" id="inputEmail3" placeholder="Email">
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
                                    <button type="submit" class="btn btn-primary">Alterar Dados</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
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
