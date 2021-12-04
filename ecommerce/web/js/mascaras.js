/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(function(){
    $("#preco_venda,#preco_compra,#preco_custo,#preco_promocional,#categoria").maskMoney({
        symbol:'R$ ', 
        showSymbol:true, 
        thousands:'', 
        decimal:'.'
    });
});
$(function(){
    $("#desconto").maskMoney({
        symbol: ' (%) ',
        showSymbol:true,
        decimal:'.'
    });
});
$(function(){
    $("#peso,#altura,#largura,#profundidade").maskMoney({
        thousands:'', 
        decimal:'.', 
        precision:3
    });
});