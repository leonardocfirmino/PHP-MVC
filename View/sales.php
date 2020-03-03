    <div class="leo"></div>
        <div class="col offset-s1">
            <a onclick="callHtmlNewSale()" class="btn-large waves-effect waves-light newVenda">Nova venda</a>
            <a onclick="callNewDayPdf()" class="btn-large waves-effect waves-light new">Gerar relatorio</a>
        </div>
            <div class="col s6 offset-s1 table">
                <table class="centered highlight responsive">
                    <thead>
                         <tr>
                            <th>Cliente</th>
                            <th>Vendedor</th>
                            <th>Preço</th>
                            <th>Data/Hora</th>
                            <th>Editar</th>
                            <th>Excluir</th>
                        </tr>
                    </thead>
<?php foreach($data as $sale) {?>
                    <tbody id="cont">
                        <tr>
                            <td><?php echo $sale['cliente_venda']; ?></td>
                            <td id='tdtool'><a id="<?php echo $sale['vendedor_venda']; ?>" onmouseover="showEmp(event)" class="tool tooltipped" data-position="bottom"><?php echo $sale['vendedor_venda']; ?></a></td>
                            <td><?php echo 'R$: '.number_format($sale['preco_venda'], 2, ',', '.'); ?></td>
                            <td><?php $data = new DateTime($sale['data_venda']); echo $data->format("d/m/Y H:i:s");  ?></td>
                            <td><a onclick="callHtmlEditSale(<?php echo $sale['id_venda']; ?>)" class="btn-floating btn-large waves-effect waves-light edit"><i class="material-icons">edit</a></td>
                            <td><a id="<?php echo $sale['id_venda']; ?>" onclick="delSale(<?php echo $sale['id_venda']; ?>)" class="btn-floating btn-large waves-effect waves-light del"><i class="material-icons">clear</a></td>
                        </tr>
                     </tbody>
<?php } ?>
                 </table>
            </div>
            <script>
         
            </script>