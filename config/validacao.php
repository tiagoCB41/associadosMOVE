<?php
function validaCPF($teste) {
 
    // Extrai somente os números
    $teste = preg_replace( '/[^0-9]/is', '', $teste );
     
    // Verifica se foi informado todos os digitos corretamente
    if (strlen($teste) != 11) {
        return false;
    }

    // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
    if (preg_match('/(\d)\1{10}/', $teste)) {
        return false;
    }

    // Faz o calculo para validar o teste
    for ($t = 9; $t < 11; $t++) {
        for ($d = 0, $c = 0; $c < $t; $c++) {
            $d += $teste[$c] * (($t + 1) - $c);
        }
        $d = ((10 * $d) % 11) % 10;
        if ($teste[$c] != $d) {
            return false;
        }
    }
    return true;

}


?>