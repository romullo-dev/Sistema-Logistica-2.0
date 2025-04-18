<?php

if (isset($_POST['teste']) & isset($_FILES['arquivo_xml'])) {
    $caminhoTemporario = $_FILES['arquivo_xml']['tmp_name'];


    $xml  = simplexml_load_file($caminhoTemporario);


    if (isset($xml->NFe->infNFe)) {
        $remetente_cpf_cnpj = (string)$xml->NFe->infNFe->emit->CNPJ;
        $remetenteNome = (string)$xml->NFe->infNFe->emit->xNome;
        $remetente_cep = (string)$xml->NFe->infNFe->emit->enderEmit->CEP;
        $remetente_endereco = (string)$xml->NFe->infNFe->emit->enderEmit->xLgr;
        $remetente_numero = (string)$xml->NFe->infNFe->emit->enderEmit->nro;

        // Informações do Pedido / Nota
        $pedidoNumero = (string)$xml->NFe->infNFe->ide->nNF;
        $notaNumero = (string)$xml->NFe->infNFe->ide->nNF;
        $chaveNota = (string)$xml->protNFe->infProt->chNFe;

        // Destinatário
        $destinatarioCpfCnpj = (string)$xml->NFe->infNFe->dest->CNPJ;
        $destinatarioNome = (string)$xml->NFe->infNFe->dest->xNome;
        $destinatario_cep = (string)$xml->NFe->infNFe->dest->enderDest->CEP;
        $destinatario_endereco = (string)$xml->NFe->infNFe->dest->enderDest->xLgr;
        $destinatario_numero = (string)$xml->NFe->infNFe->dest->enderDest->nro;

        // Teste de exibição
        echo "Remetente: $remetenteNome ($remetente_cpf_cnpj)\n" .'<br>';
        echo "Endereço: $remetente_endereco, $remetente_numero - CEP: $remetente_cep\n.'<br>'";
        echo "Destinatário: $destinatarioNome ($destinatarioCpfCnpj)\n.'<br>'";
        echo "Endereço: $destinatario_endereco, $destinatario_numero - CEP: $destinatario_cep\n .'<br>'";
        echo "Pedido nº: $pedidoNumero | Nota nº: $notaNumero\n.'<br>'";
        echo "Chave da Nota: $chaveNota\n .'<br>'";
    } else {
        echo "Não foi possível localizar a NFe no XML.";
    }
}
