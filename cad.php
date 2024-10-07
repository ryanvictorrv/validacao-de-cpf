<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        function validarCPF($cpf) {
            
            $cpf = preg_replace('/\D/', '', $cpf);
            
            
            if (strlen($cpf) != 11 || preg_match('/^(\d)\1{10}$/', $cpf)) {
                return false; 
            }
        
            
            $soma = 0;
            for ($i = 0; $i < 9; $i++) {
                $soma += $cpf[$i] * (10 - $i); 
            }
            $resto = $soma % 11; 
            $digito1 = ($resto < 2) ? 0 : 11 - $resto;
        
            $soma = 0;
            for ($i = 0; $i < 10; $i++) {
                $soma += $cpf[$i] * (11 - $i);
            }
            $resto = $soma % 11;
            $digito2 = ($resto < 2) ? 0 : 11 - $resto;
        
            return $cpf[9] == $digito1 && $cpf[10] == $digito2;

                
        }   
        
        function verificarEstado($cpf){
            $cpf = preg_replace('/\D/', '', $cpf);
            
            
            if (strlen($cpf) != 11 || preg_match('/^(\d)\1{10}$/', $cpf)) {
                return false; 
            }
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
        
            return $estados[$digito_estado];
        }

        $cpf =  $_GET["CPF"]; 
        if (validarCPF($cpf)) {
            echo "CPF válido!<br>" ;
            echo verificarEstado($cpf);
        } else {
            echo "CPF inválido!";
        }
        
?>
</body>
</html>