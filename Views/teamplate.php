<!DOCTYPE html>
<html>

<head>
    <title>|Avalia Sistemas CRUD</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</head>

<body>
    <!-- CABEÇALHOS -->
    <?php
    $this->carregarViewNoTeamplate($nomeView, $acao, $dadosModel);
    ?>


    <!-- RODAPE -->
</body>

</html>




<script>
    function db() {
        const arrayInputs = document.querySelectorAll('[name]');
        const dados = {};


        for (const input of arrayInputs) {

            let value = input.value;
            let name = input.name;

            let checkName = name.split('_');
            let acao = checkName[2];

            if (checkName.length === 5 && (acao == 'u' || acao == 'i')) {
                dados[name] = value;

            } else {
                console.log(`Nome de Input ${name} esta fora dos parametros e não será enviado!`)
            }

        }

        console.log(`dados enviados por post: `);
        console.log(dados);

        $.ajax({
            url: "Core/mysqlControl.php",
            data: dados

        }).done(function() {
            alert('enviado')
        });

    }
</script>