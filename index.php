<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerador de Currículo</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Gerador de Currículo</a>
        </div>
    </nav>

    <div class="container my-5">
        <h1 class="mb-4 text-center">Preencha seus Dados</h1>
        
        <form action="gerar.php" method="POST">
            
            <div class="card mb-4">
                <div class="card-header">
                    <h3>Dados Pessoais</h3>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome Completo:</label>
                        <input type="text" class="form-control" id="nome" name="nome" required>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="data_nascimento" class="form-label">Data de Nascimento:</label>
                            <input type="date" class="form-control" id="data_nascimento" name="data_nascimento">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="idade" class="form-label">Idade:</label>
                            <input type="text" class="form-control" id="idade" name="idade" readonly disabled>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    
                    <div class="mb-3">
                        <label for="telefone" class="form-label">Telefone:</label>
                        <input type="tel" class="form-control" id="telefone" name="telefone">
                    </div>

                    <div class="mb-3">
                        <label for="endereco" class="form-label">Endereço:</label>
                        <input type="text" class="form-control" id="endereco" name="endereco" placeholder="Ex: Rua, Nº, Bairro, Cidade - Estado">
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <h3>Formação Acadêmica</h3>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="instituicao" class="form-label">Instituição de Ensino:</label>
                        <input type="text" class="form-control" id="instituicao" name="instituicao">
                    </div>
                    <div class="mb-3">
                        <label for="curso" class="form-label">Curso:</label>
                        <input type="text" class="form-control" id="curso" name="curso">
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3>Experiência Profissional</h3>
                    <button type="button" class="btn btn-success" id="btn-add-exp"> + </button>
                </div>
                <div class="card-body">
                    <div id="container-experiencias">
                        <div class="mb-3 p-3 border rounded experiencia-item">
                            <div class="mb-3">
                                <label for="exp_empresa[]" class="form-label">Empresa:</label>
                                <input type="text" class="form-control" name="exp_empresa[]">
                            </div>
                            <div class="mb-3">
                                <label for="exp_cargo[]" class="form-label">Cargo:</label>
                                <input type="text" class="form-control" name="exp_cargo[]">
                            </div>
                            <div class="mb-3">
                                <label for="exp_descricao[]" class="form-label">Descrição das Atividades:</label>
                                <textarea class="form-control" name="exp_descricao[]" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary btn-lg">Gerar Currículo</button>
            </div>
            
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <script src="assets/js/script.js" defer></script>
</body>
</html>