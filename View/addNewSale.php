<div class="modal-content">
<form onsubmit="addNewSale(event)" id="newSale" method="POST">
    <h1 class="center-align">Nova Venda</h1>
    
    <div class="input-field">
        <input name="cliente" id="cliente" type="text" class="validate" required>
        <label class="active" for="cliente">Nome do Cliente</label>
    </div>

    <div class="input-field">
      <select id="vendedor">
        <option value="" disabled selected>Vendedores</option>
        <?php foreach($data as $vend) {
          echo "<option value=".$vend['id_func'].">".$vend['nome_func']."</option>";
        }?>
      </select>
      <label>Vendedores</label>
  </div>
    <div class="input-field">
        <input name="preco" id="preco" type="text" class="validate" required>
        <label class="active" for="preco">Preço</label>
    </div>

    
    <button class="btn waves-effect waves-light btn" type="submit" name="action">Enviar
        <i class="material-icons right">send</i>
    </button>
</form>
</div>
<script>
      $(document).ready(function(){
    $('select').formSelect();
    $('#preco').mask('00.000.000,00', {reverse: true});
  });
</script>
