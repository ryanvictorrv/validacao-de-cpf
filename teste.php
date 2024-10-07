<?php

function verificarEstado($cpf){
    $estados = [
        0 => "Rio Grande do Sul",
        1 => "Distrito Federal, Goiás, Mato Grosso, Mato Grosso do Sul e Tocantins",
        2 => "Amazonas, Pará, Roraima, Amapá, Acre e Rondônia",
        3 => " Ceará, Maranhão e Piauí",
        4 => "Paraíba, Pernambuco, Alagoas e Rio Grande do Norte",
        5 => " Bahia e Sergipe",
        6 => "Minas Gerais",
        7 => "Rio de Janeiro e Espírito Santo",
        8 => " São Paulo",
        9 => " Paraná e Santa Catarina",
    ];


    $array_digitos_cpf = str_split($cpf);
    $digito_estado = $array_digitos_cpf[8];

    echo $estados[$digito_estado];
}

verificarEstado("00900900409");