<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <main>
        <form action="{{ route('agendar') }}" method="POST">
            @csrf

            <div>
                <label for="cliente">Nome</label>
                <input type="text" name="cliente" id="cliente">
            </div>

            <div>
                <label for="email">E-mail</label>
                <input type="email" name="email" id="email">
            </div>

            <div>
                <label for>Animal</label>
                <input type="text" name="animal" id="animal">
            </div>

            <div>
                <label for="servico">Serviço</label>
                <select name="servico" id="servico">
                    <option value="">Escolha uma opção</option>
                    <option value="consulta">Consulta</option>
                    <option value="vacinacao">Vacinação</option>
                    <option value="banho">Banho</option>
                    <option value="tosa">Tosa</option>
                </select>
            </div>

            <div>
                <label for="data">Data</label>
                <input type="date" name="data" id="data">
            </div>

            <div>
                <button type="submit">Enviar</button>
            </div>
        </form>
    </main>
</body>
</html>
