<?php
require_once 'class/classCliente.php';
 $cliente = new classCliente();
?>
<div class="list-group">
   
    <a href="userPerfil.php" class="list-group-item">Alterar Dados</a>
    <a href="userAlterarSenha.php" class="list-group-item">Alterar Senha</a>
</div>
<br>
<?php
if($usuario->getTpUser() == 1){
?>
<div class="list-group">  
    <a href="listaUsers.php" class="list-group-item">Ativar/Desativar Administrador</a>
    <a href="gerarRelat.php" class="list-group-item">Relatórios</a>
</div>
<br>

<div class="list-group">
  
    <a href="cadServAdm.php" class="list-group-item">Cadastrar Especialidades Médicas</a>
    <a href="listaServicoAdm.php" class="list-group-item">Listar Especialidades Médicas</a>
</div>
<br>
<div class="list-group">
    <a href="cadBairro.php" class="list-group-item">Cadastrar Bairro</a>
    <a href="listaBairro.php" class="list-group-item">Listar Bairro</a>

</div>
<br>
<?php
}else{
    ?>
    <div class="list-group">
        <a href="cadCliente.php" class="list-group-item">Cadastrar Clínica</a>

        <!--<a href="listaLoja.php" class="list-group-item">Listar Lojas</a>-->
        <!--<a href="altCliente.php" class="list-group-item">Alterar Loja</a>
        <a href="desativaCliente.php" class="list-group-item">Ativa/Desativar Loja</a>-->
    </div>
<?php
}
if($cliente->verificaCliente($usuario->getIdUser())){
?>
<div class="list-group">
           <a href="listaLoja.php" class="list-group-item">Listar Clínicas</a>
            <!--<a href="altCliente.php" class="list-group-item">Alterar Loja</a>
            <a href="desativaCliente.php" class="list-group-item">Ativa/Desativar Loja</a>-->
</div>
<br>
<div class="list-group">
            <a href="cadServico.php" class="list-group-item">Vincular Especialidades Médicas</a>
            <a href="listaServico.php" class="list-group-item">Listar Especialidades Médicas Vinculados</a>
</div>
<br>
        <?php
        }
            ?>


<div class="list-group">
            
    <a href="logout.php" class="list-group-item">Logout</a>
</div>