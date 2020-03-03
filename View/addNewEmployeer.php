<div class="modal-content">
    <form onsubmit="addNewEmployeer(event)" id="newEmp" method="POST">
        <h1 class="center-align">Novo Vendedor</h1>
        
        <div class="input-field">
            <input name="nome" id="nome" type="text" class="validate" required>
            <label class="active" for="nome">Nome do Funcionario</label>
        </div>

        <div class="input-field">
            <input name="idade" id="idade" type="number" class="validate" required>
            <label class="active" for="idade">Idade</label>
        </div>

        <div class="input-field">
            <input name="salario" id="salario" type="text" class="validate" required>
            <label class="active" for="salario">Salario</label>
        </div>

        <div class="input-field">
            <input name="cpf" id="cpf" type="text" class="validate" required>
            <label class="active" for="cpf">Cpf</label>
        </div>

        
        <button class="btn waves-effect waves-light btn" type="submit" name="action">Enviar
            <i class="material-icons right">send</i>
        </button>
    </form>
</div>
<script>$(document).ready(function(){
    $('#cpf').mask('000.000.000-00', {reverse: false});
    $('#salario').mask('00.000.000,00', {reverse: true});
})</script>

   

