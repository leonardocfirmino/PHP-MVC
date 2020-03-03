<div class="modal-content">
    <form onsubmit="editSale(event)" method="POST" id="editSale">
        <h1 class="center-align">Editar Venda</h1>
        
        <div class="input-field">
            <input name="eCliente" id="eCliente" type="text" class="validate" value="<?php echo $data[0]["cliente_venda"]; ?>" required>
            <label class="active" for="eCliente">Nome do Cliente</label>
        </div>

        <div class="input-field">
            <select id="eVendedor">
                <option value="<?php echo $data[0]['vendedor_venda'] ?>" selected><?php echo $data[2]['nome_func'] ?></option>
                <?php foreach($data[1] as $vend) {
                    echo "<option value=".$vend['id_func'].">".$vend['nome_func']."</option>";
                }?>
            </select>
            <label>Vendedores</label>
        </div>

        <div class="input-field">
            <input name="ePreco" id="ePreco" type="text" class="validate" value="<?php echo $data[0]["preco_venda"]; ?>" required>
            <label class="active" for="ePreco">Preço</label>
        </div>

        <div class="input-field">
            <input name="eDate" id="eDate" type="text" class="validate" value="<?php echo $data[0]["data_venda"]; ?>" readonly>
            <label class="active" for="eDate">Data/Hora</label>
        </div>

        <input type="hidden" name="eId" id="eId" value="<?php echo $data[0]["id_venda"]; ?>">
        
        <button class="btn waves-effect waves-light btn" type="submit" name="action">Enviar
            <i class="material-icons right">send</i>
        </button>
    </form>
</div>
<script>
      $(document).ready(function(){
    $('select').formSelect();
    $('#ePreco').mask('00.000.000,00', {reverse: true});
  });
</script>
