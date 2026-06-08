document.addEventListener('DOMContentLoaded', () => {
    const form = document.querySelector('form');
    const campoCep = document.querySelector('#cep');
    const senha = document.querySelector('#senha');
    const confirmarSenha = document.querySelector('#confirmar_senha');
    const btnSalvar = document.querySelector('#btnGravar');

    // Mascara Dinamica (baseada no atributo data-mascara)
    document.querySelectorAll('[data-mascara]').forEach(input => {
        input.addEventListener('input', (e) => {
            const padrao = e.target.dataset.mascara; //(00) 00000-0000
            let valor = e.target.value.replace(/\D/g, ''); // Remove tudo que não for número
            let res = '', idx=0;
            for(let i=0; i<padrao.length && idx < valor.length; i++) {
                res += padrao[i] === '0' ? valor[idx++] : padrao[i];
            }
            e.target.value = res;
        });

    });

});