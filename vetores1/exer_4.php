<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Calculadora de Dívida com Juros</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; }
        label { display: block; margin-top: 10px; }
        input[type="number"] { width: 100px; }
        .result { margin-top: 20px; font-weight: bold; }
    </style>
</head>
<body>
    <h1>Calculadora de Dívida com Juros</h1>
    <form id="dividaForm">
        <label>
            Valor da dívida (R$):
            <input type="number" step="0.01" id="divida" required>
        </label>
        <label>
            Juros ao mês (%):
            <input type="number" step="0.01" id="juros" required>
        </label>
        <label>
            Número de parcelas:
            <input type="number" id="parcelas" min="1" required>
        </label>
        <button type="submit">Calcular</button>
    </form>
    <div class="result" id="resultado"></div>

    <script>
        function calcularParcelas(divida, juros, parcelas) {
            // juros é percentual ao mês, transformar para decimal
            let j = juros / 100;
            // Fórmula da prestação fixa (Price): P = PV * [j*(1+j)^n] / [(1+j)^n - 1]
            let numerador = j * Math.pow(1 + j, parcelas);
            let denominador = Math.pow(1 + j, parcelas) - 1;
            let valorParcela = denominador === 0 ? divida / parcelas : divida * numerador / denominador;
            // Montante total pago
            let montante = valorParcela * parcelas;
            // Média das parcelas (sempre igual à valorParcela, já que são fixas)
            let media = valorParcela;
            return [valorParcela, montante, media];
        }

        document.getElementById('dividaForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const divida = parseFloat(document.getElementById('divida').value);
            const juros = parseFloat(document.getElementById('juros').value);
            const parcelas = parseInt(document.getElementById('parcelas').value);
            if (divida > 0 && parcelas > 0) {
                const [valorParcela, montante, media] = calcularParcelas(divida, juros, parcelas);
                document.getElementById('resultado').innerHTML = `
                    Valor de cada parcela: <strong>R$ ${valorParcela.toFixed(2)}</strong><br>
                    Montante total pago: <strong>R$ ${montante.toFixed(2)}</strong><br>
                    Média das parcelas: <strong>R$ ${media.toFixed(2)}</strong>
                `;
            } else {
                document.getElementById('resultado').textContent = "Digite valores válidos.";
            }
        });
    </script>
</body>
</html>