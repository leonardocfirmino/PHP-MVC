<div class="modal-content">
    <form onsubmit="editEmployeer(event)" id="editEmp" method="POST">
        <h1 class="center-align">Editar funcionario</h1>
        <div class="input-field">
            <input name="eNome" id="eNome" type="text" class="validate" value="<?php echo $data["nome_func"]; ?>" required>
            <label class="active" for="eNome">Nome do Funcionario</label>
        </div>

        <div class="input-field">
            <input name="eIdade" id="eIdade" type="text" class="validate" value="<?php echo $data["idade_func"]; ?>" required>
            <label class="active" for="eIdade">Idade</label>
        </div>

        <div class="input-field">
            <input name="eSalario" id="eSalario" type="text" class="validate" value="<?php echo $data["salario_func"]; ?>" required>
            <label class="active" for="eSalario">Preço</label>
        </div>

        <div class="input-field">
            <input name="eCpf" id="eCpf" type="text" class="validate" value="<?php echo $data["cpf_func"]; ?>" required>
            <label class="active" for="eCpf">Cpf</label>
        </div>

        <input type="hidden" name="eId" id="eId" value="<?php echo $data["id_func"]; ?>">
        
        <button class="btn waves-effect waves-light btn" type="submit" name="action">Enviar
            <i class="material-icons right">send</i>
        </button>
    </form>
</div>
<script>$(document).ready(function(){
    $('#eCpf').mask('000.000.000-00', {reverse: false});
    $('#eSalario').mask('00.000.000,00', {reverse: true});
})</script>
