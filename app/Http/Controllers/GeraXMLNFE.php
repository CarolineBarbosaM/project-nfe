<?php

namespace App\Http\Controllers;

use NFePHP\Common\Certificate;
use NFePHP\NFe\Make;
use NFePHP\NFe\Tools;
use stdClass;

class GeraXMLNFe extends Controller {

    public function index() {

        $nfe = new Make();
        $std = new stdClass();
        $std->versao = '4.00';
        $std->Id = null;
        $std->pk_nItem = '';
        $nfe->taginfNFe($std);

        $stdIde = new stdClass();
        $stdIde->cUF = 29;
        $stdIde->cNF = rand(11111111, 99999999);
        $stdIde->natOp = 'VENDA';
        $stdIde->mod = 55; //Modelo do Documento Fiscal
        $stdIde->serie = 102;
        $stdIde->nNF = 1; //Código Numérico que compõe a Chave de Acesso
        $stdIde->dhEmi = date('Y-m-d') . 'T' . date('H:i:s') . '-03:00';
        $std->dhSaiEnt = date('Y-m-d') . 'T' . date('H:i:s') . '-03:00';
        $stdIde->tpNF = 1;
        $stdIde->idDest = 1;
        $stdIde->cMunFG = 2925303; //Código do Município dO ibge
        $stdIde->tpImp = 1;
        $stdIde->tpEmis = 1; //Número do Documento Fiscal
        $stdIde->cDV = 2; //Dígito Verificador da Chave de Acesso
        $stdIde->tpAmb = 2;
        $stdIde->finNFe = 1; //Se NF-e complementar (finNFe=2):– Não informado NF referenciada (NF modelo 1 ou NF-e)
        $stdIde->indFinal = 1;
        $stdIde->indPres = 0;
        $stdIde->indIntermed = null;
        $stdIde->procEmi = 0;
        $stdIde->verProc = 0; //Identificador da versão do processo de emissão (informar a versão do aplicativo emissor de NF-e).

        $tagide = $nfe->tagide($stdIde);


        //Emite o xml

        $stdEmit = new stdClass();
        $stdEmit->xNome = 'ELIZABETE CURVELO SANTOS - EPP';
        $stdEmit->xFant = 'Porto Piscinas';
        $stdEmit->IE = '041435715 ';
        $stdEmit->IEST = null;
        $stdEmit->IM = '';
        $stdEmit->CNAE = '47.89-0-99';
        $stdEmit->CRT = '3';
        $stdEmit->CNPJ = '00471662000140'; //indicar apenas um CNPJ ou CPF
        $tagemit = $nfe->tagemit($stdEmit);

        dd($stdEmit);

    }

}
