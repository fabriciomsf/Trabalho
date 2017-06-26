<?php

include_once "header.php";
include_once "class/classCliente.php";

$cliente = new classCliente();

if(!$usuario->verificaLogin()){
    echo "<script>history.back();</script>";

}


if($_POST){
    $dd=$_POST;
    if(@$dd['resposta']){
        $cliente->respondeAvaliacao($dd['resposta'], $dd['idAvaliacao']);
    }else{
        if($dd['coment']){
        $usuario->avaliaCliente($usuario->getIdUser(),$cliente->getIdCliente(),$dd['servico'],$dd['avaliacao'],$dd['coment']);
        }else{
            ?>
                <p class='bg-success'>
                        <div class='alert alert-danger alert-dismissible' role='alert'>
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                            </button>
                            Por favor <strong>preencha</strong> o campo <strong>Comentario</strong>.
                        </div>
                </p>
            <?php
        }
        
    }
    
}else{
    if($cliente->verificaEstatus($_GET['cliente'])){
        $cliente->buscaDadosCliente($_GET['cliente']);
    }else{
        echo "<script>window.location.href = 'listaLoja.php';</script>";
    }
}
?>
    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><?= $cliente->getNomeCli();?>
                    <small>Informações</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="index.php">Home</a>
                    </li>
                    <li class="active">Detalhes da Clínica</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <!-- Portfolio Item Row -->
        <div class="row">

            <div class="col-md-7">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
<!--                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="2"></li>-->
                    </ol>
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <?php
                            if($cliente->getImage1() != NULL){
                        ?>
                        <div class="item active">
                            <img class="img-responsive" width="650" height="400" src="img/clientes/<?=$cliente->getImage1();?>" alt="">
                        </div>
                        <?php
                            }
                            if($cliente->getImage2() != NULL){
                        ?>
                        <div class="item">
                            <img class="img-responsive" width="650" height="400" src="img/clientes/<?=$cliente->getImage2();?>" alt="">
                        </div>
                         <?php
                            }
                            if($cliente->getImage3() != NULL){
                        ?>
                        <div class="item">
                            <img class="img-responsive" width="650" height="400" src="img/clientes/<?=$cliente->getImage3();?>" alt="">
                        </div>
                         <?php
                            }
                        ?>
                    </div>

                    <!-- Controls -->
                    <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>
                </div>
            </div>

            <div class="col-md-5">
                        <h3>Média: 
                            <span class="label label-default">
                                <?php
                                        echo number_format($cliente->verificaMedia($cliente->getIdCliente()),0)
                                               
/* @var $media type */
//                                        if($media>90){
//                                            echo '<span class="label label-success">'.$media.'</span>';
//                                        }elseif($media <= 90 && $media > 70) {
//                                            echo '<span class="label label-primary">'.$media.'</span>';
//                                        }elseif(($media <= 70 && $media > 50)){
//                                            echo '<span class="label label-warning">'.$media.'</span>';
//                                        }else{
//                                            echo '<span class="label label-danger">'.$media.'</span>';
//                                        }
                                
                                ?>
                            </span>
                        </h3>
                <h3>Descrição</h3>
                <p><?=$cliente->getDesc();?></p>
                <h3>Contato Detalhado</h3>
                <p>
                <?=$cliente->getEnd();?>,<?=$cliente->getNum();?> - <?=$cliente->getCep();?> <br><?=$cliente->getBairro();?><br>
                </p>
                <p><i class="fa fa-phone"></i> 
                    <abbr title="Phone">Tel</abbr>: <?=$cliente->getCel();?></p>
                <p><i class="fa fa-phone-square"></i> 
                    <abbr title="Phone">Cel</abbr>: <?=$cliente->getTel();?></p>
                <p><i class="fa fa-envelope-o"></i> 
                    <abbr title="Email">E</abbr>: <a href="mailto:<?=$cliente->getEmail();?>"><?=  strtolower($cliente->getEmail());?></a>
                </p>
           
            </div>

        </div>
        <!-- /.row -->
        <hr>
        <?php
            //if(!$usuario->verificaAvaliacao($usuario->getIdUser(),$cliente->getIdCliente())){
        if(!$cliente->verificaDonoCliente($cliente->getIdCliente(), $usuario->getIdUser())){
        ?>
        <!-- Related Projects Row -->
        <div class="row">

                    <div class="well">
                    <h4>Avaliações:</h4>
                    <form role="form" method="post" action="descCliente.php">
                        <div class="form-group">
                            <label class="radio-inline" >
                                <input type="radio" value="10" name="avaliacao">
                                <span class="label label-danger">
                                    Péssimo
                                </span>
                            </label>
                            <label class="radio-inline">
                                <input type="radio" value="30" name="avaliacao">
                                <span class="label label-warning">
                                    Ruim
                                </span>
                            </label>
                            <label class="radio-inline">
                                <input type="radio" value="50" name="avaliacao" checked>
                                <span class="label label-default">
                                    Regular
                                </span>
                            </label>
                            <label class="radio-inline">
                                <input type="radio" value="70" name="avaliacao">
                                <span class="label label-info">
                                    Ótimo
                                </span>
                            </label>
                            <label class="radio-inline">
                                <input type="radio" value="100" name="avaliacao">
                                <span class="label label-success">
                                    Excelente
                                </span>
                            </label>
                            
                            
                            
                            <label class="radio-inline">
                                
                                <span class="text-uppercase ">
                                    <b>Serviços</b>
                                </span>
                                <select name="servico">
                                    <?=$cliente->comboServClientes($cliente->getIdCliente())?>
                                </select>
                            </label>
                        </div>
                        <div class="form-group">
                           <textarea id="inputEmail3" class="form-control" maxlength="255" name="coment" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Avaliar</button>
                    </form>
                </div>
            
            <?php
            }
            ?>

                <hr>

                <!-- Posted Comments -->
                <?=$cliente->mostraAvaliacao($cliente->getIdCliente(),$usuario->getIdUser());?>
                <!-- Comment -->
<!--                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Start Bootstrap
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                    </div>
                </div>-->

                <!-- Comment -->
<!--                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Start Bootstrap
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                         Nested Comment 
                        <div class="media">
                            <a class="pull-left" href="#">
                                <img class="media-object" src="http://placehold.it/64x64" alt="">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">Nested Start Bootstrap
                                    <small>August 25, 2014 at 9:30 PM</small>
                                </h4>
                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                            </div>
                        </div>
                         End Nested Comment 
                    </div>
                </div>-->

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
   <?php
   require_once './footer.php';
   ?>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
