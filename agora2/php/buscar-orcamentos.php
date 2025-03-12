<?php
// Configuração do banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gestao_orcamentos";

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Consulta SQL para buscar os orçamentos
$sql = "SELECT id, descricao, valor, quantidade, fornecedor FROM orcamentos";
$result = $conn->query($sql);

// Cria um array para armazenar os resultados
$orcamentos = [];

if ($result->num_rows > 0) {
    // Itera sobre os resultados e armazena no array
    while($row = $result->fetch_assoc()) {
        $orcamentos[] = $row;
    }
}

// Converte os resultados para JSON e retorna
echo json_encode($orcamentos);

// Fecha a conexão
$conn->close();
?>







