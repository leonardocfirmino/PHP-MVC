<div class="col s6 home offset-s1">
                <table class="centered highlight responsive">
                    <thead>
                         <tr>
                            <th>Total de Vendas</th>
                            <th>Cpf</th>
                            <th>Nome</th>
                            <th>Idade</th>
                            <th>Salario</th>
                        </tr>
                    </thead>
<?php foreach($data as $emp) {?>
                    <tbody>
                        <tr>
                            <td><?php echo $emp['COUNT(*)']; ?></td>
                            <td><?php echo $emp['cpf_func']; ?></td>
                            <td><?php echo $emp['nome_func']; ?></td>
                            <td><?php echo $emp['idade_func']; ?></td>
                            <td><?php echo 'R$ '.number_format($emp['salario_func'], 2, ',', '.'); ?></td>
                        </tr>
                     </tbody>
<?php } ?>
                 </table>
            </div>