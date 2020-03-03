<style>
    #modal1{
        height:60%;
    }
    form{
        margin-top:40px;
    }
</style>
<div class="modal-content">
    <h3 class="center">Gerar relatorio do vendedor</h3>
    <form onsubmit="sendEmail(event)" id="newSale" method="POST">

        <div class="input-field">
            <select id="vendedor" name="vendedor">
                <option value="" disabled selected>Vendedores</option>
                <?php foreach($data as $vend) {
                    echo "<option value=".$vend['id_func'].">".$vend['nome_func']."</option>";
                }?>
            </select>
            <label>Vendedor</label>
        </div>

        <div class="input-field">
            <input name="email" id="email" type="email" class="validate" required>
            <label class="active" for="email">Email para envio</label>
        </div>

        <button class="btn waves-effect waves-light btn" type="submit" name="action">Enviar
            <i class="material-icons right">send</i>
        </button>

    </form>
</div>
<script>
    $(document).ready(function(){
        $('select').formSelect();
    });
</script>