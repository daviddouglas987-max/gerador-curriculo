<?php
// --- ETAPA 1: RECEBER OS DADOS DO FORMULÁRIO ---

// Verifica se os dados foram enviados via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Dados Pessoais
    // Usamos 'htmlspecialchars' para segurança, evitando que código malicioso seja executado
    // Usamos '??' para definir um valor padrão ('') caso o campo venha vazio
    $nome = htmlspecialchars($_POST['nome'] ?? '');
    $data_nascimento = $_POST['data_nascimento'] ?? ''; // Não precisamos de htmlspecialchars em data
    $email = htmlspecialchars($_POST['email'] ?? '');
    $telefone = htmlspecialchars($_POST['telefone'] ?? '');
    $endereco = htmlspecialchars($_POST['endereco'] ?? '');
    
    // Formação Acadêmica
    $instituicao = htmlspecialchars($_POST['instituicao'] ?? '');
    $curso = htmlspecialchars($_POST['curso'] ?? '');

    // Experiências Profissionais (Estes são arrays)
    $exp_empresas = $_POST['exp_empresa'] ?? [];
    $exp_cargos = $_POST['exp_cargo'] ?? [];
    $exp_descricoes = $_POST['exp_descricao'] ?? [];

} else {
    // Se alguém tentar acessar gerar.php diretamente, redireciona para o formulário
    header("Location: index.php");
    exit;
}

// --- ETAPA 2: MONTAR A PÁGINA HTML DO CURRÍCULO ---
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Currículo de <?php echo $nome; ?></title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        /* Estilo básico para a página do currículo */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }
        .curriculo-container {
            max-width: 800px;
            margin: 20px auto;
            padding: 30px;
            background-color: #fff;
            border: 1px solid #ddd;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .curriculo-header {
            text-align: center;
            border-bottom: 2px solid #000;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        .curriculo-header h1 {
            margin: 0;
            font-size: 2.5em;
        }
        .curriculo-section {
            margin-bottom: 20px;
        }
        .curriculo-section h3 {
            border-bottom: 1px solid #eee;
            padding-bottom: 5px;
            margin-bottom: 10px;
            color: #333;
        }
        .exp-item {
            margin-bottom: 15px;
        }
        
        /* Botão de Impressão */
        .btn-print {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 1000;
        }

        /* --- ESTILOS DE IMPRESSÃO (Requisito da Atividade) --- */
        @media print {
            body {
                background-color: #fff; /* Fundo branco para impressão */
            }
            .curriculo-container {
                width: 100%;
                margin: 0;
                border: none;
                box-shadow: none;
            }
            /* Esconde o botão de imprimir na impressão */
            .btn-print {
                display: none;
            }
        }
    </style>
</head>
<body>

    <button class="btn btn-success btn-lg btn-print" onclick="window.print()">
        Baixar Currículo (Imprimir)
    </button>

    <div class="curriculo-container">
        <header class="curriculo-header">
            <h1><?php echo $nome; ?></h1>
            <p>
                <?php echo $endereco; ?><br>
                <?php echo $telefone; ?> | <?php echo $email; ?>
            </p>
        </header>

        <section class="curriculo-section">
            <h3>Formação Acadêmica</h3>
            <p>
                <strong><?php echo $instituicao; ?></strong><br>
                <?php echo $curso; ?>
            </p>
        </section>

        <section class="curriculo-section">
            <h3>Experiência Profissional</h3>
            
            <?php
            // --- ETAPA 3: LOOP DAS EXPERIÊNCIAS ---
            // 'array_keys' pega os índices (0, 1, 2...) do array de empresas
            foreach (array_keys($exp_empresas) as $index) {
                // Pegamos os dados de cada índice
                $empresa = htmlspecialchars($exp_empresas[$index]);
                $cargo = htmlspecialchars($exp_cargos[$index]);
                $descricao = htmlspecialchars($exp_descricoes[$index]);

                // Só exibe a experiência se o campo 'empresa' não estiver vazio
                if (!empty($empresa)) {
                    echo '<div class="exp-item">';
                    echo '<strong>' . $empresa . '</strong><br>';
                    echo '<em>' . $cargo . '</em><br>';
                    echo '<p>' . nl2br($descricao) . '</p>'; // nl2br preserva quebras de linha
                    echo '</div>';
                }
            }
            ?>
        </section>
    </div>

</body>
</html>