<?php

require 'classClinicaMedica.php';

class classUsuario extends classClinicaMedica{
    
    protected $bd;

    public $idUser;
    public $nome;
    public $telefone;
    public $endereco;
    public $email;
    private $senha;
    public $tpUser;
    
    public $logado;
            
    function cadUsuario($nome,$email,$senha){
        $this->bd = new classClinicaMedica();
         try{

            $cadCli = $this->bd->pdo->prepare('INSERT INTO usuarios(nomeUsuario,emailUsuario,senhaUsuario) VALUES(:nome,:email,:senha)');

           $cadCli->execute(array(
               ':nome' => $nome,
               ':email' => $email,
               ':senha' =>$senha
           ));
           echo "<p class='bg-success'>
                        <div class='alert alert-success alert-dismissible' role='alert'>
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                            </button>
                            <strong>$email</strong> Cadastrado com Secesso, <b><a href='login.php'>clique aqui</a></b> para fazer o login.
                        </div>
                </p>";
        } catch (Exception $e) {
            echo "<p class='bg-success'>
                        <div class='alert alert-warning alert-dismissible' role='alert'>
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                            </button>
                           O e-mail <strong>$email</strong> já está cadastrado em nossa base de dados.
                        </div>
                </p>";
        }
    }

    function alterarDados($nome,$email,$id){
        $this->bd = new classClinicaMedica();
           try{
                  $trocaDados = $this->bd->pdo->prepare("UPDATE usuarios SET nomeUsuario=:nome, emailUsuario=:email WHERE idUsuario=:id");
                  $trocaDados->execute(array(
                    ':id' => $id,
                    ':nome'=> $nome,
                    ':email' => $email
                  ));
                  ?>
                <p class='bg-success'>
                        <div class='alert alert-success alert-dismissible' role='alert'>
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                            </button>
                            Dados <strong>alterados</strong> com sucesso.
                        </div>
                </p>
                <?php
                $_SESSION['userNome'] = $nome;
                $_SESSION['userEmail'] = $email;
           }catch (ErrorException $e){
                echo 'Error: ' . $e->getMessage();
           }
     }

    function alterarSenha($senha,$reSenha,$id){
        $this->bd = new classClinicaMedica();
           try{
                if($senha == $reSenha){
                  $trocaSenha = $this->bd->pdo->prepare("UPDATE usuarios SET senhaUsuario=:senha WHERE idUsuario=:id");
                  $trocaSenha->execute(array(
                    ':id' => $id,
                    ':senha' => md5($senha)
                  ));
                  ?>
                <p class='bg-success'>
                        <div class='alert alert-success alert-dismissible' role='alert'>
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                            </button>
                            Senha <strong>alterada</strong> com sucesso.
                        </div>
                </p>
                <?php
                }else{
                    ?>
                    <p class='bg-success'>
                            <div class='alert alert-danger alert-dismissible' role='alert'>
                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                    <span aria-hidden='true'>&times;</span>
                                </button>
                                Senhas <strong>diferentes!!!</strong> Operação não completada.
                            </div>
                    </p>
                    <?php
                }
           }catch (ErrorException $e){
                echo 'Error: ' . $e->getMessage();
           }
     }
     
    function recuperaSenha($email){
        try{
            $recuperaSenha = $this->pdo->prepare("SELECT * FROM usuarios where emailUsuario = :email");
            $recuperaSenha->execute(array(
                ':email' => $email
            ));
            
            $recupera = $recuperaSenha->fetch(PDO::FETCH_ASSOC);
            
            $filename = './novaSenha/'.$email.'.txt';
            $fp = fopen($filename, "w");
            //DETERMINA OS CARACTERES QUE CONTERÃO A SENHA
            $caracteres = "0123456789abcdefghijklmnopqrstuvwxyz+-/()";
            //EMBARALHA OS CARACTERES E PEGA APENAS OS 10 PRIMEIROS
            $novaSenha = substr(str_shuffle($caracteres),0,10);
            
            $escreve = "Sua senha foi alterada para: \r\n\r\n\r\n"
                    . "Email: ".$email
                    . " \r\nSenha: ".$novaSenha;
            fwrite($fp, $escreve);
           
            $this->alterarSenha($novaSenha, $novaSenha, $recupera['idUsuario']);
        } catch (Exception $ex) {
            echo "Erro: ". $ex->getMessage();
        }
    }
     
    function loginUsuario($email,$senha) {
        $this->bd = new classClinicaMedica();
        try {
            $logUser = $this->bd->pdo->prepare("SELECT * FROM usuarios where emailUsuario=:email and senhaUsuario=:senha");
            
            
            $logUser->execute(array(
                ':email' => $email,
                ':senha' => $senha
            ));
            if($logUser->rowCount()>0){
                $linha = $logUser->fetch(PDO::FETCH_ASSOC);
                $this->nome = $linha['nomeUsuario'];
                $this->email = $linha['emailUsuario'];
                $this->tpUser = $linha['tpUser'];
                $this->idUser = $linha['idUsuario'];

                    $_SESSION['idUser'] = $this->idUser;
                    $_SESSION['userEmail'] = $this->email;
                    $_SESSION['userNome'] = $this->nome;
                    $_SESSION['tpUser'] = $this->tpUser;
                    
                    $_SESSION['logado'] = "sim";

                    echo "<script> window.location.href = 'index.php'; </script>";

            }else{
                ?>
                <p class='bg-success'>
                        <div class='alert alert-danger alert-dismissible' role='alert'>
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                            </button>
                            Preencha <strong>corretamente</strong> os dados de acesso.
                        </div>
                </p>
                <?php
            }
                

        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }  
    }
    
    function avaliaCliente($idUsuario,$idCliente,$idServico,$avaliacao,$comentario){
        try{
            $avalia = $this->pdo->prepare("INSERT INTO avaliacao (idUsuario,idCliente,idServico,avaliacao,comentario,data)"
                    . "values(:idUsuario,:idCliente,:idServico,:avaliacao,:comentario,:data)");
            $data = date('Y-m-d');
            $avalia->execute(array(
                ':idUsuario' => $idUsuario,
                ':idCliente' => $idCliente,
                ':idServico' => $idServico,
                ':avaliacao' => $avaliacao,
                ':comentario' => $comentario,
                ':data' => $data
                ));
            

        } catch (Exception $ex) {
            echo "Erro: ". $ex->getMessage();
        }
    }

    function relatLojasAvaliadas($data){
        try{
            $data = explode('/',$data);
            $data = $data[1].'-'.$data[0];
            $relat = $this->pdo->prepare("SELECT av.idCliente,c.nomeCliente,c.bairroCliente,count(av.idAvaliacao),AVG(av.avaliacao)
                            FROM avaliacao av INNER JOIN clientes c ON av.idCliente = c.idCliente
                            INNER JOIN servicos s ON s.idServico = av.idServico
                            where av.data like :data GROUP BY av.idCliente ");
            $relat->execute(array(
                ':data' => "$data%"
            ));
            $i=1;
            ?>
            <table class="table table-bordered">
            <tr>
                <th>#</th>
                <th>Clínica</th>
                <th>Bairro</th>
                <th>Nº Avaliações</th>
                <th>Média</th>
            </tr>
            <?php
            while ($busca = $relat->fetch(PDO::FETCH_NUM)){
            ?>

                    <tr>
                        <td><?=$i++;?></td>
                        <td><?=$busca[1];?></td>
                        <td><?=$busca[2];?></td>
                        <td><?=$busca[3];?></td>
                        <td><?=$busca[4];?></td>
                    </tr>

            <?php
            }
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }

    }
    
    function relatUsarioAv($data){
        try{
            $data = explode('/',$data);
            $data = $data[1].'-'.$data[0];
            $relat = $this->pdo->prepare("SELECT u.nomeUsuario,u.emailUsuario,COUNT(av.idAvaliacao) 
                                            FROM avaliacao av INNER JOIN usuarios u ON av.idUsuario = u.idUsuario
                                            WHERE av.data LIKE :data
                                            GROUP BY u.idUsuario
                                            ORDER BY COUNT(av.idAvaliacao) DESC");
            $relat->execute(array(
                ':data' => "$data%"
            ));
            $i=1;
            ?>
            <table class="table table-bordered">
            <tr>
                <th>#</th>
                <th>Usuário</th>
                <th>E-Mail</th>
                <th>Nº Avaliações</th>
                
            </tr>
            <?php
            while ($busca = $relat->fetch(PDO::FETCH_NUM)){
            ?>

                    <tr>
                        <td><?=$i++;?></td>
                        <td><?=$busca[0];?></td>
                        <td><?=$busca[1];?></td>
                        <td><?=$busca[2];?></td>
                        
                    </tr>

            <?php
            }
        } catch (Exception $ex) {
            echo "Erro: ". $ex->getMessage();
        }
    }
    
    function relatLojasResp($data){
        try{
            $data = explode('/',$data);
            $data = $data[1].'-'.$data[0];
            $relat = $this->pdo->prepare("SELECT c.nomeCliente,c.bairroCliente,COUNT(r.idResposta) 
                                            FROM clientes c INNER JOIN avaliacao av ON av.idCliente = c.idCliente
                                            INNER JOIN resposta r ON r.idAvaliacao = av.idAvaliacao
                                            WHERE r.data LIKE :data
                                            GROUP BY c.idCliente
                                            ORDER BY COUNT(r.idResposta) DESC");
            $relat->execute(array(
                ':data' => "$data%"
            ));
            $i=1;
            ?>
            <table class="table table-bordered">
            <tr>
                <th>#</th>
                <th>Clínica</th>
                <th>Bairro</th>
                <th>Nº Respostas</th>
                
            </tr>
            <?php
            while ($busca = $relat->fetch(PDO::FETCH_NUM)){
            ?>

                    <tr>
                        <td><?=$i++;?></td>
                        <td><?=$busca[0];?></td>
                        <td><?=$busca[1];?></td>
                        <td><?=$busca[2];?></td>
                        
                    </tr>

            <?php
            }
        } catch (Exception $ex) {
            echo "Erro: ". $ex->getMessage();
        }
    }
    
    function buscaCliente($idServico){
        try{
            $buscaCli = $this->pdo->prepare("SELECT c.nomeCliente, sv.nomeServico, c.descCliente, c.idCliente, AVG(av.avaliacao), count(av.idAvaliacao)
               FROM servicos sv INNER JOIN tb_serv_cli sc ON sv.idServico = sc.idServicos 
               INNER JOIN clientes c ON c.idCliente = sc.idClientes 
               LEFT JOIN avaliacao av ON av.idCliente = c.idCliente 
               WHERE sv.idServico = :idServico AND c.estatus = 'A' AND sc.estatus = 'A'
               GROUP BY c.idCliente
               ORDER BY AVG(av.avaliacao) DESC");
            $buscaCli->execute(array(
                ':idServico' => $idServico
            ));
            $i=0;
            if($buscaCli->rowCount() > 0){
            while ($busca = $buscaCli->fetch(PDO::FETCH_NUM)){
                if($i==0){
                    ?>
                <div class="row">
                    <div class="col-md-12">
                       <div class="panel-heading">
                            <h4 align="center"><?=$busca[1];?></h4>
                        </div>
                    </div>
                </div>
                
                    <?php
                }
                ++$i;
                ?>
                <div style="border: 1px #337ab7 dashed">
                    <div class="row">
                        <div class="col-md-10">
                           <h3><?=$busca[0];?></h3>
                        </div>
                        <div class="col-md-2">
                            Média:<?php
                                $media = number_format($busca[4], 0);

                                    if ($media > 90){
                                        echo '<span class="label label-success">'.$media.'</span>';
                                    }elseif($media <= 90 && $media > 70) {
                                        echo '<span class="label label-primary">'.$media.'</span>';
                                    }elseif(($media <= 70 && $media > 50)){
                                        echo '<span class="label label-warning">'.$media.'</span>';
                                    }else{
                                        echo '<span class="label label-danger">'.$media.'</span>';
                                    }
                                   
                            
                            ?>
                            <br>
                            Avaliações:
                            <span class="label label-primary"><?=$busca[5];?></span>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-10">
                            <h5><?=$busca[2];?></h5>
                        </div>
                        <div class="col-md-2">
                            <?php
                                if(!$this->verificaLogin()){
                            ?>
                                <a class="btn btn-primary" href="login.php">Faça o Login</i></a>
                            <?php
                                }else{
                            ?>
                                <a class="btn btn-primary" href="descCliente.php?cliente=<?=$busca[3];?>">Mais Detalhes</i></a>      
                            <?php
                                }
                            ?>
                        </div>
                    </div>
                </div>

        <hr>
                <?php
            }
            }else{
                ?>
                <div class="row">
                    <div class="col-md-12">
                       <div class="panel-heading">
                           <h4 align="center" style="color: red">Nenhuma Clínica cadastrada contém está especialidade no momento!</h4>
                        </div>
                    </div>
                </div>
                <?php
            }
        } catch (Exception $ex) {
             echo "Erro: ". $ex->getMessage();
        }
        
    }
    
    function listaServico(){
        try{
            $listaServ = $this->pdo->prepare("SELECT * FROM servicos WHERE estatus = :estatus");
            $listaServ->execute(array(
                ':estatus' => 'A'
            ));
            $i=1;
            while ($lista = $listaServ->fetch(PDO::FETCH_ASSOC)){
                if($i % 2 != 0){
                    echo "<tr>"
                            ."<td>"
                                ."<a href=buscaServ2.php?serv=".$lista['idServico'].">"
                                    .$lista['nomeServico']
                                ."</a>"
                            . "<td>";
                }else{
                    echo "<td>"
                            ."<a href=buscaServ2.php?serv=".$lista['idServico'].">"
                                .$lista['nomeServico']
                            ."</a>"
                        ."<td>"
                        ."</tr>";
                }
                $i++;
            }
            
        } catch (Exception $ex) {
            echo 'Erro: '. $ex->getMessage();
        }
    }
    
    function listaServicoAdm(){
        try {
            $listaServ = $this->pdo->prepare("SELECT * FROM servicos");
            $listaServ->execute();
            $i=1;
            while ($lista = $listaServ->fetch(PDO::FETCH_ASSOC)){
                $class = ($lista['estatus'] == 'A')? "class='default'":"class='danger'";
                $ativaDesativa = ($lista['estatus'] == 'A')? "Desativar":"Ativar";
                echo "<tr $class>"
                . "<td><b>$i</b></td>"
                . "<td>".$lista['nomeServico']."</td>"
                . "<td><a href='altServAdm.php?servico=".$lista['idServico']."&nome=".$lista['nomeServico']."' class='btn btn-primary'>Alterar</a></td>"
                . "<td><a href='listaServicoAdm.php?servico=".$lista['idServico']."&ref=5' class='btn btn-danger'>$ativaDesativa</a></td>"
                      . "</tr>";
                $i++;
            }
        } catch (Exception $ex) {
            echo 'Erro: '.$ex->getMessage();
        }
    }

    function listaBairro(){
        try {
            $listaBairro = $this->pdo->prepare("SELECT * FROM bairro");
            $listaBairro->execute();
            $i=1;
            while ($lista = $listaBairro->fetch(PDO::FETCH_ASSOC)){
                $class = ($lista['estatus'] == 'A')? "class='default'":"class='danger'";
                $ativaDesativa = ($lista['estatus'] == 'A')? "Desativa":"Ativa";
                echo "<tr $class>"
                    . "<td><b>$i</b></td>"
                    . "<td>".$lista['nomeBairro']."</td>"
                    . "<td><a href='altBairro.php?bairro=".$lista['idBairro']."&nome=".$lista['nomeBairro']."' class='btn btn-primary'>Alterar</a></td>"
                    . "<td><a href='listaBairro.php?bairro=".$lista['idBairro']."&ref=5' class='btn btn-danger'>$ativaDesativa</a></td>"
                    . "</tr>";
                $i++;
            }
        } catch (Exception $ex) {
            echo 'Erro: '.$ex->getMessage();
        }
    }
            
    function ativaDesativa($idUser,$ref){
        try{
                $verifica = $this->pdo->prepare("SELECT tpUser,nomeUsuario FROM usuarios WHERE idUsuario = :idUser");
                $verifica->execute([':idUser' => $idUser]);
                $v1 = $verifica->fetch(PDO::FETCH_NUM);
            if($ref == FALSE){
                if($v1[0] != 1){//VERIFICA SE O USUARIO JÁ NÃO É UM ADMINISTRADOR
                    
                    echo "<p class='bg-success'>
                            <div class='alert alert-info alert-dismissible' role='alert'>
                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                    <span aria-hidden='true'>&times;</span>
                                </button>
                                Deseja realmente Tornar o usuário <b>".strtoupper($v1[1]) ."</b> um administrador do sistema ?<BR>
                                    <a class='btn btn-primary' href='listaUsers.php?user=$idUser&ref=1'>CONFIRMAR</a> 
                            </div>
                         </p>";
                    
                }else{
                    echo "<p class='bg-success'>
                                <div class='alert alert-danger alert-dismissible' role='alert'>
                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                        <span aria-hidden='true'>&times;</span>
                                    </button>
                                    Deseja realmente tirar os privilégios de administrador do usuário <b>".strtoupper($v1[1]) ."</b>? <BR>
                                        <a class='btn btn-primary' href='listaUsers.php?user=$idUser&ref=1'>CONFIRMAR</a> 
                                </div>
                            </p>";
                }
            }else{
                $altera = $this->pdo->prepare("UPDATE usuarios SET tpUser = :valor WHERE idUsuario = :idUser");
                if($v1[0]==1){
                    $altera->execute(array(
                        ':idUser' => $idUser,
                        ':valor' => '0'
                    ));
                }else{
                    $altera->execute(array(
                        ':idUser' => $idUser,
                        ':valor' => '1'
                    ));
                }
            }
        } catch (Exception $ex) {
            echo 'Erro: '. $ex->getMessage();
        }
    }
            
    function verificaAvaliacao($idUsuario,$idCliente){
        try{
            $avaliacao = $this->pdo->prepare("SELECT * FROM avaliacao "
                    . "WHERE idUsuario = :idUsuario "
                    . "AND idCliente = :idCliente");
            $avaliacao->execute(array(
                ':idUsuario' => $idUsuario,
                ':idCliente' => $idCliente
            ));

            if($avaliacao->rowCount() > 0){
                return TRUE;
            }else{
                return FALSE;
            }
        } catch (Exception $ex) {
            echo "Erro: ". $ex->getMessage();
        }
    }

    function cadBairro($nomeBairro){
        try{
            $bairro = $this->pdo->prepare("INSERT INTO bairro (nomeBairro,estatus) VALUES(:nomeBairro,:estatus)");
            $bairro->execute(array(
                ':nomeBairro' => $nomeBairro,
                ':estatus' => 'A'
            ));
            echo "<p class='bg-success'>
                        <div class='alert alert-success alert-dismissible' role='alert'>
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                            </button>
                            O serviço <strong>$nomeBairro</strong> foi cadastrado com sucesso.
                        </div>
                </p>";
        } catch (Exception $ex) {
            echo "Erro: ". $ex->getMessage();
        }
    }
    
    function cadServico($idUser,$idCliente,$nomeServ){
        try{
            $serv = $this->pdo->prepare("INSERT INTO servicos (nomeServico,estatus) VALUES(:nomeServico,:estatus)");
            $serv->execute(array(
                ':nomeServico' => $nomeServ,
                ':estatus' => 'A'
            ));
            echo "<p class='bg-success'>
                        <div class='alert alert-success alert-dismissible' role='alert'>
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                            </button>
                            O serviço <strong>$nomeServ</strong> foi cadastrado com sucesso.
                        </div>
                </p>";
        } catch (Exception $ex) {
            echo "Erro: ". $ex->getMessage();
        }
    }

    function altServico($idCliente,$idServ,$nomeServ){
        try{
            $altera = $this->pdo->prepare("UPDATE servicos SET nomeServico = :nomeServ WHERE idServico = :idServ");
            $altera->execute(array(
                ':nomeServ' => $nomeServ,
                ':idServ' => $idServ
            ));
            echo "<p class='bg-success'>
                        <div class='alert alert-success alert-dismissible' role='alert'>
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                            </button>
                            O serviço <strong>$nomeServ</strong> foi alterado com sucesso.
                        </div>
                </p>";
            echo "<script>window.location.href = 'listaServicoAdm.php'</script>";
        } catch (Exception $ex) {
            echo "Erro: ".$ex->getMessage();
        }
    }

    function altBairro($idBairro,$nomeBairro){
        try{
            $altera = $this->pdo->prepare("UPDATE bairro SET nomeBairro = :nomeBairro WHERE idBairro = :idBairro");
            $altera->execute(array(
                ':nomeBairro' => $nomeBairro,
                ':idBairro' => $idBairro
            ));
            echo "<p class='bg-success'>
                        <div class='alert alert-success alert-dismissible' role='alert'>
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                            </button>
                            O bairro <strong>$nomeBairro</strong> foi alterado com sucesso.
                        </div>
                </p>";
            echo "<script>window.location.href = 'listaBairro.php'</script>";
        } catch (Exception $ex) {
            echo "Erro: ".$ex->getMessage();
        }
    }
    
    function desativaServico($idServ,$ref){
        try{
                $verifica = $this->pdo->prepare("SELECT * FROM servicos WHERE idServico = :idServ");
                $verifica->execute([':idServ' => $idServ]);
                $v1 = $verifica->fetch(PDO::FETCH_NUM);
                if($ref == FALSE){
                    if($v1[2] != 'A'){//VERIFICA SE O SERVIÇO ESTA ATIVO

                        echo "<p class='bg-success'>
                                <div class='alert alert-info alert-dismissible' role='alert'>
                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                        <span aria-hidden='true'>&times;</span>
                                    </button>
                                    Deseja realmente ativar o serviço <b>".strtoupper($v1[1]) ."</b>?<BR>
                                        <a class='btn btn-primary' href='listaServicoAdm.php?servico=$idServ&ref=1'>CONFIRMAR</a>
                                </div>
                             </p>";

                    }else{
                        echo "<p class='bg-success'>
                                    <div class='alert alert-danger alert-dismissible' role='alert'>
                                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                            <span aria-hidden='true'>&times;</span>
                                        </button>
                                        Deseja realmente desativar o serviço <b>".strtoupper($v1[1]) ."</b>?<BR>
                                            <a class='btn btn-primary' href='listaServicoAdm.php?servico=$idServ&ref=1'>CONFIRMAR</a>
                                    </div>
                                </p>";
                    }
                }else{
                    $altera = $this->pdo->prepare("UPDATE servicos SET estatus = :estatus WHERE idServico = :idServ");
                    if($v1[2] != 'A'){
                        $altera->execute(array(
                            ':idServ' => $idServ,
                            ':estatus' => 'A'
                        ));
                    }else{
                        $altera->execute(array(
                            ':idServ' => $idServ,
                            ':estatus' => 'I'
                        ));
                    }
                }
            } catch (Exception $ex) {
                echo "Erro: ".$ex->getMessage();
            }
    }

    function desativaBairro($idBairro,$ref){
        try{
            $verifica = $this->pdo->prepare("SELECT * FROM bairro WHERE idBairro = :idBairro");
            $verifica->execute([':idBairro' => $idBairro]);
            $v1 = $verifica->fetch(PDO::FETCH_NUM);
            if($ref == FALSE){
                if($v1[2] != 'A'){//VERIFICA SE O SERVIÇO ESTA ATIVO

                    echo "<p class='bg-success'>
                                <div class='alert alert-info alert-dismissible' role='alert'>
                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                        <span aria-hidden='true'>&times;</span>
                                    </button>
                                    Deseja realmente ativar o bairro <b>".strtoupper($v1[1]) ."</b>?<BR>
                                        <a class='btn btn-primary' href='listaBairro.php?bairro=$idBairro&ref=1'>CONFIRMAR</a>
                                </div>
                             </p>";

                }else{
                    echo "<p class='bg-success'>
                                    <div class='alert alert-danger alert-dismissible' role='alert'>
                                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                            <span aria-hidden='true'>&times;</span>
                                        </button>
                                        Deseja realmente desativar o bairro <b>".strtoupper($v1[1]) ."</b>?<BR>
                                            <a class='btn btn-primary' href='listaBairro.php?bairro=$idBairro&ref=1'>CONFIRMAR</a>
                                    </div>
                                </p>";
                }
            }else{
                $altera = $this->pdo->prepare("UPDATE bairro SET estatus = :estatus WHERE idBairro = :idBairro");
                if($v1[2] != 'A'){
                    $altera->execute(array(
                        ':idBairro' => $idBairro,
                        ':estatus' => 'A'
                    ));
                }else{
                    $altera->execute(array(
                        ':idBairro' => $idBairro,
                        ':estatus' => 'I'
                    ));
                }
            }
        } catch (Exception $ex) {
            echo "Erro: ".$ex->getMessage();
        }
    }
    
    function listaUsers(){
        try {
             $listaUsers = $this->pdo->prepare('SELECT u.* FROM usuarios u '
                    . 'LEFT JOIN clientes c on u.idUsuario = c.idUsuario '
                    . 'WHERE c.idUsuario IS null AND u.idUsuario <> :idUser');
            $listaUsers->execute(array(
                ':idUser' => $this->getIdUser()
            ));
            $i=1;
            while($lista = $listaUsers->fetch(PDO::FETCH_ASSOC)){
                $class = ($lista['tpUser'] == 1)? "class='info'":"class='active'";
                $class1 = ($lista['tpUser'] == 1)? "class='btn btn-danger'":"class='btn btn-primary'";
                $ativaDesativa = ($lista['tpUser'] == 1)? "Desativa":"Ativa";
                echo "<tr $class>"
                        . "<td>"
                            . "<b>".
                                $i
                            . "</b>"
                        . "</td>"
                        . "<td class>".
                            strtoupper($lista['nomeUsuario'])
                        . "</td>"
                        . "<td>".
                            strtoupper($lista['emailUsuario'])
                        . "</td>"
                        . "<td>"
                        . "<a href='listaUsers.php?user=".$lista['idUsuario']."&ref=8' $class1>$ativaDesativa</a>"
                        . "</td>"
                    . "</tr>";
                $i++;
            }
        } catch (Exception $ex) {
            echo 'Erro: '.$ex->getMessage();
        }
    }
              
    function verificaLogin(){
        if(@$_SESSION['logado']=='sim'){
            return true;
        }
    }
          
    function getNome(){
        return $_SESSION['userNome'];
    }

    function getEmail(){
        return $_SESSION['userEmail'];
    }

    function getIdUser(){
        return $_SESSION['idUser'];
    }

    function getTpUser(){
        return $_SESSION['tpUser'];
    }

    function deslogar(){
        $_SESSION['logado'] = 'nao';
         echo "<script> window.location.href = 'index.php'; </script>";
    }



}
