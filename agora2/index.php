<!DOCTYPE html>
<html lang="PT-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/header.css">
    <title>ORÇAMENTO</title>
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
    $tituloPagina = "NOME DO PROGRAMA - MÓDULO DE COMPRAS - GESTÃO DE ORÇAMENTOS";
    ?>


    <div class="container">
        <?php include 'header.php'; ?>
    </div>
    <div class="saudacao">
        <?php if (isset($_SESSION['nome'])): ?>
            <p>
                Olá <?php echo htmlspecialchars($_SESSION['nome']); ?>     <?php echo $saudacao; ?>.
                Seja bem-vindo ao Gerenciador de Orçamentos, bom trabalho!! <br>
            </p>
        <?php else: ?>

        <?php endif; ?>
    </div>

    <div class="container">
        <header>
            <h1>Gestão de Orçamentos</h1>
        </header>

        <!-- Formulário para criar orçamento -->
        <section>
            <label for="descricao-orcamento">Descrição do Orçamento:</label>
            <input type="text" id="descricao-orcamento" placeholder="Digite a descrição do orçamento" required>

            <label for="data">Digite a data</label>
            <input type="date" id="data" required>

            <button id="criar-orcamento">Criar Orçamento</button>
        </section>

        <!-- Lista de orçamentos criados -->
        <section>
            <h2>Orçamentos Criados</h2>
            <ul id="lista-orcamentos"></ul>
        </section>

        <hr>

        <!-- Visualização de itens de um orçamento -->
        <section>
            <h2>Itens do Orçamento: <span id="nome-orcamento">Nenhum</span></h2>

            <div>
                <label for="descricao-item">Descrição do Item:</label>
                <input type="text" id="descricao-item" placeholder="Descrição do item">

                <label for="valor-item">Valor:</label>
                <input type="number" id="valor-item" placeholder="Valor do item">

                <label for="quantidade-item">Quantidade:</label>
                <input type="number" id="quantidade-item" placeholder="Quantidade" min="1">

                <label for="fornecedor-item">Fornecedor:</label>
                <input type="text" id="fornecedor-item" placeholder="Fornecedor do item">

                <label for="foto-item">Foto:</label>
                <input type="file" id="foto-item">

                <button id="adicionar-item">Adicionar Item</button>

            </div>


            <h3>Itens Adicionados:</h3>
            <ul id="lista-itens"></ul>

            <p>Total: R$ <span id="total-itens">0.00</span></p>

            <!-- Exclusão do orçamento -->
            <button id="excluir-orcamento" style="display:none;">Excluir Orçamento</button>
        </section>

        <hr>

        <!-- Backup e Restauração -->
        <section>
            <button id="gerar-backup">Gerar Backup (JSON)</button>
            <input type="file" id="restaurar-backup" accept=".json">
            <button id="restaurar-backup-btn">Restaurar Backup</button>
            <a href="/orcamento/index.html" class="botao-link">Sair</a>




        </section>
    </div>



    <script src="js/script.js"></script>

    <?php include 'footer.php'; ?>
</body>

</html>