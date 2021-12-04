<?php
    $titulopage = 'ADM Ecommerce - Editor Funcionário';
    $nomemenu   = 'admin';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php include_once 'header/head.php'; ?>
</head><!--/head-->

<?php


    // Controle de Acesso Nível Master
        include '../controller/nivelacesso.control.php';
    
    // Update
        include '../controller/funcionarioupdate.control.php';
    
    // Select
        include '../controller/funcionarioselect.control.php';

?>

<body onload="getDados()">
    <?php include_once 'header.php'; ?>
    
    <section>
        <div class="container">
            <div class="row">

                <div class="col-sm-12">
                    <div class="blog-post-area">
                        <h2 class="title text-center">Painel Administrativo</h2>
                        
                        
                        <div class="single-blog-post">
                            <h3>Painel Funcionários</h3>
                            <br>
                            <div class="container">
                                <div class="row text-center">
                                    <div class="col-sm-8">
                                        <div class="shopper-info"><!--login form-->
                                            <h2>Editar Funcionário</h2>
                                            <?php echo msg($msgreturn, $tipo); ?>
                                            <form method="post" action="" name="formCadEmpresa" id="formCadEmpresa" enctype="multipart/form-data">
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h3 class="panel-title">Informações Gerais</h3>
                                                    </div>
                                                    <div class="panel-body">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <label>Nome</label><label class="text-danger">*</label>
                                                                <input type="text" name="nome" value="<?php echo $resultado->nome; ?>" required maxlength="45" placeholder="Digite aqui seu nome" />
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <label>Sobrenome</label><label class="text-danger">*</label>
                                                                <input type="text" name="sobrenome" value="<?php echo $resultado->sobrenome; ?>" required maxlength="45" placeholder="Digite aqui seu sobrenome" />
                                                            </div>
                                                        </div>
                                                        <label>Email</label><label class="text-danger">*</label>
                                                        <input type="email" name="email" value="<?php echo $resultado->email; ?>" required maxlength="50" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" placeholder="Digite corretamente seu email. Ex.: test@teste.com" />
                                                        <label>CEP</label><label class="text-danger">*</label>
                                                        <div class="text-danger text-left">Somente números</div>
                                                        <div class="row">
                                                            <div class="col-sm-9">
                                                                
                                                                <?php 
                                                                    $resultendereco = $endereco->find($resultado->endereco_id); 
                                                                ?>
                                                                
                                                                <input type="text" name="txtnome" id="txtnome" value="<?php echo $resultendereco->cep; ?>" required placeholder="Digite aqui CEP" onblur="getDados();" />
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <input type="button" class="btn btn-warning" name="btnPesquisar" value="Pesquisar CEP" onclick="getDados();"/>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div id="Resultado" class="col-sm-12"></div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-10">
                                                                <label>Complemento</label>
                                                                <input type="text" name="complemento" value="<?php echo $resultado->complemento; ?>" placeholder="Digite aqui o complemento" />  
                                                            </div>
                                                            <div class="col-sm-2">
                                                                <label>Número</label>
                                                                <input type="text" name="nro_imovel" value="<?php echo $resultado->nro_imovel; ?>" placeholder="Imóvel" />  
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h3 class="panel-title">Informações de Acesso<label class="text-danger">*</label></h3>
                                                    </div>
                                                    <div class="panel-body">
                                                        <div class="row text-center">
                                                            <div class="col-sm-6">
                                                                <label>Usuário</label>
                                                                <input type="text" name="username" value="<?php echo $resultado->username; ?>" required maxlength="20" placeholder="Digite um nome de usuário de acesso ao Sistema" />
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <label>Senha</label>
                                                                <input type="password" name="password" maxlength="40" id="password" placeholder="Digite sua senha" />
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <label>Repita Senha</label>
                                                                <input type="password" name="confirm_password" id="confirm_password" placeholder="Repita sua senha" />
                                                            </div>
                                                        </div>
                                                        <label>Perfil do Usuário</label>
                                                        <div class="row">
                                                            <div class="col-sm-2">
                                                                <label>Comum</label>
                                                                
                                                                <input type="radio" name="perfil" <?php if ($resultado->perfil_id == 5): echo ' checked '; endif; ?> id="perfil" value="5">
                                                            </div>
                                                            <div class="col-sm-2">
                                                                <label>Auxiliar</label>
                                                                <input type="radio" name="perfil" <?php if ($resultado->perfil_id == 4): echo ' checked '; endif; ?> id="perfil" value="4">
                                                            </div>
                                                            <div class="col-sm-2">
                                                                <label>Funcional</label>
                                                                <input type="radio" name="perfil" <?php if ($resultado->perfil_id == 3): echo ' checked '; endif; ?> id="perfil" value="3">
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <label>Gerente</label>
                                                                <input type="radio" name="perfil" <?php if ($resultado->perfil_id == 2): echo ' checked '; endif; ?> id="perfil" value="2">
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <label>Master</label>
                                                                <input type="radio" name="perfil" <?php if ($resultado->perfil_id == 1): echo ' checked '; endif; ?> id="perfil" value="1">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h3 class="panel-title">Outras Informações</h3>
                                                    </div>
                                                    <div class="panel-body">
                                                        <label>Ativo?</label>
                                                        <select name="ativo">
                                                            <option value="1" <?php if ($resultado->ativo == 1): echo ' selected '; endif; ?>>Sim</option>
                                                            <option value="0" <?php if ($resultado->ativo == 0): echo ' selected '; endif; ?>>Não</option>
                                                        </select><br><br>
                                                        <label>Informações</label><br>
                                                        <div class="text-left">
                                                            <label class="text-danger">I - Os campos com o ' *  ' (asterisco) são de preenchimento obrigatório!</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <input type="submit" name="editarfuncionario" class="btn btn-primary btn-block" value="Editar Funcionário" />
                                                
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 text-center">
                                        <h2>Comandos Adicionais</h2>
                                        <form method="post" action="" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                </div>
                                                <div class="col-sm-4 text-center">
                                                    <div class="form-control text-center" style="width:220px;height:100%;margin:20px 0px 0px 0px">
                                                        <img src='<?php echo '../'.$resultado->foto; ?>' style="width:200px;">
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                </div>
                                                <div class="col-sm-12"><br>
                                                    <label>Alterar Foto</label>
                                                    <input type="file" name="foto" accept="image/*">
                                                    <div class="text-danger text-left">Obs.: Imagem com até 2mb de tamanho.</div>
                                                </div>
                                            </div>
                                            <input type="submit" name="editarfuncionariofoto" class="btn btn-primary btn-block" value="Alterar Foto" />
                                        </form>
                                    </div>
                            </div><br>
                        </div>
                    </div><!--/blog-post-area-->
                        
                    </div><!--/blog-post-area-->
                </div>	
            </div>
        </div>
    </section>
	
    <?php include_once 'footer.php'; ?>

    
    <script src="../web/js/jquery.js"></script>
    <script src="../web/js/price-range.js"></script>
    <script src="../web/js/jquery.scrollUp.min.js"></script>
    <script src="../web/js/bootstrap.min.js"></script>
    <script src="../web/js/jquery.prettyPhoto.js"></script>
    <script src="../web/js/main.js"></script>
    
    <script src="../web/js/validatepassword.js"></script>
    <script type="text/javascript" src="../web/js/buscaCep2.js"></script>
    
</body>
</html>
