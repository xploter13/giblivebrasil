<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class convert_coin {
    /*
     * Método para converter valores para EN antes de enviar pro banco, e 
     * converter para BR depois que pegar do banco
     * Ex: convertCoin("EN",2,$xValue); // $value = 123456.78 
     * convertCoin("BR",2,$xValue); // 123.456,78
     * 
     * $xCoin = Padrao da moeda (EN ou BR)
     * $xDecimal = Casa Decimal (0,1,2,3...)
     * $xValue = Valor pego do Input
     * 
     */

    public function coin($xCoin = "EN", $xDecimal = 2, $xValue) {
        $xValue = preg_replace('/[^0-9]/', '', $xValue); // Deixa apenas números
        $xNewValue = substr($xValue, 0, -$xDecimal); // Separando número para adição do ponto separador de decimais
        $xNewValue = ($xDecimal > 0) ? $xNewValue . "." . substr($xValue, strlen($xNewValue), strlen($xValue)) : $xValue;
        return $xCoin == "EN" ? number_format($xNewValue, $xDecimal, '.', '') : ($xCoin == "BR" ? number_format($xNewValue, $xDecimal, ',', '.') : NULL);
    }

}
