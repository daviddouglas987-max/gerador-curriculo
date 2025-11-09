// Espera o DOM (a página HTML) carregar completamente antes de executar o script
document.addEventListener('DOMContentLoaded', function() {

    // --- REQUISITO 1: CÁLCULO AUTOMÁTICO DE IDADE ---
    
    const inputDataNascimento = document.getElementById('data_nascimento');
    const inputIdade = document.getElementById('idade');

    if (inputDataNascimento) {
        inputDataNascimento.addEventListener('change', function() {
            const dataNasc = new Date(this.value); 
            if (!isNaN(dataNasc.getTime())) {
                const hoje = new Date();
                let idade = hoje.getFullYear() - dataNasc.getFullYear();
                
                const mesAtual = hoje.getMonth();
                const diaAtual = hoje.getDate();
                const mesNasc = dataNasc.getMonth();
                // Ajuste: getUTCDate() para evitar problemas de fuso horário
                const diaNasc = dataNasc.getUTCDate(); 

                if (mesAtual < mesNasc || (mesAtual === mesNasc && diaAtual < diaNasc)) {
                    idade--; 
                }
                
                inputIdade.value = idade >= 0 ? idade : '';
            } else {
                inputIdade.value = '';
            }
        });
    }

    // --- REQUISITO 2: ADICIONAR CAMPOS DINAMICAMENTE ---
    
    const btnAddExp = document.getElementById('btn-add-exp');
    const containerExp = document.getElementById('container-experiencias');

    if (btnAddExp) {
        btnAddExp.addEventListener('click', function() {
            
            // Cria um novo elemento 'div' para agrupar os campos
            const novoGrupoCampos = document.createElement('div');
            // Adiciona classes do Bootstrap + uma classe nossa 'experiencia-item'
            novoGrupoCampos.className = 'mb-3 p-3 border rounded experiencia-item mt-3'; 

            // Define o HTML interno desse novo 'div'
            novoGrupoCampos.innerHTML = `
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
                <button type="button" class="btn btn-danger btn-sm btn-remover-exp">Remover</button>
            `;

            // Adiciona o novo grupo de campos dentro do container
            containerExp.appendChild(novoGrupoCampos);
        });
    }

    // Adiciona funcionalidade ao botão "Remover"
    if (containerExp) {
        containerExp.addEventListener('click', function(event) {
            // Verifica se o clique foi em um botão com a classe 'btn-remover-exp'
            if (event.target.classList.contains('btn-remover-exp')) {
                // Remove o 'div' pai do botão (que é o 'experiencia-item')
                event.target.closest('.experiencia-item').remove();
            }
        });
    }

});