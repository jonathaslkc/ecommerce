<?php
class Boleto_Bancoob{
  // +----------------------------------------------------------------------+
  // | BoletoPhp - Vers�o Beta                                              |
  // +----------------------------------------------------------------------+
  // | Este arquivo est� dispon�vel sob a Licen�a GPL dispon�vel pela Web   |
  // | em http://pt.wikipedia.org/wiki/GNU_General_Public_License           |
  // | Voc� deve ter recebido uma c�pia da GNU Public License junto com     |
  // | esse pacote; se n�o, escreva para:                                   |
  // |                                                                      |
  // | Free Software Foundation, Inc.                                       |
  // | 59 Temple Place - Suite 330                                          |
  // | Boston, MA 02111-1307, USA.                                          |
  // +----------------------------------------------------------------------+
  
  // +----------------------------------------------------------------------+
  // | Originado do Projeto BBBoletoFree que tiveram colabora��es de Daniel |
  // | William Schultz e Leandro Maniezo que por sua vez foi derivado do	  |
  // | PHPBoleto de Jo�o Prado Maia e Pablo Martins F. Costa                |
  // |                                                                      |
  // | Se vc quer colaborar, nos ajude a desenvolver p/ os demais bancos :-)|
  // | Acesse o site do Projeto BoletoPhp: www.boletophp.com.br             |
  // +----------------------------------------------------------------------+
  
  // +----------------------------------------------------------------------+
  // | Equipe Coordena��o Projeto BoletoPhp: <boletophp@boletophp.com.br>   |
  // | Desenvolvimento Boleto BANCOOB/SICOOB: Marcelo de Souza              |
  // | Ajuste de algumas rotinas: Anderson Nuernberg                        |
  // +----------------------------------------------------------------------+
    protected $boleto;

    protected $dias_de_prazo_para_pagamento;
    protected $taxa_boleto;
    protected $data_venc; 
    protected $valor_cobrado;
    protected $valor_boleto;

    protected $dadosboleto;
  
    public function OnPreInit($param){
        parent::OnPreInit($param);
		
        $this->Session['language']="pt_BR";
        $session_layout="free";
        $session_theme="default";
		
        if(empty($session_layout)){
            $config=new code_config();
            $this->Session['language']=$config->Session[language];
            $session_layout=$config->Session[layout];
            $session_theme=$config->Session[theme];
        }
        //$device=mobile_device_detect($mobilepath="mobile",$desktopath="web"); //,$iphone,$android,$opera,$blackberry,$palm,$windows);
        $device=mobile_device_detect($redirect,$mobilepath="mobile",$desktopath="web"); //,$iphone,$android,$opera,$blackberry,$palm,$windows);
        $layout="Application.layouts.$redirect.".$session_layout.".".$session_layout;
        $theme="$redirect/".$session_layout."/".$session_theme;

        $dirlayout="./protected/layouts/$redirect/".$session_layout;
        $dirtheme="./themes/".$theme;

        if($device){
            $layout="Application.layouts.$redirect.".$this->Session['layout_mobile'].".".$this->Session['layout_mobile'];
            $theme="$redirect/".$this->Session['layout_mobile']."/".$this->Session['theme_mobile'];

            $dirlayout="./protected/layouts/$redirect/".$this->Session['layout_mobile'];
            $dirtheme="./themes/".$theme;

            if(!is_dir($dirlayout)){
                $layout="Application.layouts.$desktopath.".$session_layout.".".$session_layout;
            }
            if(!is_dir($dirtheme)){
                $theme="$desktopath/".$session_layout."/".$session_theme;
            }
        }
    
  	$this->MasterClass=$layout;
  	$this->getPage()->setTheme($theme);
        $this->getApplication()->getGlobalization()->setCulture($this->Session['language']);
    }
  
    public function OnLoad($param){
        parent::OnLoad($param);

        if(!$this->IsPostBack){
            $boleto=$this->request["boleto"];

            // ---------------------- DADOS FIXOS DE CONFIGURA��O DO SEU BOLETO --------------- //
            // DADOS ESPECIFICOS DO SICOOB
            $this->dadosboleto["modalidade_cobranca"] = "01";
            $this->dadosboleto["numero_parcela"] = "001";

            // DADOS DA SUA CONTA - BANCO SICOOB
            $this->dadosboleto["agencia"] = "0015"; // Num da agencia, sem digito
            $this->dadosboleto["conta"] = "89100"; 	// Num da conta, sem digito

            // DADOS PERSONALIZADOS - SICOOB
            $this->dadosboleto["convenio"] = "7777777";  // Num do conv�nio - REGRA: No m�ximo 7 d�gitos
            $this->dadosboleto["carteira"] = "1";

            // SEUS DADOS
            $this->dadosboleto["identificacao"] = "TemplaX - Sistema de Boletos";
            $this->dadosboleto["cpf_cnpj"] = "123.4567.890/0001-00";
            $this->dadosboleto["endereco"] = "Rua Carlos Pereira Melo, 421";
            $this->dadosboleto["cidade_uf"] = "Aracaju / SE";
            $this->dadosboleto["cedente"] = "TemplaX Desenvolvimento de Hardware e Softwares";


            // DADOS DIN�MICOS DO SEU CLIENTE PARA A GERA��O DO BOLETO (FIXO OU VIA GET) -------------------- //
            // Os valores abaixo podem ser colocados manualmente ou ajustados p/ formul�rio c/ POST, GET ou de BD (MySql,Postgre,etc)	//

            // DADOS DO BOLETO PARA O SEU CLIENTE
            $this->dias_de_prazo_para_pagamento = 5;
            $this->taxa_boleto = 2.95;
            $this->data_venc = date("d/m/Y", time() + ($dias_de_prazo_para_pagamento * 86400));  // Prazo de X dias OU informe data: "13/04/2006"; 
            $this->valor_cobrado = "2950,00"; // Valor - REGRA: Sem pontos na milhar e tanto faz com "." ou "," ou com 1 ou 2 ou sem casa decimal
            $this->valor_cobrado = str_replace(",", ".",$valor_cobrado);
            $this->valor_boleto=number_format($valor_cobrado+$taxa_boleto, 2, ',', '');

            $this->dadosboleto["nosso_numero"] = "08123456";  // At� 8 digitos, sendo os 2 primeiros o ano atual (Ex.: 08 se for 2008)
            $this->dadosboleto["numero_documento"] = "27.030195.10";	// Num do pedido ou do documento
            $this->dadosboleto["data_vencimento"] = $this->data_venc; // Data de Vencimento do Boleto - REGRA: Formato DD/MM/AAAA
            $this->dadosboleto["data_documento"] = date("d/m/Y"); // Data de emiss�o do Boleto
            $this->dadosboleto["data_processamento"] = date("d/m/Y"); // Data de processamento do boleto (opcional)
            $this->dadosboleto["valor_boleto"] = $this->Session["valor_boleto"];  //$this->valor_boleto; 	// Valor do Boleto - REGRA: Com v�rgula e sempre com duas casas depois da virgula

            // DADOS DO SEU CLIENTE
            $this->dadosboleto["codigo_banco"] = "756";
            $this->dadosboleto["conta"] = "008910";
            $this->dadosboleto["moeda"] = "9";

            $this->dadosboleto["sacado"] = $this->Session["sacado"]; //"Nome do seu Cliente";
            $this->dadosboleto["endereco1"] = $this->Session["endereco1"]; //"Endere&ccedil;o do seu Cliente";
            $this->dadosboleto["endereco2"] = $this->Session["endereco2"]; //"Cidade - Estado -  CEP: 00000-000";

            // INFORMACOES PARA O CLIENTE
            $this->dadosboleto["demonstrativo1"] = "Pagamento de Compra na Loja Nonononono";
            $this->dadosboleto["demonstrativo2"] = "Mensalidade referente a nonon nonooon nononon<br>Taxa banc&aacute;ria - R$ ".number_format($taxa_boleto, 2, ',', '');
            $this->dadosboleto["demonstrativo3"] = "TemplaX - http://www.templax.com.br";

            // INSTRU��ES PARA O CAIXA
            $this->dadosboleto["instrucoes1"] = "- Sr. Caixa, cobrar multa de 2% ap&oacute;s o vencimento";
            $this->dadosboleto["instrucoes2"] = "- Receber at&eacute; 10 dias ap&oacutes o vencimento";
            $this->dadosboleto["instrucoes3"] = "- Em caso de d&uacutevidas entre em contato conosco: xxxx@xxxx.com.br";
            $this->dadosboleto["instrucoes4"] = "&nbsp; Emitido pelo sistema Projeto BoletoPhp - www.boletophp.com.br";

            // DADOS OPCIONAIS DE ACORDO COM O BANCO OU CLIENTE
            $this->dadosboleto["quantidade"] = "10";
            $this->dadosboleto["valor_unitario"] = "10";
            $this->dadosboleto["aceite"] = "N";		
            $this->dadosboleto["especie"] = "R$";
            $this->dadosboleto["especie_doc"] = "DM";


            $this->boleto=new boletoGenerator(
                $this->dadosboleto["codigo_banco"]
              , $this->dadosboleto["moeda"]
              , $this->dadosboleto["agencia"]
              , $this->dadosboleto["conta"]
              , $this->dadosboleto["data_vencimento"]
              , $this->dadosboleto["valor_boleto"]
              , $this->dadosboleto["carteira"]
              , $this->dadosboleto["modalidade_cobranca"]
              , $this->dadosboleto["numero_parcela"]
              , $this->dadosboleto["convenio"]
              , $this->dadosboleto["nosso_numero"]
            );

            $this->codeBar->ImageUrl="barcode.gif";

            //$this->boleto->fbarcode($this->boleto->dadosboleto["codigo_barras"]);

            //print_r($this->boleto->dadosboleto);
            //$this->
        }
        //$codBar=new barCodeGenrator('0479580318005020002505399047033956330000028888', 1, 'barcode.gif');
    }
}

