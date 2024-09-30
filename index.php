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
            // Remove caracteres não numéricos
            $cpf = preg_replace('/\D/', '', $cpf);
            
            // Verifica se o CPF tem 11 dígitos
            if (strlen($cpf) != 11 || preg_match('/^(\d)\1{10}$/', $cpf)) {
                return false; // CPF inválido
            }
        
            // Calcula o primeiro dígito verificador
            $soma = 0;
            for ($i = 0; $i < 9; $i++) {
                $soma += $cpf[$i] * (10 - $i);
            }
            $resto = $soma % 11;
            $digito1 = ($resto < 2) ? 0 : 11 - $resto;
        
            // Calcula o segundo dígito verificador
            $soma = 0;
            for ($i = 0; $i < 10; $i++) {
                $soma += $cpf[$i] * (11 - $i);
            }
            $resto = $soma % 11;
            $digito2 = ($resto < 2) ? 0 : 11 - $resto;
        
            // Compara os dígitos calculados com os dígitos do CPF
            return $cpf[9] == $digito1 && $cpf[10] == $digito2;
        }
        
        // Exemplo de uso
        $cpf =  $_GET["CPF"]; // Substitua pelo CPF que deseja validar
        if (validarCPF($cpf)) {
            echo "CPF válido!";
        } else {
            echo "CPF inválido!";
        }        

    ?>
</body>
</html>