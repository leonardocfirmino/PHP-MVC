           <div class="col leo offset-s1">
                <a onclick="callHtmlNewEmployeer()" class="btn-large waves-effect waves-light newVenda">Novo Vendedor</a>
            </div>
            <div class="col s6 offset-s1">
                <table class="centered highlight responsive">
                    <thead>
                         <tr>
                            <th>Cpf</th>
                            <th>Nome</th>
                            <th>Idade</th>
                            <th>Salario</th>
                            <th>Editar</th>
                            <th>Excluir</th>
                        </tr>
                    </thead>
<?php foreach($data as $emp) {?>
                    <tbody id="cont">
                        <tr>
                            <td><?php echo $emp['cpf_func']; ?></td>
                            <td><?php echo $emp['nome_func']; ?></td>
                            <td><?php echo $emp['idade_func']; ?></td>
                            <td><?php echo 'R$ '.number_format($emp['salario_func'], 2, ',', '.'); ?></td>
                            <td><a onclick="callHtmlEditEmployeer(<?php echo $emp['id_func']; ?>)" class="btn-floating btn-large waves-effect waves-light edit"><i class="material-icons">edit</a></td>
                            <td><a id="<?php echo $emp['id_func']; ?>" onclick="delEmployeer(<?php echo $emp['id_func']; ?>)" class="btn-floating btn-large waves-effect waves-light del"><i class="material-icons">clear</a></td>
                        </tr>
                     </tbody>
<?php } ?>
                 </table>
            </div>