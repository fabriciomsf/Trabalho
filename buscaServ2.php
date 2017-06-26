 <?php 
    include "./header.php"; 
    
    if($_GET){
        $dd = $_GET;
        $idServico = $dd['serv'];
    }else{
        echo "<script> window.location.href = 'index.php'; </script>";
    }
?>

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Busca Especialidade Médicas
                    <small></small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="index.php">Home</a>
                    </li>
                    <li class="active">Busca Especialidades Médicas</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <!-- Project One -->
        
            <?php $usuario->buscaCliente($idServico); ?>
        
        <!-- Footer -->
   <?php include "./footer.php"; ?>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
