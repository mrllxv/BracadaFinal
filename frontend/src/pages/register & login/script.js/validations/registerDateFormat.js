document.getElementById('.form').addEventListener('submit', function(event) {
    event.preventDefault();
    
    const dataInput = document.getElementById('data').value;
    
    // Verifica se a data segue o padrão
    const regex = /^(0[1-9]|[12][0-9]|3[01])\/(0[1-9]|1[0-2])\/\d{4}$/;
    
    if (!regex.test(dataInput)) {
        alert("Formato de data inválido!");
        return;
    }

    // Validação completa da data
    const partes = dataInput.split('/');
    const dia = parseInt(partes[0], 10);
    const mes = parseInt(partes[1], 10) - 1; // Meses começam de 0 no JavaScript
    const ano = parseInt(partes[2], 10);
    
    // Cria um objeto Date com a data fornecida
    const data = new Date(ano, mes, dia);
    
    // Verifica se a data é válida
    if (data.getDate() !== dia || data.getMonth() !== mes || data.getFullYear() !== ano) {
        alert("Data inválida!");
        return;
    }

    alert("Data válida!");
    // Aqui você pode prosseguir com a submissão do formulário, etc.
});