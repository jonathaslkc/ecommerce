<?php
    $titulopage = 'Editor - Templax E-commerce';
    $nomemenu   = 'cadast';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    
<?php 
    // Head
        include_once 'header/head.php'; 

    // Update
        include '../controller/clienteupdate.control.php';
        
    // Select
        include '../controller/clienteselect.control.php';
?>
    
</head><!--/head-->

<body>

    <?php include_once 'header.php'; ?>

    
        <section id="cart_items">
            <div class="container">
                <div class="shopper-informations">
                    
                    <div class="breadcrumbs">
                        <ol class="breadcrumb">
                            <li><a href="minha-conta.php">Início</a></li>
                            <li class="active">Formulário de Edição de Cadastro</li>
                        </ol>
                    </div><!--/breadcrums-->
                        
                    <div class="row">
                        <div class="col-sm-2">
                        </div>
                        <div class="col-sm-8 clearfix">
                            <div class="bill-to">
                                <div class="row text-center">
                                    <div class="col-sm-12">
                                        <div class="shopper-info"><!--login form-->
                                            <h2>Formulário de Edição de Cadastro</h2>
                                            <?php echo msg($msgreturn, $tipo); ?>
                                            <form method="post" action="">
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h3 class="panel-title">Informações Gerais</h3>
                                                    </div>
                                                    <div class="panel-body">
                                                        <div class="row">
                                                            <div class="col-sm-5">
                                                                <label>Nome</label><label class="text-danger">*</label>
                                                                <input type="text" name="nome" required maxlength="45" value="<?php echo $resultEndCli->nome; ?>"/>
                                                            </div>
                                                            <div class="col-sm-7">
                                                                <label>Sobrenome</label><label class="text-danger">*</label>
                                                                <input type="text" name="sobrenome" required maxlength="45" value="<?php echo $resultEndCli->sobrenome ?>" />
                                                            </div>
                                                        </div><br>
                                                        <div class="row">
                                                            <div class="col-sm-7">
                                                                <label>Email/Login de Acesso Atual</label><label class="text-danger">*</label>
                                                                <p><b> <?php echo $resultEndCli->email; ?></b></p>  
                                                            </div>
                                                            <div class="col-sm-5">
                                                                <br>
                                                                <a class='btn btn-info btn-medium btn-block' data-toggle='modal' data-target='#modalAlteraEmailCli'>Alterar Email</a>
                                                            </div>
                                                        </div><br>
                                                        <div class="row">
                                                            <div class="col-sm-4">
                                                                <label>Celular</label><label class="text-danger">*</label>
                                                                <input type="text" id="celular" name="fone_movel" maxlength="15" value="<?php echo $resultEndCli->fone_movel; ?>" />  
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <label>Telefone</label>
                                                                <input type="text" id="telefone" name="fone_fixo" maxlength="14" value="<?php echo $resultEndCli->fone_fixo; ?>" />
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <label>Senha</label>
                                                                <a class='btn btn-info btn-medium btn-block' data-toggle='modal' data-target='#modalAlteraSenhaCli'>Alterar Senha</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <button type="submit" name="alteradadoscliente" class="btn btn-warning btn-block btn-lg">Alterar Dados de Acesso </button>
                                                
                                            </form>
                                        </div>
                                    </div>
                                </div><br>
                            </div>
                        </div>
                        <div class="col-sm-2">
                        </div>
                        
                        
                        <div class="modal fade" id="modalAlteraSenhaCli" tabindex="-1" role="dialog" aria-labelledby="modalAlteraSenhaCli" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form method="post" action="">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Alterar Senha</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="shopper-info">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <label>Nova Senha de Acesso</label><label class="text-danger">*</label>
                                                        <input type="password" required name="senha" id="password" />
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label>Confirmar Nova Senha</label><label class="text-danger">*</label>
                                                        <input type="password" name="senhac" id="confirm_password" />  
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <input type="submit" name="alterasenhacliente" onclick="return confirm('Deseja realmente alterar a senha?');" class="btn btn-warning btn-lg" value="Alterar">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="modal fade" id="modalAlteraEmailCli" tabindex="-1" role="dialog" aria-labelledby="modalAlteraEmailCli" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form method="post" action="">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Alterar Email</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="shopper-info">
                                                <div class="row">
                                                    <div class="col-sm-9">
                                                        <label>Novo Email/Login de Acesso </label><label class="text-danger">*</label>

                                                        <br><label id="recebeValor2"></label>
                                                        <input type="email" name="email" onblur="getValor(this.value, 0)" id="passaValor" required maxlength="50" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" placeholder="Digite corretamente seu email. Ex.: test@teste.com" />
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <br><br><input type="button" class="btn btn-warning" value="Verificar Email"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <input type="submit" name="alteraemailcliente" onclick="return confirm('Deseja realmente alterar o email?');" class="btn btn-warning btn-lg" value="Alterar">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        
                        
                    </div>
                </div>
            </div>
	</section> <!--/#cart_items-->
        
	
    <?php include_once 'footer.php'; ?>


<!-- Scripts -->
    <script type="text/javascript">
        function getValor(valor){
            $("#recebeValor2").html("<label class='text-warning'>Pesquisando...</label>");
            setTimeout(function(){
                $("#recebeValor2").load("../controller/ajax2.php",{id:valor});
            }, 500);
        };
    </script>

    <script src="../web/js/jquery.js"></script>
    <script src="../web/js/bootstrap.min.js"></script>
    <script src="../web/js/jquery.scrollUp.min.js"></script>
    <script src="../web/js/price-range.js"></script>
    <script src="../web/js/jquery.prettyPhoto.js"></script>
    <script src="../web/js/main.js"></script>
    
    <script src="../web/js/validatepassword.js"></script>
    <script src="../web/js/mascaratel.js"></script>
    
<!-- /Scripts -->
</body>
</html>