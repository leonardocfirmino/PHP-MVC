<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>PDF</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="<?php echo URL_BASE; ?>/Assets/css/style.css">
</head>
<body>
<div class="col s6">
    <h3 class="center" style="color:#f2f2f2;"><?php echo "Relatorio do vendedor ".$data[1]['nome_func'] ?></h3>
                <table id="pdfTable" class="centered">
                    <thead>
                         <tr>
                            <th>Cliente</th>
                            <th>Vendedor</th>
                            <th>Preço</th>
                            <th>Data/Hora</th>
                        </tr>
                    </thead>
<?php foreach($data[0] as $sales) {?>
                    <tbody id="cont">
                        <tr>
                            <td><?php echo $sales['cliente_venda']; ?></td>
                            <td><?php echo $sales['vendedor_venda']; ?></td>
                            <td><?php echo $sales['preco_venda']; ?></td>
                            <td><?php $date = new DateTime($sales['data_venda']); echo $date->format("d/m/Y H:i:s");  ?></td>
                        </tr>
                     </tbody>
<?php } ?>
                 </table>
            </div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>