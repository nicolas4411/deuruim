<!DOCTYPE html>
<html lang="PT-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/story.css">
    <title>Histórico de Orçamentos</title>
</head>

<body>
    <?php
    session_start();
    date_default_timezone_set('America/Sao_Paulo');

    function getDiaSemana($data)
    {
        $diasSemana = array('Domingo', 'Segunda-feira', 'Terça-feira', 'Quarta-feira', 'Quinta-feira', 'Sexta-feira', 'Sábado');
        $numeroDiaSemana = date('w', strtotime($data));
        return $diasSemana[$numeroDiaSemana];
    }

    $dataAtual = date('Y-m-d H:i:s');
    $diaSemana = getDiaSemana($dataAtual);
    $dataHora = date('d/m/Y H:i:s');
    $horaAtual = date('H');

    if ($horaAtual >= 6 && $horaAtual < 12) {
        $saudacao = 'bom dia';
    } elseif ($horaAtual >= 12 && $horaAtual < 18) {
        $saudacao = 'boa tarde';
    } else {
        $saudacao = 'boa noite';
    }

    $localizacao = 'Juiz de Fora, Minas Gerais';
    $tituloPagina = "NOME DO PROGRAMA - MÓDULO DE COMPRAS - HISTÓRICO DE ORÇAMENTOS";
    ?>
    <div class="container">
        <?php include 'php/header.php'; ?>
    </div>
    <div class="saudacao">
        <?php if (isset($_SESSION['nome'])): ?>
            <p>
                Olá <?php echo htmlspecialchars($_SESSION['nome']); ?>     <?php echo $saudacao; ?>.
                Seja bem-vindo ao Gerenciador de Orçamentos, bom trabalho!! <br>
            </p>
        <?php else: ?>
            <p>Usuário não logado. <a href="index.html">Clique aqui para fazer login.</a></p>
        <?php endif; ?>
    </div>

    <h2>Orçamentos Criados</h2>
    <ul id="lista-orcamentos"></ul>

    <section>
        <button id="gerar-backup">Gerar Backup (JSON)</button>
        <input type="file" id="restaurar-backup" accept=".json">
        <button id="restaurar-backup-btn">Restaurar Backup</button>
    </section>

    <?php include 'php/footer.php'; ?>

    <script src="js/historico.js"></script>
</body>

</html>