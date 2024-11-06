<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scroll para um Elemento</title>
    <style>
        body {
            height: 2000px; /* Altura da página para permitir rolagem */
            font-family: Arial, sans-serif;
        }
        #target {
            margin-top: 1500px; /* Espaçamento para demonstrar o scroll */
            height: 200px;
            background-color: lightblue;
            padding: 20px;
            border: 2px solid blue;
            text-align: center;
            font-size: 24px;
        }
        button {
            margin: 20px;
            padding: 10px 20px;
            font-size: 16px;
        }
    </style>
</head>
<body>

<button onclick="scrollToTarget()">Ir para a Área Específica</button>

<div id="target">Esta é a área específica!</div>

<script>
    function scrollToTarget() {
        const targetElement = document.getElementById('target');
        targetElement.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }
</script>

</body>
</html>
