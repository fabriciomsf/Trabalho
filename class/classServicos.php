<?php
require_once "classCliente.php";

class classServicos extends classCliente{

    function comboServicos(){
    try{
        $buscaServ  = $this->pdo->prepare("SELECT * FROM servicos WHERE estatus = :estatus");
            $buscaServ->execute(array(
                ':estatus' => 'A'
            ));
            while($servicos = $buscaServ->fetch(PDO::FETCH_ASSOC)) {

                echo "<option value='" .$servicos['idServico']."'>".$servicos['nomeServico']."</option>";
            }

    }catch (Exception $e){
        echo 'Error: '. $e->getMessage();
    }
}

    function cadServico($idUser,$idCliente,$descricao){
        try {
            $cadServico = $this->pdo->prepare("INSERT INTO tb_serv_cli (idClientes,idServicos,descricao,estatus) "
                    . "VALUES (:idUser,:idCliente,:descricao,:estatus)");

            $cadServico->execute(array(
                ':idUser' => $idUser,
                ':idCliente' => $idCliente,
                ':descricao' => $descricao,
                ':estatus' => 'A'
            ));
            echo "<p class='bg-success'>
                        <div class='alert alert-success alert-dismissible' role='alert'>
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                            </button>
                            <strong>Serviço</strong> Cadastrado com Secesso
                        </div>
                </p>";
        }catch (Exception $e){
            echo 'Error: '. $e->getMessage();
        }
    }

    function altServico($idCliente,$idServico,$descricao){
        try{
            $altServ = $this->pdo->prepare("UPDATE tb_serv_cli SET descricao = :descricao "
                    . "WHERE idClientes = :idCliente AND idServicos = :idServico");
            $altServ->execute([':descricao' => $descricao,
                ':idCliente' => $idCliente,
                ':idServico' => $idServico
                ]);
            echo "<script> window.location.href = 'listaServico.php'; </script>";
        } catch (Exception $ex) {
            echo "Erro: ". $ex->getMessage();
        }
    }
    
    function listaServicos($idUsuario){
        try{
            $listaServico = $this->pdo->prepare("SELECT c.nomeCliente,s.nomeServico,sc.descricao,c.bairroCliente,c.idCliente,s.idServico,sc.estatus,c.idCliente "
                    . "FROM clientes c INNER JOIN tb_serv_cli sc ON c.idCliente = sc.idClientes "
                    . "INNER JOIN servicos s ON sc.idServicos = s.idServico "
                    . "WHERE c.idUsuario = :idUsuario "
                    . "ORDER BY c.nomeCliente,s.nomeServico ");
            $listaServico->execute(array(
                ':idUsuario' =>$idUsuario
            ));
            $i=1;
            while ($servicos = $listaServico->fetch(PDO::FETCH_NUM)){
                $class = ($servicos[6] == 'A')? "class='active'":"class='danger'";
                echo "<tr $class><td><b>".$i++."</b></td>"
                        . "<td><a href='descCliente.php?cliente=".$servicos[7]."'>".$servicos[0]."</a></td>"
                        . "<td>".$servicos[1]."</td>"
                        . "<td>".$servicos[2]."</td>"
                        . "<td>".$servicos[3]."</td>"
                        . "<td><a href='altServico.php?cliente=".$servicos[4]."&servico=".$servicos[5]."' class='btn btn-primary'>Alterar</a></td>"
                        . "<td><a href='desativaServico.php?cliente=".$servicos[4]."&servico=".$servicos[5]."' class='btn btn-danger'>Ativa/Desativa</a></td>"
                        . "</tr>";
            }
            
            
        } catch (Exception $e) {
            echo 'Error: '. $e->getMessage();
        }
    }
    
    function buscaServicos($idServico){
        try{
            $buscaServ = $this->pdo->prepare("SELECT c.nomeCliente,s.nomeServico,sc.descricao,c.bairroCliente,c.idCliente,"
                    . "s.idServico,sc.estatus "
                    . "FROM clientes c INNER JOIN tb_serv_cli sc ON c.idCliente = sc.idClientes "
                    . "INNER JOIN servicos s ON sc.idServicos = s.idServico "
                    . "WHERE s.idServico = :idServico");
            $buscaServ->execute(array(
                ':idServico' => $idServico
            ));
            $busca = $buscaServ->fetch(PDO::FETCH_NUM);
            
            $_SESSION['nomeServico'] = $busca[1];
            $_SESSION['nomeClienteServico'] = $busca[0];
            $_SESSION['idClientesServ'] = $busca[4];
            $_SESSION['idServicosServ'] = $busca[5];
            $_SESSION['descricaoServ'] = $busca[2];
            $_SESSION['estatusServ'] = $busca[6];
        } catch (Exception $ex) {
            echo "Erro: ". $ex->getMessage();
        }
        
    }
    
    function desativaServico($idServico,$estatus){
        try{
            $desativaServ = $this->pdo->prepare("UPDATE tb_serv_cli SET estatus = :estatus WHERE idServicos = :idServico");
            $desativaServ->execute(array(
                ':estatus' => $estatus,
                ':idServico' => $idServico
            ));
             echo "<script> window.location.href = 'listaServico.php'; </script>";
        } catch (Exception $ex) {
            echo "Erro: ". $ex->getMessage();
        }
    }
    
    function getNomeServico() {
        return $_SESSION['nomeServico'];
    }
    
    function getNomeClienteServico() {
        return $_SESSION['nomeClienteServico'];
    }
    
    function getEstatusServ() {
        return $_SESSION['estatusServ'];
    }
    
    function getClientesServ() {
        return $_SESSION['idClientesServ'];
    }
    
    function getidServicosServ() {
        return $_SESSION['idServicosServ'];
    }
    
    function getdescricaoServ() {
        return $_SESSION['descricaoServ'];
    }
}

    