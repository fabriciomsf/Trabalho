<?php

require_once 'classUsuario.php';
/**
 * Created by PhpStorm.
 * User: Sergio Murillo
 * Date: 15/04/2016
 * Time: 20:54
 */
class classCliente extends classUsuario{

    public $idCliente;
    public $nomeCli;
    public $end;
    public $numero;
    public $bairro;
    public $cep;
    public $tel;
    public $cel;
    public $descricao;
    public $estatus;

    function cadCliente($nomeCli,$end,$numero,$bairro,$cep,$tel,$cel,$descricao,$idUser,$image1,$image2,$image3){
        //$this->bd = new Conexao();
        try{

            $cadCli = $this->pdo->prepare('INSERT INTO '
                    . 'clientes(nomeCliente,endCliente,numCliente,bairroCliente,cepCliente,telCliente,celCliente,descCliente,estatus,image1,image2,image3,idUsuario) '
                    . 'VALUES(:nome,:endereco,:numero,:bairro,:cep,:tel,:cel,:descricao,:estatus,:image1,:image2,:image3,:idUser)');

            $cadCli->execute(array(
                ':nome' => $nomeCli,
                ':endereco' => $end,
                ':numero' =>$numero,
                ':bairro' =>$bairro,
                ':cep' =>$cep,
                ':tel' =>$tel,
                ':cel' =>$cel,
                ':descricao' =>$descricao,
                ':estatus' => 'A',
                ':image1' => $image1,
                ':image2' => $image2,
                ':image3' => $image3,
                ':idUser' => $idUser
            ));
            echo "<p class='bg-success'>
                        <div class='alert alert-success alert-dismissible' role='alert'>
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                            </button>
                            <strong>$nomeCli</strong> Cadastrado com Secesso
                        </div>
                </p>";
        } catch (Exception $e) {
           
            echo "<p class='bg-success'>
                        <div class='alert alert-warning alert-dismissible' role='alert'>
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                            </button>
                           O Cliente <strong>$nomeCli</strong> já está cadastrado em nossa base de dados.
                        </div>
                </p>";
        }
    }

    function verificaEstatus($idCliente){
       
        $cliente = $this->pdo->prepare("SELECT * FROM clientes WHERE idCliente = :idCliente AND estatus='A'");
        $cliente->execute(array(
               ':idCliente' => $idCliente
            ));
            if($cliente->rowCount() > 0){
                return true;
            }
    }
    
    function verificaCliente($idUser){
        try{
            $cliente = $this->pdo->prepare("SELECT * FROM clientes WHERE idUsuario = :idUser");

            $cliente->execute(array(
               ':idUser' => $idUser
            ));
            if($cliente->rowCount() > 0){
                return true;
            }

        }catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function buscaDadosCliente($idCliente){
        try{
            $buscaCli = $this->pdo->prepare("SELECT * FROM clientes WHERE idCliente = :idCliente");

            $buscaCli->execute(array(
                ':idCliente' => $idCliente
            ));
            if($buscaCli->rowCount() > 0){
                $cliente = $buscaCli->fetch(PDO::FETCH_ASSOC);
                $this->idCliente = $cliente['estatus'];
                $this->nomeCli = $cliente['nomeCliente'];
                $this->end = $cliente['endCliente'];
                $this->numero = $cliente['numCliente'];
                $this->bairro = $cliente['bairroCliente'];
                $this->cep = $cliente['cepCliente'];
                $this->tel = $cliente['telCliente'];
                $this->cel = $cliente['celCliente'];
                $this->descricao = $cliente['descCliente'];

                $_SESSION['idCliente'] = $cliente['idCliente'];
                $_SESSION['nomeCliente'] = $cliente['nomeCliente'];
                $_SESSION['endCliente'] = $cliente['endCliente'];
                $_SESSION['numCliente'] = $cliente['numCliente'];
                $_SESSION['bairroCliente'] = $cliente['bairroCliente'];
                $_SESSION['cepCliente'] = $cliente['cepCliente'];
                $_SESSION['telCliente'] = $cliente['telCliente'];
                $_SESSION['celCliente'] = $cliente['celCliente'];
                $_SESSION['descCliente'] = $cliente['descCliente'];
                $_SESSION['estatus'] = $cliente['estatus'];
                $_SESSION['image1'] = $cliente['image1'];
                $_SESSION['image2'] = $cliente['image2'];
                $_SESSION['image3'] = $cliente['image3'];
            }

        }catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function altCliente($nomeCli,$end,$numero,$bairro,$cep,$tel,$cel,$descricao,$idCliente){
        try{
            $altCliente = $this->pdo->prepare("UPDATE clientes SET nomeCliente = :nomeCli,endCliente = :endCli,numCliente = :numCliente,bairroCliente = :bairroCli,cepCliente = :cepCli,telCliente = :telCli,celCliente = :celCli,descCliente = :descCli WHERE idCliente = :idCliente");
            $altCliente->execute(array(
                ':nomeCli' => $nomeCli,
                ':endCli' =>$end,
                ':numCliente' => $numero,
                ':bairroCli' => $bairro,
                ':cepCli' => $cep,
                ':telCli' => $tel,
                ':celCli' => $cel,
                ':descCli' => $descricao,
                ':idCliente' => $idCliente
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
        }catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function alteraCliente($estatus,$idCliente,$idUser){
        try{
            $alterCliente = $this->pdo->prepare("UPDATE clientes SET estatus = :estatus WHERE idCliente = :idCliente AND idUsuario = :idUser");
            $alterCliente->execute(array(
                ':estatus' => $estatus,
                ':idCliente' => $idCliente,
                ':idUser' => $idUser
            ));
            if($estatus == 'A'){
            ?>
            <p class='bg-success'>
                        <div class='alert alert-success alert-dismissible' role='alert'>
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                            </button>
            Loja <strong>ativada</strong> com sucesso.
                        </div>
                </p>
<?php
}else{
?>
<p class='bg-success'>
                        <div class='alert alert-success alert-dismissible' role='alert'>
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                            </button>
            Loja <strong>desativada</strong> com sucesso.
                        </div>
                </p>

<?php
}
        }catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    
    function listaLoja($idUsuario) {
        try{
            $listaLoja = $this->pdo->prepare("SELECT * FROM clientes WHERE idUsuario = :idUsuario ORDER BY nomeCliente");
            $listaLoja->execute(array(
                ':idUsuario' => $idUsuario
            ));
            $i=1;
            while($loja = $listaLoja->fetch(PDO::FETCH_ASSOC)){
                       $estatus = ($loja['estatus'] == 'A')? 'Ativo':'Inativo';
                       $class = ($loja['estatus'] == 'A')? "class='active'":"class='danger'";
                 echo "<tr $class><td><b>".$i++."</b></td>"
                        . "<td><a href='descCliente.php?cliente=".$loja['idCliente']."'>".$loja['nomeCliente']."</a></td>"
                        . "<td>".$loja['bairroCliente']."</td>"
                        . "<td>".$loja['telCliente']."</td>"
                        . "<td>".$estatus."</td>"
                        . "<td><a href='altCliente.php?cliente=".$loja['idCliente']."' class='btn btn-primary'>Alterar</a></td>"
                        . "<td><a href='desativaCliente.php?cliente=".$loja['idCliente']."' class='btn btn-danger'>Ativar / Desativar</a></td>"
                        . "</tr>";
            }
        } catch (Exception $ex) {
            echo "Erro: ". $ex->getMessage();
        }
    }

    function comboClientes($idUser){
        try{
            $buscaCli = $this->pdo->prepare("SELECT DISTINCT nomeCliente,idCliente,bairroCliente "
                    . "FROM  clientes "
                    . "WHERE idUsuario=:idUser and estatus = :estatus ORDER BY nomeCliente");
            $buscaCli->execute(array(
                ':idUser' => $idUser,
                ':estatus' => 'A'
            ));
            while($clientes = $buscaCli->fetch(PDO::FETCH_ASSOC)) {

                echo "<option value='" .$clientes['idCliente']."'>".$clientes['nomeCliente']." - ". $clientes['bairroCliente'] ."</option>";
            }
        } catch (Exception $ex) {
            echo 'Error: '.$ex->getMessage();
        }
    }
    
    function comboServClientes($idCliente){
        try{
            $servCli = $this->pdo->prepare("SELECT s.idServico,s.nomeServico,sc.idClientes "
                    . "FROM tb_serv_cli sc "
                    . "INNER JOIN servicos s ON sc.idServicos = s.idServico "
                    . "WHERE sc.idClientes = :idCliente  AND sc.estatus = 'A'");
            $servCli->execute(array(
                ':idCliente' => $idCliente
            ));
            while($serv = $servCli->fetch(PDO::FETCH_NUM)) {

                echo "<option value='" .$serv[0]."'>".$serv[1]."</option>";
            }
        } catch (Exception $ex) {
            echo "Erro: ". $ex->getMessage();
        }
    }
    
    function comboBairro(){
        try{
            $buscaBairro = $this->pdo->prepare("SELECT * "
                    . "FROM  bairro WHERE estatus = :estatus"
                    . " ORDER BY nomeBairro");
            $buscaBairro->execute(array(
                ':estatus' => 'A'
            ));
            while($bairros = $buscaBairro->fetch(PDO::FETCH_ASSOC)) {

                echo "<option value='" .$bairros['nomeBairro']."'>".$bairros['nomeBairro']."</option>";
            }
        } catch (Exception $ex) {
            echo 'Error: '.$ex->getMessage();
        }
    }
    
    function imageUpload($fileName,$fileTmp,$destino){
        // verifica se foi enviado um arquivo 

	/*echo "Você enviou o arquivo: <strong>" . $file['arquivo']['name'] . "</strong><br />";
	echo "Este arquivo é do tipo: <strong>" . $file['arquivo']['type'] . "</strong><br />";
	echo "Temporáriamente foi salvo em: <strong>" . $file['arquivo']['tmp_name'] . "</strong><br />";
	echo "Seu tamanho é: <strong>" . $file['arquivo']['size'] . "</strong> Bytes<br /><br />";*/

	// Pega a extensao
	$extensao = strrchr($fileName,'.');

	// Converte a extensao para mimusculo
	 $extensao = strtolower($extensao);

	// Somente imagens, .jpg;.jpeg;.gif;.png
	// Aqui eu enfilero as extesões permitidas e separo por ';'
	// Isso server apenas para eu poder pesquisar dentro desta String
         
	if(strstr('.jpg;.jpeg;.gif;.png', $extensao)){
            
		// Cria um nome único para esta imagem
		// Evita que duplique as imagens no servidor.
		$novoNome = md5(microtime().$fileName) . $extensao;
		
		// Concatena a pasta com o nome
		 $destino = "img/$destino/" . $novoNome; 
		
		// tenta mover o arquivo para o destino
		move_uploaded_file($fileTmp, $destino);
                
                        return $novoNome;
			
        }
    }
   
    function verificaDonoCliente($idCliente,$idUsuario){
        try{
            $verifica = $this->pdo->prepare("SELECT * FROM clientes WHERE idUsuario = :idUsuario and idCliente = :idCliente");
            $verifica->execute(array(
                ':idUsuario' => $idUsuario,
                ':idCliente' => $idCliente
            ));
            if($verifica->rowCount() > 0){
                return true;
            }
        } catch (Exception $ex) {
            echo "Erro: ".$ex->getMessage();
        }
    }
    
    function verificaResposta($idAvaliacao){
        try{
            $vResposta = $this->pdo->prepare("SELECT * FROM resposta WHERE idAvaliacao = :idAvaliacao");
            $vResposta->execute(array(
                ':idAvaliacao' => $idAvaliacao
            ));
            if($vResposta->rowCount() > 0){
                return true;
            }
        } catch (Exception $ex) {
            echo "Erro: ".$ex->getMessage();
        }
       
    }
    
    function respondeAvaliacao($resposta,$idAvaliacao) {
        try{
            $responde = $this->pdo->prepare("INSERT INTO resposta(resposta,idAvaliacao,data) VALUES(:resposta,:idAvaliacao,:data)");
            $data = date('Y-m-d');
            $responde->execute(array(
                ':resposta' => $resposta,
                ':idAvaliacao' => $idAvaliacao,
                ':data' => $data
            ));
        } catch (Exception $ex) {
            echo "Erro: ".$ex->getMessage();
        }
    }
    
    function mostraResposta($idAvaliacao) {
        $mostraR = $this->pdo->prepare("SELECT * FROM resposta WHERE idAvaliacao = :idAvaliacao");
        $mostraR->execute(array(
            ':idAvaliacao' => $idAvaliacao
        ));
        $mostra1 = $mostraR->fetch(PDO::FETCH_ASSOC);
        
            return $mostra1['resposta'];
        
    }
    
    function mostraAvaliacao($idCliente,$idUsuario){
        try{
            $mostra = $this->pdo->prepare("SELECT av.avaliacao,u.nomeUsuario,av.comentario,av.idAvaliacao,s.nomeServico
                                            FROM avaliacao av INNER JOIN usuarios u ON av.idUsuario = u.idUsuario 
                                            INNER JOIN servicos s ON av.idServico = s.idServico
                                            WHERE idCliente = :idCliente ORDER BY av.idAvaliacao DESC");
            $mostra->execute(array(
                ':idCliente' => $idCliente
            ));
            
            while($mosta1 = $mostra->fetch(PDO::FETCH_NUM)) {
                ?>
                <div class="media">
                    <h4><?=$mosta1[4]?></h4>
                    <a class="pull-left" href="#">
                        <?php
                            switch ($mosta1[0]) {
                                case 10:
                                    echo '<label class="radio-inline" >
                                                <span class="label label-danger">
                                                    Péssimo
                                                </span>
                                            </label>';
                                    break;
                                case 30:
                                    echo '<label class="radio-inline" >
                                                <span class="label label-warning">
                                                    Ruim
                                                </span>
                                            </label>';
                                    break;
                                case 50:
                                    echo '<label class="radio-inline" >
                                                <span class="label label-default">
                                                    Regular
                                                </span>
                                            </label>';
                                    break;
                                case 70:
                                    echo '<label class="radio-inline" >
                                                <span class="label label-info">
                                                    Ótimo
                                                </span>
                                            </label>';
                                    break;
                                case 100:
                                    echo '<label class="radio-inline" >
                                                <span class="label label-success">
                                                    Exelente
                                                </span>
                                            </label>';
                                    break;

                                default:
                                    break;
                            }
                        ?>
                    </a>
                    
                    <div class="media-body">
                        <h4 class="media-heading"><?=$mosta1[1]?>
<!--                            <small>August 25, 2014 at 9:30 PM</small>-->
                        </h4>
                      <?=$mosta1[2]?>
                    </div>
                </div>
                <?php
                if(!$this->verificaResposta($mosta1[3])){
                    if($this->verificaDonoCliente($idCliente, $idUsuario)){
                    ?>
                    <div class="well">
                    <h4>Resposta:</h4>
                    <form role="form" method="post" action="descCliente.php">
                       
                        <div class="form-group">
                           <textarea id="inputEmail3" class="form-control" maxlength="255" name="resposta" rows="3"></textarea>
                           <input type="hidden" name="idAvaliacao" value="<?=$mosta1[3];?>">
                        </div>
                        <button type="submit" class="btn btn-primary">Responder</button>
                    </form>
                </div>
                <?php
                    }
                }else{
                    ?>
                
                    <div class="media">
                            <a class="pull-left" href="#">
                                <label class="radio-inline" >
                                    <span class="label label-primary">
                                        Resposta
                                    </span>
                                </label>
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading"><?=$this->getNomeCli();?>
<!--                                    <small>August 25, 2014 at 9:30 PM</small>-->
                                </h4>
                               <?=$this->mostraResposta($mosta1[3])?>
                            </div>
                        </div>
                        
                    <?php
                }
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }
       
    function verificaMedia($idCliente){
        try{
            $verificaMedia = $this->pdo->prepare('SELECT AVG(av.avaliacao) '
                    . 'FROM avaliacao av INNER JOIN clientes c ON av.idCliente = c.idCliente '
                    . 'WHERE c.idCliente = :idCliente');
            $verificaMedia->execute([':idCliente' => $idCliente]);
            $media = $verificaMedia->fetch(PDO::FETCH_NUM);
            
            return $media[0];
        } catch (Exception $ex) {
            echo 'Erro: '. $ex->getMessage();
        }
    }
            
    function getIdCliente(){
        return $_SESSION['idCliente'];
    }

    function getNomeCli(){
        return $_SESSION['nomeCliente'];
    }
    
    function getEnd(){
        return $_SESSION['endCliente'];
    }
    
    function getNum(){
        return $_SESSION['numCliente'];
    }
    
    function getBairro(){
        return $_SESSION['bairroCliente'];
    }
    
    function getCep(){
        return $_SESSION['cepCliente'];
    }
    
    function getTel(){
        return $_SESSION['telCliente'];
    }
    
    function getCel(){
        return $_SESSION['celCliente'];
    }
    
    function getDesc(){
        return $_SESSION['descCliente'];
    }
    
    function getEstatus(){
        return $_SESSION['estatus'];
    }
    
    function getImage1() {
        return $_SESSION['image1'];
    }
    
    function getImage2() {
        return $_SESSION['image2'];
    }
    
    function getImage3() {
        return $_SESSION['image3'];
    }
}
    