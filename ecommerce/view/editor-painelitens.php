<?php
    $titulopage = 'ADM Ecommerce - Slider';
    $nomemenu   = 'admin';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php include_once 'header/head.php'; ?>
</head><!--/head-->

<?php
    if(isset($_SESSION['logado'])  && ($_SESSION['tipousuario'] == '1')):  //TESTAR SE ESTÁ LOGADO
        
        else:
            header('location: acessonegado.php');
    endif;
    
    
    if(isset($_POST['AlterarItem'])):
        if(empty($_POST['srcimg']) && (empty($_FILES['arquivo']['name']))):
            if(isset($_POST['alterarCat'])):
                if ($_POST['alterarCat']):
                    // ALTERA CATEGORIA, SEM ATUALIZAÇÃO DE IMAGEM
                    $id             = $_GET['id'];
                    $img            = $_POST['linkimg2'];
                    $codigo         = $_POST['coditem'];
                    $fkcategoria    = $_POST['passaValor'];
                    $fksubcategoria = $_POST['recebeValor'];
                    $nome           = $_POST['nome'];
                    $marca          = $_POST['marca'];
                    $descricao      = $_POST['descricao'];
                    $valor          = $_POST['valor'];
                    $destaque       = $_POST['destaque'];
                    $ativo          = $_POST['ativo'];

                    $itens->setImg($img);
                    $itens->setCodigo($codigo);
                    $itens->setDescricao($descricao);
                    $itens->setDestaque($destaque);
                    $itens->setFksubcategoria($fksubcategoria);
                    $itens->setFkcategoria($fkcategoria);
                    $itens->setMarca($marca);
                    $itens->setNome($nome);
                    $itens->setValor($valor);
                    $itens->setAtivo($ativo);

                    if ($itens->update($id)):
                        echo "<script>alert('Pode Gravar')</script>";
                        #header('location: painelslider.php');
                    else:
                        echo "<script>alert('Não pode gravar')</script>";
                    endif;
                endif;
            else:
                // NÃO ALTERA CATEGORIA, SEM ATUALIZAÇÃO DE IMAGEM
                $id             = $_GET['id'];
                $img            = $_POST['linkimg2'];
                $codigo         = $_POST['coditem'];
                $fkcategoria    = $_POST['mostracategoria'];
                $fksubcategoria = $_POST['mostrasubcategoria'];
                $nome           = $_POST['nome'];
                $marca          = $_POST['marca'];
                $descricao      = $_POST['descricao'];
                $valor          = $_POST['valor'];
                $destaque       = $_POST['destaque'];
                $ativo          = $_POST['ativo'];

                $itens->setImg($img);
                $itens->setCodigo($codigo);
                $itens->setDescricao($descricao);
                $itens->setDestaque($destaque);
                $itens->setFksubcategoria($fksubcategoria);
                $itens->setFkcategoria($fkcategoria);
                $itens->setMarca($marca);
                $itens->setNome($nome);
                $itens->setValor($valor);
                $itens->setAtivo($ativo);

                if ($itens->update($id)):
                    echo "<script>alert('Pode Gravar')</script>";
                    #header('location: painelslider.php');
                else:
                    echo "<script>alert('Não pode gravar')</script>";
                endif;
            endif;
            
        else:
            if(empty($_POST['srcimg'])):
                if(isset($_POST['alterarCat'])):
                    if ($_POST['alterarCat']):
                        // ALTERA CATEGORIA, COM ATUALIZAÇÃO DE IMAGEM FILE
                        $_UP['pasta'] = 'images/uploads/itens/';// Pasta onde o arquivo vai ser salvo
                        // Tamanho máximo do arquivo (em Bytes)
                        $_UP['tamanho'] = 1024 * 1024 * 2; // 2Mb
                        // Array com as extensões permitidas
                        $_UP['extensoes'] = array('jpg', 'png', 'gif');
                        // Renomeia o arquivo? (Se true, o arquivo será salvo como .jpg e um nome único)
                        $_UP['renomeia'] = false;
                        // Array com os tipos de erros de upload do PHP
                        $_UP['erros'][0] = 'Não houve erro';
                        $_UP['erros'][1] = 'O arquivo no upload é maior do que o limite do PHP';
                        $_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especifiado no HTML';
                        $_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
                        $_UP['erros'][4] = 'Não foi feito o upload do arquivo';
                        // Verifica se houve algum erro com o upload. Se sim, exibe a mensagem do erro
                        if ($_FILES['arquivo']['error'] != 0) :
                            die("Não foi possível fazer o upload, erro:" . $_UP['erros'][$_FILES['arquivo']['error']]);
                            exit; // Para a execução do script
                        endif;
                        // Caso script chegue a esse ponto, não houve erro com o upload e o PHP pode continuar
                        // Faz a verificação da extensão do arquivo
                        $extensao = strtolower(end(explode('.', $_FILES['arquivo']['name'])));
                        if (array_search($extensao, $_UP['extensoes']) === false) :
                            echo "<script>alert('Por favor, envie arquivos com as seguintes extensões: jpg, png ou gif')</script>";
                            exit;
                        endif;
                        // Faz a verificação do tamanho do arquivo
                        if ($_UP['tamanho'] < $_FILES['arquivo']['size']) :
                            echo "<script>alert('O arquivo enviado é muito grande, envie arquivos de até 2Mb.')</script>";
                            exit;
                        endif;
                        // O arquivo passou em todas as verificações, hora de tentar movê-lo para a pasta
                        // Primeiro verifica se deve trocar o nome do arquivo
                        if ($_UP['renomeia'] == true) :
                            // Cria um nome baseado no UNIX TIMESTAMP atual e com extensão .jpg
                            $nome_final = md5(time()).'.jpg';
                        else:
                            // Mantém o nome original do arquivo
                            $nome_final = $_FILES['arquivo']['name'];
                        endif;

                        // Depois verifica se é possível mover o arquivo para a pasta escolhida
                        if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta'] . $nome_final)):
                            // Upload efetuado com sucesso, exibe uma mensagem e um link para o arquivo

                            $id             = $_GET['id'];
                            $img            = $_UP['pasta'].$nome_final;
                            $codigo         = $_POST['coditem'];
                            $fkcategoria    = $_POST['passaValor'];
                            $fksubcategoria = $_POST['recebeValor'];
                            $nome           = $_POST['nome'];
                            $marca          = $_POST['marca'];
                            $descricao      = $_POST['descricao'];
                            $valor          = $_POST['valor'];
                            $destaque       = $_POST['destaque'];
                            $ativo          = $_POST['ativo'];

                            $itens->setCodigo($codigo);
                            $itens->setDescricao($descricao);
                            $itens->setDestaque($destaque);
                            $itens->setFksubcategoria($fksubcategoria);
                            $itens->setFkcategoria($fkcategoria);
                            $itens->setMarca($marca);
                            $itens->setNome($nome);
                            $itens->setImg($img);
                            $itens->setValor($valor);
                            $itens->setAtivo($ativo);

                            if ($itens->update($id)):
                                echo "<script>alert('Pode Gravar!')</script>";
                                #header('location: painelslider.php');
                            else:
                                echo "<script>alert('Não pode gravar')</script>";
                            endif;
                        else:
                            // Não foi possível fazer o upload, provavelmente a pasta está incorreta
                            echo "<script>alert('Não foi possível enviar o arquivo, tente novamente')</script>";
                        endif;
                    endif;
                else:
                    // NÃO ALTERA CATEGORIA, COM ATUALIZAÇÃO DE IMAGEM FILE
                    $_UP['pasta'] = 'images/uploads/itens/';// Pasta onde o arquivo vai ser salvo
                    // Tamanho máximo do arquivo (em Bytes)
                    $_UP['tamanho'] = 1024 * 1024 * 2; // 2Mb
                    // Array com as extensões permitidas
                    $_UP['extensoes'] = array('jpg', 'png', 'gif');
                    // Renomeia o arquivo? (Se true, o arquivo será salvo como .jpg e um nome único)
                    $_UP['renomeia'] = false;
                    // Array com os tipos de erros de upload do PHP
                    $_UP['erros'][0] = 'Não houve erro';
                    $_UP['erros'][1] = 'O arquivo no upload é maior do que o limite do PHP';
                    $_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especifiado no HTML';
                    $_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
                    $_UP['erros'][4] = 'Não foi feito o upload do arquivo';
                    // Verifica se houve algum erro com o upload. Se sim, exibe a mensagem do erro
                    if ($_FILES['arquivo']['error'] != 0) :
                        die("Não foi possível fazer o upload, erro:" . $_UP['erros'][$_FILES['arquivo']['error']]);
                        exit; // Para a execução do script
                    endif;
                    // Caso script chegue a esse ponto, não houve erro com o upload e o PHP pode continuar
                    // Faz a verificação da extensão do arquivo
                    $extensao = strtolower(end(explode('.', $_FILES['arquivo']['name'])));
                    if (array_search($extensao, $_UP['extensoes']) === false) :
                        echo "<script>alert('Por favor, envie arquivos com as seguintes extensões: jpg, png ou gif')</script>";
                        exit;
                    endif;
                    // Faz a verificação do tamanho do arquivo
                    if ($_UP['tamanho'] < $_FILES['arquivo']['size']) :
                        echo "<script>alert('O arquivo enviado é muito grande, envie arquivos de até 2Mb.')</script>";
                        exit;
                    endif;
                    // O arquivo passou em todas as verificações, hora de tentar movê-lo para a pasta
                    // Primeiro verifica se deve trocar o nome do arquivo
                    if ($_UP['renomeia'] == true) :
                        // Cria um nome baseado no UNIX TIMESTAMP atual e com extensão .jpg
                        $nome_final = md5(time()).'.jpg';
                    else:
                        // Mantém o nome original do arquivo
                        $nome_final = $_FILES['arquivo']['name'];
                    endif;
                    // Depois verifica se é possível mover o arquivo para a pasta escolhida
                    if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta'] . $nome_final)):
                        // Upload efetuado com sucesso, exibe uma mensagem e um link para o arquivo
                        $id             = $_GET['id'];
                        $img            = $_UP['pasta'].$nome_final;
                        $codigo         = $_POST['coditem'];
                        $fkcategoria    = $_POST['mostracategoria'];
                        $fksubcategoria = $_POST['mostrasubcategoria'];
                        $nome           = $_POST['nome'];
                        $marca          = $_POST['marca'];
                        $descricao      = $_POST['descricao'];
                        $valor          = $_POST['valor'];
                        $destaque       = $_POST['destaque'];
                        $ativo          = $_POST['ativo'];

                        $itens->setCodigo($codigo);
                        $itens->setDescricao($descricao);
                        $itens->setDestaque($destaque);
                        $itens->setFksubcategoria($fksubcategoria);
                        $itens->setFkcategoria($fkcategoria);
                        $itens->setMarca($marca);
                        $itens->setNome($nome);
                        $itens->setImg($img);
                        $itens->setValor($valor);
                        $itens->setAtivo($ativo);

                        if ($itens->update($id)):
                            echo "<script>alert('Pode Gravar!')</script>";
                            #header('location: painelslider.php');
                        else:
                            echo "<script>alert('Não pode gravar')</script>";
                        endif;
                    else:
                        // Não foi possível fazer o upload, provavelmente a pasta está incorreta
                        echo "<script>alert('Não foi possível enviar o arquivo, tente novamente')</script>";
                    endif;
                endif;
            else:
                if(isset($_POST['alterarCat'])):
                    if ($_POST['alterarCat']):
                        // ALTERA CATEGORIA, COM ATUALIZAÇÃO DE IMAGEM TEXT
                        $id             = $_GET['id'];
                        $img            = $_POST['srcimg'];
                        $codigo         = $_POST['coditem'];
                        $fkcategoria    = $_POST['passaValor'];
                        $fksubcategoria = $_POST['recebeValor'];
                        $nome           = $_POST['nome'];
                        $marca          = $_POST['marca'];
                        $descricao      = $_POST['descricao'];
                        $valor          = $_POST['valor'];
                        $destaque       = $_POST['destaque'];
                        $ativo          = $_POST['ativo'];

                        $itens->setCodigo($codigo);
                        $itens->setDescricao($descricao);
                        $itens->setDestaque($destaque);
                        $itens->setFksubcategoria($fksubcategoria);
                        $itens->setFkcategoria($fkcategoria);
                        $itens->setMarca($marca);
                        $itens->setNome($nome);
                        $itens->setImg($img);
                        $itens->setValor($valor);
                        $itens->setAtivo($ativo);

                        if ($itens->update($id)):
                            echo "<script>alert('Pode Gravar".$img."')</script>";
                            #header('location: painelslider.php');
                        else:
                            echo "<script>alert('Não pode gravar')</script>";
                        endif;
                    endif;
                else:
                    // NÃO ALTERA CATEGORIA, COM ATUALIZAÇÃO DE IMAGEM TEXT
                    $id             = $_GET['id'];
                    $img            = $_POST['srcimg'];
                    $codigo         = $_POST['coditem'];
                    $fkcategoria    = $_POST['mostracategoria'];
                    $fksubcategoria = $_POST['mostrasubcategoria'];
                    $nome           = $_POST['nome'];
                    $marca          = $_POST['marca'];
                    $descricao      = $_POST['descricao'];
                    $valor          = $_POST['valor'];
                    $destaque       = $_POST['destaque'];
                    $ativo          = $_POST['ativo'];

                    $itens->setCodigo($codigo);
                    $itens->setDescricao($descricao);
                    $itens->setDestaque($destaque);
                    $itens->setFksubcategoria($fksubcategoria);
                    $itens->setFkcategoria($fkcategoria);
                    $itens->setMarca($marca);
                    $itens->setNome($nome);
                    $itens->setImg($img);
                    $itens->setValor($valor);
                    $itens->setAtivo($ativo);

                    if ($itens->update($id)):
                        echo "<script>alert('Pode Gravar".$img."')</script>";
                        #header('location: painelslider.php');
                    else:
                        echo "<script>alert('Não pode gravar')</script>";
                    endif;
                endif;
            endif;
        endif;
    endif;
?>

<body>
    <?php include_once 'header.php'; ?>

    <?php if(isset($_GET['acao']) && $_GET['acao'] == 'editar'):
        $id = (int)$_GET['id'];
        $resultado = $itens->find($id);
    endif;?>
    <section>
        <div class="container">
            <div class="row">

                <div class="col-sm-12">
                    <div class="blog-post-area">
                        <h2 class="title text-center">Painel Administrativo</h2>
                        <div class="single-blog-post">
                            <div class="container" >
                                <div class="row text-center">
                                    <div class="col-sm-8">
                                        <div class="shopper-info"><!--login form-->
                                            <h2>Atualizar Ítem</h2>
                                            <?php echo msg($msgreturn, $tipo); ?>
                                            <form method="post" action="" name="formCadEmpresa" id="formCadEmpresa" enctype="multipart/form-data">
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h3 class="panel-title">Informações Gerais</h3>
                                                    </div>
                                                    <div class="panel-body">
                                                        <input type="text" class="text-center" value="<?php echo $resultado->codigo.$resultado->id; ?>" readonly name="coditem" id="coditem" placeholder="Código do Ítem" />
                                                        <div class="row text-center">
                                                            <div class="col-sm-10 text-right">
                                                                <label for="alterarCat">Alterar Categoria e Subcategoria? </label>
                                                            </div>
                                                            <div class="col-sm-2 text-left">
                                                                <input type="checkbox" id="alterarCat" name="alterarCat">
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <label>Categoria</label>
                                                                <input type="text" class="form-control text-center" name="mostracategoria" readonly value="<?php echo $resultado->fkcategoria; ?>">
                                                                
                                                                <select id="passaValor" name="passaValor" onchange="getValor(this.value, 0)" class="input-block-level">
                                                                    <option value="0">Selecione a Categoria</option>
                                                                        <?php foreach($categoria->findAll() as $key => $valCatList):
                                                                            echo "<option value='".$valCatList->nome."'>".$valCatList->nome."</option>";
                                                                         endforeach; ?>
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <label>SubCategoria</label>
                                                                <input type="text" class="form-control text-center" name="mostrasubcategoria" readonly value="<?php echo $resultado->fksubcategoria; ?>"><br>
                                                                <select name="recebeValor" id="recebeValor" class="input-block-level">
                                                                    <option value="">Escolha Primeiro a Categoria</option>
                                                                </select><br><br>
                                                            </div>
                                                        </div>
                                                        <input type="text" name="nome" id="vbv" placeholder="Nome/Modelo..." />
                                                        <input type="text" name="marca" placeholder="Marca..." onblur="controle();" />
                                                        <textarea name="descricao" onclick="controle();" placeholder="Adicione uma descrição para o ítem [limite de 255 caractéris]..." maxlength="255"></textarea><br><br>
                                                        <input type="text" name="valor" placeholder="Valor do Ítem" onchange="controle();" />
                                                        <input type="number" name="quantidade" placeholder="Quantidade em Estoque" />
                                                        <label>Adicionar Imagem do Computador</label>
                                                        <input type="file" name="arquivo">
                                                        <label>Ou</label><br>
                                                        <label>Adicionar de Imagem Existente</label>
                                                        <input type="text" name="srcimg">
                                                        <div class="row text-center">
                                                            <div class="col-sm-6">
                                                                <label>Código de Barras</label>
                                                                <input type="text" name="codigobarras">
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <label>NCM</label>
                                                                <input type="text" name="ncm">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h3 class="panel-title">Peso e Dimensões do Ítem</h3>
                                                    </div>
                                                    <div class="panel-body">
                                                        <div class="row text-center">
                                                            <div class="col-sm-3">
                                                                <label>Peso (Kg)</label>
                                                                <input type="text" name="peso" value="Digite valor em Kg" />
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <label>Altura (cm)</label>
                                                                <input type="text" name="altura" value="Digite valor em cm" />
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <label>Largura (cm)</label>
                                                                <input type="text" name="largura" value="Digite valor em cm" />
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <label>Profundidade (cm)</label>
                                                                <input type="text" name="profundidade" value="Digite valor em cm" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                
                                                <input type="text" class="text-center" value="<?php echo $resultado->codigo.$resultado->id; ?>" readonly name="coditem" id="coditem" placeholder="Código do Ítem" />
                                                <div class="row text-center">
                                                    <div class="col-sm-6">
                                                        <label>Categoria</label>
                                                        <input type="text" class="form-control text-center" name="mostracategoria" readonly value="<?php echo $resultado->fkcategoria; ?>">
                                                        <label for="alterarCat">Alterar Categoria e Subcategoria? </label> <input type="checkbox" id="alterarCat" name="alterarCat">
                                                        <select id="passaValor" name="passaValor" onchange="getValor(this.value, 0)" class="input-block-level">
                                                            <option value="0">Selecione a Categoria</option>
                                                                <?php foreach($categoria->findAll() as $key => $valCatList):
                                                                    echo "<option value='".$valCatList->nome."'>".$valCatList->nome."</option>";
                                                                 endforeach; ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label>SubCategoria</label>
                                                        <input type="text" class="form-control text-center" name="mostrasubcategoria" readonly value="<?php echo $resultado->fksubcategoria; ?>"><br>
                                                        <select name="recebeValor" id="recebeValor" class="input-block-level">
                                                            <option value="">Escolha Primeiro a Categoria</option>
                                                        </select><br><br>
                                                    </div>
                                                </div>
                                                <input type="text" name="nome" value="<?php echo $resultado->nome; ?>" placeholder="Nome/Modelo..." />
                                                <input type="text" name="marca" value="<?php echo $resultado->marca; ?>" placeholder="Marca..." onblur="controle();" />
                                                <textarea name="descricao" onclick="controle();" placeholder="Adicione uma descrição para o ítem [limite de 255 caractéris]..." maxlength="255"><?php echo $resultado->descricao; ?></textarea><br><br>
                                                <input type="text" name="valor" placeholder="Valor do Ítem" value="<?php echo $resultado->valor; ?>" onchange="controle();" />
<!--                                                <input type="number" name="quantidade" placeholder="Quantidade em Estoque" />-->
                                                <label>Alterar para Imagem [Computador]:</label>
                                                <input type="file" name="arquivo">
                                                <label>Ou</label><br>
                                                <label>Alterar para Imagem [Galeria]:</label>
                                                <input type="text" name="srcimg">
                                                <label>Endereço da Imagem Atual:</label>
                                                <input type="text" name="linkimg2" readonly value="<?php echo $resultado->img; ?>">
                                                <div class="row text-center">
                                                    <div class="col-sm-6">
                                                        <label>Destaque? </label><br>
                                                        <label>Sim</label>
                                                        <input type="radio" name="destaque" value="s" <?php if ($resultado->destaque == 's'): echo ' checked ';endif; ?>>
                                                        <label>Não</label>
                                                        <input type="radio" name="destaque" value="n" <?php if($resultado->destaque == 'n'): echo ' checked ';endif; ?>>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label>Ativo? </label><br>
                                                        <label>Sim</label>
                                                        <input type="radio" name="ativo" value="1" <?php if ($resultado->ativo == '1'): echo ' checked ';endif; ?>>
                                                        <label>Não</label>
                                                        <input type="radio" name="ativo" value="0" <?php if($resultado->ativo == '0'): echo ' checked ';endif; ?>>    
                                                    </div>
                                                    
                                                </div>
                                                <input type="submit" name="AlterarItem" class="btn btn-primary btn-block" value="Alterar Ítem" />
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 text-center">
                                        <h2>Imagem Ítem</h2>
                                        <div class="form-control text-center" style="width: 350px; height: 350px">
                                            <img src='<?php echo $resultado->img; ?>' style="width:90%;height:90%">
                                        </div>
                                        <input type="text" name="" class="form-control" readonly value="<?php echo $resultado->img; ?>">
                                        <hr>
                                        <h2>Comandos de Atalho</h2>
                                        <a href="#" onclick="window.open('gallery-page.php', 'Titulo da Janela', 'STATUS=NO, TOOLBAR=NO, LOCATION=NO, DIRECTORIES=NO, RESISABLE=NO, SCROLLBARS=YES, TOP=10, LEFT=10, WIDTH=770, HEIGHT=400');"><i class="btn btn-lg fa fa-3x fa-picture-o"></i> Ver Galeria</a><br><br>
                                        <a href="painelcategoria.php"><i class="btn btn-lg fa fa-3x fa-pencil-square-o"></i> Ver Categoria</a><br><br>
                                        <a href="listagem-itens.php"><i class="btn btn-lg fa fa-3x fa-list-alt"></i> Todos os Ítens</a>
                                    </div>
                                </div>
                            </div><br>
                        </div>
                    </div><!--/blog-post-area-->
                </div>	
            </div>
        </div>
    </section>
	
    <?php include_once 'footer.php'; ?>

    
<script type="text/javascript">
   function getValor(valor){
    $("#recebeValor").html("<option value='0'>Carregando...</option>");
        setTimeout(function(){
            $("#recebeValor").load("class/ajaxCatSub.php",{id:valor});
        }, 500);
};
</script>
<script type="text/javascript">
function controle(){
    document.getElementById('coditem').value = document.formCadEmpresa.nome.value.substring(0,2) + document.formCadEmpresa.marca.value.substring(0,2);
}
</script>

    
    <script src="js/jquery.js"></script>
    <script src="js/price-range.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
    
    <script src="js/clipboard.js"></script>
    <script>
        var clipboard = new Clipboard('.btncopyimg');

        // Retorna um alert se copiar com sucesso.
        clipboard.on('success', function(e) {
           alert('Caminho da imagem com sucesso!');
        });
        // Retorna um alert se copiar com erro.
        clipboard.on('error', function(e) {
           alert('Houve um erro ou navegador não suportado');
        });
    </script>
    
</body>
</html>
