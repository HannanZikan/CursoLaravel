<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>Document</title>
</head>

<body>
    <?php if (1 == 2) : ?>
        <?php for ($count = 1; $count <= 10; $count++) : ?>
            <?php echo $count; ?>
            <br>
        <?php endfor; ?>
    <?php endif; ?>

    <div style="text-align: center">
        <h1>Cadastre seus clientes</h1>
        <form action="">
            <label>Nome</label>
            <input type="text" placeholder="Insira seu nome..." />
            <br>
            <label>CPF</label>
            <input type="number" placeholder="Insira seu cpf..." />
            <br>
            <label>Endereço</label>
            <input type="text" placeholder="Insira seu endereço..." />
            <br>
            <button type="submit" style="margin-top: 5px;">Cadastrar</button>
        </form>
    </div>

</body>

</html>