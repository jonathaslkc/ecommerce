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
    
    // Delete
        include '../controller/funcionariodelete.control.php';
        
    // Update
        include '../controller/funcionarioupdate.control.php';


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
                                <li><a href="painelfuncionarios.php">Cadastro de funcionários</a></li>
                                <li class="active">Listagem de funcionários</li>
                            </ol>
			</div><!--/breadcrums-->
                        
                        <div class="single-blog-post">
                            <h3>Listagem de Funcionários</h3>
                            <br>
                            <div class="container" >
                                <div class="row text-center">
                                    <div class="col-sm-12 text-center">
                                        <div class="shopper-info text-left" >
                                            <form method="POST" name="" action="">
                                                <!-- <label>Organizar por: <a href='' title="Nome">*[A-Z]</a> - <a href='' title="Nome">*[Z-A]</a> - <a href=''>[Ativos]</a> - <a href=''>[Inativos]</a></label> -->
                                                <input type="text" name="buscaNome" placeholder="Pesquisar por Nome" autofocus>
                                            </form>
                                        </div>
                                        <div class="row" style="overflow:auto">
                                            <table class="table">
                                                <th>ID</th>
                                                <th>Nome Completo</th>
                                                <th>Endereço Completo</th>
                                                <th>Email</th>
                                                <th>Username</th>
                                                <th>Foto</th>
                                                <th>Ativo</th>
                                                <th>Ação</th>
                                                <?php
                                                    if (@$_POST['buscaNome']):
                                                        foreach($funcionario->findNome(@$_POST['buscaNome']) as $key => $resultfunc): 
                                                            echo '<tr>';
                                                                echo '<td>'.$resultfunc->funcionario_id.'</td>';
                                                                echo '<td class="text-left">'.$resultfunc->nome.' '.$resultfunc->sobrenome.'</td>';
                                                                
                                                                $resultendereco = $endereco->find($resultfunc->endereco_id);
                                                                
                                                                echo '<td class="text-left">'.utf8_encode($resultendereco->logradouro.', '.$resultfunc->nro_imovel.' - '.$resultendereco->bairro).'</td>';
                                                                echo '<td class="text-left">'.$resultfunc->email.'</td>';
                                                                echo '<td>'.$resultfunc->username.'</td>';
                                                                echo '<td><img src="../'.$resultfunc->foto.'" style="width:60px;"></td>';
                                                                echo '<td>';
                                                                    if($resultfunc->ativo == '1'):
                                                                        echo "<a href='listagem-funcionarios.php?acaoativafunc=altera&id=" . $resultfunc->funcionario_id . "' title='Desativar?' onclick='return confirm(\"Deseja realmente alterar para Desativado o Funcionário - " . $resultfunc->nome . " ?\")'><i class='fa fa-check-square fa-2x text-success'></i></a>";
                                                                    else:
                                                                        echo "<a href='listagem-funcionarios.php?acaodesativafunc=altera&id=" . $resultfunc->funcionario_id . "' title='Ativar?' onclick='return confirm(\"Deseja realmente alterar para Ativo o Funcionário - " . $resultfunc->nome . " ?\")'><i class='fa fa-ban fa-2x text-danger'></i></a>";
                                                                    endif;
                                                                echo '</td>';
                                                                echo '<td>';
                                                                    echo "<a class='btn btn-info btn-medium btn-block' target='_blank' href='editor-funcionario.php?acao=editar&id=" . $resultfunc->funcionario_id . "'>Editar</a>";
                                                                    echo "<a class='btn btn-danger btn-medium btn-block' href='listagem-funcionarios.php?acaoFuncdel=deletar&id=" . $resultfunc->funcionario_id . "' onclick='return confirm(\"Deseja realmente deletar " . $resultfunc->nome . " ?\")'>Deletar</a>";
                                                                echo '</td>';
                                                            echo '</tr>';
                                                        endforeach;
                                                    else:
                                                        foreach($funcionario->findAllnome() as $key => $resultfunc): 
                                                            echo '<tr>';
                                                            if($funcionario->findAllnome() == NULL):
                                                                echo 'Nenhum Funcionário Cadastrado!';
                                                            else:

                                                                echo '<td>'.$resultfunc->funcionario_id.'</td>';
                                                                echo '<td class="text-left">'.$resultfunc->nome.' '.$resultfunc->sobrenome.'</td>';

                                                                $resultendereco = $endereco->find($resultfunc->endereco_id);

                                                                echo '<td class="text-left">'.utf8_encode($resultendereco->logradouro.', '.$resultfunc->nro_imovel.' - '.$resultendereco->bairro).'</td>';
                                                                echo '<td class="text-left">'.$resultfunc->email.'</td>';
                                                                echo '<td>'.$resultfunc->username.'</td>';
                                                                echo '<td><img src="../'.$resultfunc->foto.'" style="width:60px;"></td>';
                                                                echo '<td>';
                                                                    if($resultfunc->ativo == '1'):
                                                                        echo "<a href='listagem-funcionarios.php?acaoativafunc=altera&id=" . $resultfunc->funcionario_id . "' title='Desativar?' onclick='return confirm(\"Deseja realmente alterar para Desativado o Funcionário - " . $resultfunc->nome . " ?\")'><i class='fa fa-check-square fa-2x text-success'></i></a>";
                                                                    else:
                                                                        echo "<a href='listagem-funcionarios.php?acaodesativafunc=altera&id=" . $resultfunc->funcionario_id . "' title='Ativar?' onclick='return confirm(\"Deseja realmente alterar para Ativo o Funcionário - " . $resultfunc->nome . " ?\")'><i class='fa fa-ban fa-2x text-danger'></i></a>";
                                                                    endif;
                                                                echo '</td>';
                                                                echo '<td>';
                                                                    echo "<a class='btn btn-info btn-medium btn-block' target='_blank' href='editor-funcionario.php?acao=editar&id=" . $resultfunc->funcionario_id . "'>Editar</a>";
                                                                    echo "<a class='btn btn-danger btn-medium btn-block' href='listagem-funcionarios.php?acaoFuncdel=deletar&id=" . $resultfunc->funcionario_id . "' onclick='return confirm(\"Deseja realmente deletar " . $resultfunc->nome . " ?\")'>Deletar</a>";
                                                                echo '</td>';
                                                            endif;
                                                            echo '</tr>';
                                                        endforeach;
                                                    endif;
                                                ?>
                                            </table>
                                        </div>
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

    
    <script src="../web/js/jquery.js"></script>
    <script src="../web/js/price-range.js"></script>
    <script src="../web/js/jquery.scrollUp.min.js"></script>
    <script src="../web/js/bootstrap.min.js"></script>
    <script src="../web/js/jquery.prettyPhoto.js"></script>
    <script src="../web/js/main.js"></script>
    
    <script type="text/javascript" src="../web/js/buscaNome.js"></script>
</body>
</html>
