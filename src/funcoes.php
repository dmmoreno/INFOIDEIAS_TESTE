<?php

namespace SRC;

class Funcoes
{
    /*

    Desenvolva uma função que receba como parâmetro o ano e retorne o século ao qual este ano faz parte. 
    O primeiro século começa no ano 1 e termina no ano 100, o segundo século começa no ano 101 e termina no 200.

	Exemplos para teste:

	Ano 1905 = século 20
	Ano 1700 = século 17

     * */
    public function SeculoAno(int $ano): int {
        
        // Faz um cast do ano int para string para fazer o calculo
        $ano_string = (string)$ano;
        $final = substr($ano_string, -2);
        
        switch ($final){ 
            case '00' : $seculo = substr($ano, 0, -2); break;    // Calculo dos seculos para anos que terminam em 00
            default   : $seculo = ($ano / 100) + 1 ;   break;    // Calculo dos seculos para anos que nao terminam em 00
        }

        return (int)$seculo;
    }

	/*

    Desenvolva uma função que receba como parâmetro um número inteiro e retorne o numero primo imediatamente 
    anterior ao número recebido

    Exemplo para teste:

    Numero = 10 resposta = 7
    Número = 29 resposta = 23

     * */
    public function PrimoAnterior(int $numero): int {

        $numero = $numero - 1;

        for($i = $numero; $i <> 0; $i--){
            $divisores = 0;
            for ($x = 1; $x <= $i; $x++) {
                if ($i % $x == 0) {
                    $divisores++;
                }
            }
            
            if ($divisores == 2){
                return $i;
            }
        }
        
    }

    /*

    Desenvolva uma função que receba como parâmetro um array multidimensional de números inteiros e 
    retorne como resposta o segundo maior número.

    Exemplo para teste:

	Array multidimensional = array (
	array(25,22,18),
	array(10,15,13),
	array(24,5,2),
	array(80,17,15)
	);

	resposta = 25

     * */
    public function SegundoMaior(array $arr): int {
        $arrayValores = array();
        
        // Percorre o array multidimensional
        foreach($arr as $arrMult){
            foreach($arrMult as $valor){
                $arrayValores[] = $valor;
            }
        }

        // ordena o array do maior para o menor, obterm o segundo indice e depois o valor do segundo maior numero e retorna
        arsort($arrayValores);
        $key = array_keys($arrayValores)[1];
        $segundo_numero_maior = $arrayValores[$key];

        return $segundo_numero_maior;
        
    }

    /*
   Desenvolva uma função que receba como parâmetro um array de números inteiros e responda com TRUE or FALSE 
   se é possível obter uma sequencia crescente removendo apenas um elemento do array.

	Exemplos para teste 

	Obs.:-  É Importante  realizar todos os testes abaixo para garantir o funcionamento correto.
         -  Sequencias com apenas um elemento são consideradas crescentes

    [1, 3, 2, 1]  false
    [1, 3, 2]  true
    [1, 2, 1, 2]  false
    [3, 6, 5, 8, 10, 20, 15] false
    [1, 1, 2, 3, 4, 4] false
    [1, 4, 10, 4, 2] false
    [10, 1, 2, 3, 4, 5] true
    [1, 1, 1, 2, 3] false
    [0, -2, 5, 6] true
    [1, 2, 3, 4, 5, 3, 5, 6] false
    [40, 50, 60, 10, 20, 30] false
    [1, 1] true
    [1, 2, 5, 3, 5] true
    [1, 2, 5, 5, 5] false
    [10, 1, 2, 3, 4, 5, 6, 1] false
    [1, 2, 3, 4, 3, 6] true
    [1, 2, 3, 4, 99, 5, 6] true
    [123, -17, -5, 1, 2, 3, 12, 43, 45] true
    [3, 5, 67, 98, 3] true

     * */
    
	public function SequenciaCrescente(array $arr): bool {
        $retorno = false;
        $crescente = 0;

        // Sequencias com apenas um elemento são consideradas crescentes
        if (sizeof($arr) == 1){
            $retorno = true;
        } else {
            foreach($arr as $key => $valor){
                if ($key > 0){

                    if ($key == 1)
                        $keyAnterior = $key;
                    else
                        $keyAnterior = $key - 1;

                    // Percorre os elementos iniciais
                    for($i = $keyAnterior; $i >= 0; $i--){
                        if ($arr[$key] <= $arr[$i]){
                            $crescente++;
                        }
                    }
                }
            }
        }
        
        if ($crescente <= 1){
            $retorno = true;
        }

        return $retorno;
    }
}