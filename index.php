<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Prova PW3</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="estilo.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body>
    <div class="contato">
        <form action="" method="POST" enctype="multipart/form-data">
            <h3>Cadastro de Produto</h3>
            <label for="descricao">Descrição*</label><br>
            <input type="text" id="descricao" class="form-control" autofocus=""><br>

            <label for="unidade">Unidade</label><br>
            <select id="unidade" class="form-control">
                <option value="UN">UN</option>
                <option value="KG">KG</option>
                <option value="LT">LT</option>
                <option value="G">G</option>
            </select><br>

            <label for="valor">Valor (R$)*</label><br>
            <input type="number" id="valor" class="form-control" autofocus=""><br>

            <label for="desconto">Desconto</label><br>
            <input type="number" id="desconto" class="form-control" autofocus=""><br>

            <label for="estoque">Quantidade em estoque*</label><br>
            <input type="number" id="estoque" class="form-control" autofocus=""><br>

            <button type="button" class="btn btn-lg btn-primary btn-block" onclick="gravar()">Gravar</button>
        </form>
    </div>
    <script>
        function gravar() {
            let descricao, unidade, valor, desconto, estoque;

            descricao = document.getElementById("descricao").value;
            unidade = document.getElementById("unidade").value;
            valor = document.getElementById("valor").value;
            desconto = document.getElementById("desconto").value;
            estoque = document.getElementById("estoque").value;

            if (descricao, valor, estoque != "" && estoque >= 0 && desconto < valor) {
                $.post(
                    "cadastrar.php", {
                        descricao: descricao,
                        unidade: unidade,
                        valor: valor,
                        desconto: desconto,
                        estoque: estoque
                    },

                    function(data) {
                        if (data.resp == false) {
                            window.alert(`Ocorreu um erro:"${data.msg}"`);
                        } else {
                            window.alert(data.msg);
                            location.reload();
                        }
                    },
                    "JSON")
            } else {
                window.alert(`Corrija o formulário!`);
            }
        }
    </script>
</body>
</html>