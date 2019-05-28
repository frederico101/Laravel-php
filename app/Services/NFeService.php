<?php

namespace App\Services;
require_once $_SERVER['DOCUMENT_ROOT'] . "/vendor/autoload.php";


use NFePHP\NFe\Make;
use stdClass;




class NFeService
{
  private $config; 
   public function __construct( $config){

   $this->config = $config;


   }

public function gerarNFe(){
//criar a nota
$nfe = new Make();
        

$nfe = new Make();
$stdInNFe = new stdClass();

$stdInNFe->versao = '4.00';
//$stdInNFe->Id = 'NFe35180722633897000123550010000000101800700087';
$stdInNFe->pk_nItem = '';
$infNFe  = $nfe->taginfNFe($stdInNFe);

$stdIde = new stdClass();
$stdIde->cUF = 43; //coloque um código real e válido
$stdIde->cNF = rand(11111111, 99999999);
$stdIde->natOp = 'REVENDA DE MERCADORIAS SIMPLES NACIONAL';
$stdIde->mod = 55;
$stdIde->serie = 1;
$stdIde->nNF = 2;
$stdIde->dhEmi = date('Y-m-d\TH:i:sP');
$stdIde->dhSaiEnt = date('Y-m-d\TH:i:sP');
$stdIde->tpNF = 1;
$stdIde->idDest = 1;
$stdIde->cMunFG = 3518800; //Código de município precisa ser válido
$stdIde->tpImp = 1;
$stdIde->tpEmis = 1;
$stdIde->cDV = 2;
$stdIde->tpAmb = 2; // Se deixar o tpAmb como 2 você emitirá a nota em ambiente de homologação(teste) e as notas fiscais aqui não tem valor fiscal
$stdIde->finNFe = 1;
$stdIde->indFinal = 0;
$stdIde->indPres = 0;
$stdIde->procEmi = 0;
$stdIde->verProc = '2.4.0';
$tagide = $nfe->tagide($stdIde);



$stdEmit = new stdClass();
$stdEmit->xNome = 'E-Sales Solucoes Oobj';
$stdEmit->xFant = 'Oobj';
$stdEmit->IE = '0963233556';
$stdEmit->CRT = 1;
$stdEmit->CNPJ = '07385111000102';
$emit = $nfe->tagemit($stdEmit);








$stdEnderEmit = new stdClass();
$stdEnderEmit->xLgr = "PROF ALGACYR MUNHOZ MADER";
$stdEnderEmit->nro = '2080';
$stdEnderEmit->xBairro = 'Centro';
$stdEnderEmit->cMun = 4314902; //Código de município precisa ser válido e igual o  cMunFG
$stdEnderEmit->xMun = 'Porto Alegre';
$stdEnderEmit->UF = 'RS';
$stdEnderEmit->CEP = '81310020';
$stdEnderEmit->cPais = '1058';
$stdEnderEmit->xPais = 'BRASIL';
$stdEnderEmit->fone = '4121098000';
$enderEmit = $nfe->tagenderEmit($stdEnderEmit);



$stdDest = new stdClass();
$stdDest->xNome = 'E-Sales Solucoes Oobj';
$stdDest->indIEDest = '1';
$stdDest->IE = '0963233556';
$stdDest->CNPJ = '07385111000102';
$stdDest->email = 'edi.gomes@aconos.com.br';
$stdDest->CNPJ = '23519460000126';
$dest = $nfe->tagdest($stdDest);



$stdEnderDest = new stdClass();
$stdEnderDest->xLgr = "PROF ALGACYR MUNHOZ MADER";
$stdEnderDest->nro = '2080';
$stdEnderDest->xBairro = 'CIC';
$stdEnderDest->cMun = '4314902';
$stdEnderDest->xMun = 'Porto Alegre';
$stdEnderDest->UF = 'RS';
$stdEnderDest->CEP = '81310020';
$stdEnderDest->cPais = '1058';
$stdEnderDest->xPais = 'BRASIL';

        $enderDest = $nfe->tagenderDest($stdEnderDest);












        $stdProd = new stdClass();
        $stdProd->item = 1;
        $stdProd->cEAN = '';// 7897534876649
        $stdProd->cEANTrib = '';
        $stdProd->cProd = '0001';
        $stdProd->xProd = 'LIMPA TELAS 120ML';
        $stdProd->NCM = '44170010';
        $stdProd->CFOP = '5102';
        $stdProd->uCom = 'UN';
        $stdProd->qCom = '10';
        $stdProd->vUnCom = '6.99';
       
        $stdProd->uTrib = 'PÇ';
        $stdProd->qTrib = '10';
        $stdProd->vUnTrib = '6.99';
        $stdProd->vProd = $stdProd->qTrib * $stdProd->vUnTrib;
        $stdProd->indTot = 1;

        $prod  = $nfe->tagprod($stdProd);



        $stdAdicional = new stdClass();
        $stdAdicional->item = 1; //item da NFe
        
        $stdAdicional->infAdProd = 'informacao adicional do item';
        
         $indAdProd = $nfe->taginfAdProd($stdAdicional);







         $stdImposto = new stdClass();
         $stdImposto->item = 1; //item da NFe
         $stdImposto->vTotTrib = 4.00;
         
         $imposto = $nfe->tagimposto($stdImposto);



         $stdICMS = new stdClass();
         $stdICMS->item = 1; //item da NFe
         $stdICMS->orig ='0';
         $stdICMS->CST='00';
         $stdICMS->modBC='0';
         $stdICMS->vBC= $stdProd->vProd;
         $stdICMS->pICMS = '18.00';
         $stdICMS->vICMS= 100; //$stdICMS->vBC * (   $stdICMS->pICMS / 100);
       /*  $stdICMS->pFCP='';
         $stdICMS->vFCP='';
         $stdICMS->vBCFCP='';
         $stdICMS->modBCST='';
         $stdICMS->pMVAST='';
         $stdICMS->pRedBCST='';
         $stdICMS->vBCST='';
         $stdICMS->pICMSST='';
         $stdICMS->vICMSST='';
         $stdICMS->vBCFCPST='';
         $stdICMS->pFCPST='';
         $stdICMS->vFCPST='';
         $stdICMS->vICMSDeson='';
         $stdICMS->motDesICMS='';
         $stdICMS->pRedBC='';
         $stdICMS->vICMSOp='';
         $stdICMS->pDif='';
         $stdICMS->vICMSDif='';
         $stdICMS->vBCSTRet='';
         $stdICMS->pST='';
         $stdICMS->vICMSSTRet='';
         $stdICMS->vBCFCPSTRet='';
         $stdICMS->pFCPSTRet='';
         $stdICMS->vFCPSTRet='';
         $stdICMS->pRedBCEfet='';
         $stdICMS->vBCEfet='';
         $stdICMS->pICMSEfet='';
         $stdICMS->vICMSEfet='';
         $stdICMS->vICMSSubstituto=''; //NT2018.005_1.10_Fevereiro de 2019
         */
        $ICMS = $nfe->tagICMS($stdICMS);


        $stdPIS = new stdClass();
        $stdPIS->item = 1; //item da NFe
        $stdPIS->CST = '50';
        $stdPIS->vBC = $stdProd->vProd;
        $stdPIS->pPIS = 1.65;
        $stdPIS->vPIS =  $stdPIS->vBC * (   $stdPIS->pPIS / 100);
     

        $PIS =$nfe->tagPIS($stdPIS);



        $stdCOFINS = new stdClass();
        $stdCOFINS->item = 1; //item da NFe
        $stdCOFINS->CST = '50';
        $stdCOFINS->vBC = $stdProd->vProd;
        $stdCOFINS->pCOFINS = 0.65;
        $stdCOFINS->vCOFINS = $stdPIS->vBC * (   $stdCOFINS->pCOFINS / 100);
        

        $COFINS = $nfe->tagCOFINS($stdCOFINS);







        $stdICMSTot = new stdClass();
        $stdICMSTot->vBC='';
        $stdICMSTot->vICMS='';
        $stdICMSTot->vICMSDeson='';
        $stdICMSTot->vFCP=''; // incluso no layout 4.00
        $stdICMSTot->vBCST='';
        $stdICMSTot->vST='';
        $stdICMSTot->vFCPST='';//incluso no layout 4.00
        $stdICMSTot->vFCPSTRet=''; //incluso no layout 4.00
        $stdICMSTot->vProd='';
        $stdICMSTot->vFrete='';
        $stdICMSTot->vSeg='';
        $stdICMSTot->vDesc='';
        $stdICMSTot->vII='';
        $stdICMSTot->vIPI='';
        $stdICMSTot->vIPIDevol=''; //incluso no layout 4.00
        $stdICMSTot->vPIS='';
        $stdICMSTot->vCOFINS='';
        $stdICMSTot->vOutro='';
        $stdICMSTot->vNF='';
        $stdICMSTot->vTotTrib='';
        
        $ICMSTot  = $nfe->tagICMSTot($stdICMSTot);


        $stdTransp = new stdClass();
        $stdTransp->modFrete = 1;

        $Transp = $nfe->tagtransp($stdTransp);


        $stdVOL = new stdClass();
        $stdVOL->item = 1; //indicativo do numero do volume
        $stdVOL->qVol = 2;
        $stdVOL->esp = 'caixa';
        $stdVOL->marca = 'OLX';
        $stdVOL->nVol = '1';
        
        
        $vol = $nfe->tagvol($stdVOL);




        $stdPag = new stdClass();
        $stdPag->vTroco = null; //incluso no layout 4.00, obrigatório informar para NFCe (65)

       $pag = $nfe->tagpag($stdPag);





       $stdDetPag = new stdClass();
       $stdDetPag->tPag = '14';
       $stdDetPag->vPag = $stdProd->vProd;
       $stdDetPag->CNPJ = '12345678901234';
     //  $stdDetPag->indPag = '0'; //0= Pagamento à Vista 1= Pagamento à Prazo
       
       $detPag = $nfe->tagdetPag($stdDetPag);



       $stdinfAdic = new stdClass();
       $stdinfAdic->infAdFisco = 'informacoes para o fisco';
       $stdinfAdic->infCpl = 'informacoes complementares';
       
      $infAdic = $nfe->taginfAdic($stdinfAdic);

      //$result = $nfe->montaNFe();
     //dd($result);

  //  $xml = $nfe->getXML(); // O conteúdo do XML fica armazenado na variável $xml

    if( $nfe->montaNFe())
    {
        return $nfe->getXML();

    }else{
        throw new Exception("error ao gerar teste nfe");
    }



        }    

    }