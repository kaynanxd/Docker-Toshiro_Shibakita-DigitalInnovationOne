<!DOCTYPE html>
<html>
<head>
    <title>Exemplo PHP</title>
</head>
<body>

<?php
ini_set("display_errors", 1);
header('Content-Type: text/html; charset=iso-8859-1');

echo 'Versão Atual do PHP: ' . phpversion() . '<br>';

$servername = "54.234.153.24";
$username = "root";
$password = "Senha123";
$database = "meubanco";

// Criar conexão
$link = new mysqli($servername, $username, $password, $database);

// Verificar conexão
if ($link->connect_error) {
    die("Falha na conexão: " . $link->connect_error);
}

// Gerar dados
$valor_rand1 = rand(1, 999);
$valor_rand2 = strtoupper(substr(bin2hex(random_bytes(4)), 1)); // nome fictício
$endereco = strtoupper(substr(bin2hex(random_bytes(4)), 1));    // endereço fictício
$cidade = strtoupper(substr(bin2hex(random_bytes(4)), 1));      // cidade fictícia
$host_name = gethostname(); // nome da máquina

$query = "INSERT INTO dados (FuncionarioID, Nome, Endereco, Cidade, Host) 
          VALUES ('$valor_rand1', '$valor_rand2', '$endereco', '$cidade', '$host_name')";

if ($link->query($query) === TRUE) {
    echo "Novo registro criado com sucesso!";
} else {
    echo "Erro: " . $link->error;
}

$link->close();
?>

</body>
</html>
