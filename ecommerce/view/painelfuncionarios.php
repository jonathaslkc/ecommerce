<?php
    $titulopage = 'ADM Ecommerce - Funcionários';
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
    
    // Insert
        include '../controller/funcionarioinsert.control.php';

?>

<body>
    
    <?php include_once 'header.php'; ?>
    
    <section>
        <div class="container">
            <div class="row">

                <div class="col-sm-12">
                    <div class="blog-post-area">
                        <h2 class="title text-center">Painel Administrativo</h2>
                        
                        <div class="breadcrumbs">
                            <ol class="breadcrumb">
                                <li><a href="administrativo.php">Início</a></li>
                                <li class="active">Painel Funcionários</li>
                            </ol>
			</div><!--/breadcrums-->
                        
                        <div class="single-blog-post">
                            <h3>Painel Funcionários</h3>
                            <br>
                            <div class="container">
                                <div class="row text-center">
                                    <div class="col-sm-8">
                                        <div class="shopper-info"><!--login form-->
                                            <h2>Cadastrar Funcionário</h2>
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
                                                                <input type="text" name="nome" required maxlength="45" placeholder="Digite aqui seu nome" />
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <label>Sobrenome</label><label class="text-danger">*</label>
                                                                <input type="text" name="sobrenome" required maxlength="45" placeholder="Digite aqui seu sobrenome" />
                                                            </div>
                                                        </div>
                                                        <label>Email</label><label class="text-danger">*</label>
                                                        <input type="email" name="email" required maxlength="50" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" placeholder="Digite corretamente seu email. Ex.: test@teste.com" />
                                                        <label>CEP</label><label class="text-danger">*</label>
                                                        <div class="text-danger text-left">Somente números</div>
                                                        <div class="row">
                                                            <div class="col-sm-9">
                                                                <input type="number" name="txtnome" id="txtnome" required placeholder="Digite aqui CEP" onblur="getDados();" />
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <input type="button" class="btn btn-warning" name="btnPesquisar" value="Pesquisar CEP" onclick="getDados();"/>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div id="Resultado" class="col-sm-12"></div>
<!--                                                            <div class="col-sm-6">
                                                                <label>Logradouro</label>
                                                                <input type="text" name="logradouro" id="rua" placeholder="Digite aqui o logradouro" />
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <label>Bairro</label>
                                                                <input type="text" name="bairro" id="bairro" readonly placeholder="Bairro">
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <label>Cidade</label>
                                                                <input type="text" name="cidade" id="cidade" readonly placeholder="Cidade">
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <label>Estado</label>
                                                                <input type="text" name="uf" id="uf" readonly placeholder="Estado">
                                                                <input type="text" name="ibge" id="ibge" hidden value="">
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <div class="text-danger text-left">Preenchimento automático. Inclua o CEP primeiro!</div>
                                                            </div>-->
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-10">
                                                                <label>Complemento</label>
                                                                <input type="text" name="complemento" placeholder="Digite aqui o complemento" />  
                                                            </div>
                                                            <div class="col-sm-2">
                                                                <label>Número</label>
                                                                <input type="text" name="nro_imovel" placeholder="Imóvel" />  
                                                            </div>
                                                        </div>
                                                        <label>Adicionar Foto</label>
                                                        <input type="file" name="foto" accept="image/*">
                                                        <div class="text-danger text-left">Obs.: Imagem com até 2mb de tamanho.</div>
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
                                                                <input type="text" name="username" required maxlength="20" placeholder="Digite um nome de usuário de acesso ao Sistema" />
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <label>Senha</label>
                                                                <input type="password" name="password" required maxlength="40" id="password" placeholder="Digite sua senha" />
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
                                                                <input type="radio" name="perfil" id="perfil" value="5" checked>
                                                            </div>
                                                            <div class="col-sm-2">
                                                                <label>Auxiliar</label>
                                                                <input type="radio" name="perfil" id="perfil" value="4">
                                                            </div>
                                                            <div class="col-sm-2">
                                                                <label>Funcional</label>
                                                                <input type="radio" name="perfil" id="perfil" value="3">
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <label>Gerente</label>
                                                                <input type="radio" name="perfil" id="perfil" value="2">
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <label>Master</label>
                                                                <input type="radio" name="perfil" id="perfil" value="1">
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
                                                            <option value="1" selected>Sim</option>
                                                            <option value="0">Não</option>
                                                        </select><br><br>
                                                        <label>Informações</label><br>
                                                        <div class="text-left">
                                                            <label class="text-danger">I - Os campos com o ' *  ' (asterisco) são de preenchimento obrigatório!</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <input type="submit" name="cadastrarfuncionario" class="btn btn-primary btn-block" value="Cadastrar Funcionário" />
                                                
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 text-center">
                                        <h2>Comandos Atalho</h2>
                                        <a href="listagem-funcionarios.php" target="_blank"><i class="btn btn-lg fa fa-5x fa-list-alt"></i> Listagem de Funcionários</a><br>
                                        <a href=""><i class="btn btn-lg fa fa-5x fa-user"></i> Ir para Gerenciador de Usuários</a>
                                    </div>
                            </div><br>
                        </div>
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