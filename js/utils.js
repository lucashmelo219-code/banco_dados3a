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

    //Busca o cep
    if(campoCep) {
        campoCep.addEventListener('blur',async()=> {
            let cep = campoCep.value.replace(/\D/g, '');
            if(cep.length !== 8) return;
            try {
                const res = await fetch(`https://viacep.com.br/ws/${cep}/json/`);
                const dados = await res.json();
                if(!dados.erro) {
                    document.querySelector('#logradouro').value = dados.logradouro ;
                    document.querySelector('#bairro').value = dados.bairro ;
                    document.querySelector('#cidade').value = dados.localidade ;
                    document.querySelector('#estado').value = dados.uf ;
                } 
            } catch (error) {
                console.error('Falha na requisição de endereço', erro);
            }
        });
    }
    if(senha && confirmarSenha && btnSalvar) {
        const configurarToggleSenha = (btnId, inputId) => {
            btn = document.querySelector(btnId);
            if(!btn) return;
            const input = document.querySelector(inputId);
            const icone = btn.querySelector('i');
            btn.addEventListener('click', () => {
                const tipo = input.getAttribute('type') === 'password' ? 'text' : 'password';
                input.setAttribute('type', tipo);
                icone.classList.toggle('bi-eye-slash');
                icone.classList.toggle('bi-eye');
                
                
            });
        };
        configurarToggleSenha('#toggleSenha', '#senha');
        configurarToggleSenha('#toggleConfirmarSenha', '#confirmar_senha');

        const validar = () => {
            const erro = senha.value === '' || senha.value !== confirmarSenha.value;
            confirmarSenha.style.borderColor = erro ? 'red' : 'green';
            btnSalvar.disabled = erro;
        };
        senha.addEventListener('input', validar);
        confirmarSenha.addEventListener('input', validar);
    }

});
