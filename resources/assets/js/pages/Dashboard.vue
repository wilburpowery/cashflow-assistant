<template>
  <div>
      <h4>Registra un nuevo movimiento</h4>
            <form action="#">
                <div class="form-group">
                    <label for="description">Descripción</label>
                    <input type="text" class="form-control" name="description" id="description" placeholder="Descripción sobre el movimiento...">
                </div>
                <div class="form-group">
                    <label for="amount">Precio</label>
                    <input type="text" class="form-control" name="amount" id="amount" placeholder="1500">
                </div>
                <div class="form-group">
                    <button class="btn btn-primary">Guardar</button>
                </div>
            </form>
  </div>
</template>

<script>
export default {
  
}
</script>

