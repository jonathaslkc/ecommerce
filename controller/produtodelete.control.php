<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of funcionariodelete
 *
 * @author Jonathas
 */
    ///////////////////////////////////TELA PARA CADASTRAR/EDITAR/EXCLUIR USUARIO//////////////////////////////////////////////////
    if(isset($_GET['acaoproddel']) && $_GET['acaoproddel'] == 'deletar'): //Ação de deletar
        
        $id = $_GET['id'];
        
        try{
            ## INÍCIO TRANSACTION ON OPERATION
            DB::getInstance()->beginTransaction();
            #######
            
            if ($preco->delete2($id)):
                #$res = $barra->find($id);
                #if ($barra->delete($res->codbarra_id)):
                if ($barra->delete2($id)):
                    if ($itens->delete($id)):
                        header('location: listagem-itens.php');
                    endif;
                endif;
            endif;

            ## COMMIT ON TRANSACTION
            DB::getInstance()->commit();
            #######

            $msgreturn='Sucesso!<br>O Produto foi cadastrado com êxito!';
            $tipo='success';
            return true;
        } catch (Exception $e) {

            ## ROLLBACK ON TRANSACTION
            DB::getInstance()->rollBack();
            #######

            $msgreturn='Atenção!<br>Não foi possível prosseguir com o pedido... Nada foi alterado!';
            $tipo='alert';
            echo $e->getMessage();
            return false;
        }
    endif;
    
    /////////////////////////////////// TELA PARA EXCLUIR CODBARRAS //////////////////////////////////////////////////
    if(isset($_GET['acaoCodBarras2']) && $_GET['acaoCodBarras2'] == 'deletar'): //Ação de deletar
        $id = $_GET['id'];
        $id2 = $_GET['id2'];

        try {
            #echo '<script>alert("'.$id.' - '.$id2.'")</script>';
            if ($barra->delete($id2)):
                header('location: editor-itens.php?acao=editar&id='.$id);
            else:
                $msgreturn='Atenção!<br>Não foi possível prosseguir com o pedido... Nada foi alterado!';
                $tipo='alert';
            endif;
        } catch (Exception $e) {
            $msgreturn='Atenção!<br>Não foi possível prosseguir com o pedido... Nada foi alterado!';
            $tipo='alert';
            echo $e->getMessage();
        }
    endif;