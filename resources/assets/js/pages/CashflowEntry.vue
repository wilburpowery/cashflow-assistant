<template>
  <application-layout>
      <h1 slot="header">Ingresos</h1>
      <div class="row">
        <div class="col-md-12">
          <router-link class="btn btn-primary pull-right" :to="{ name: 'income.create' }">Nuevo Ingreso <i class="fa fa-plus"></i></router-link>
        </div>
      </div>
      <h3>Ingresos del dia</h3>

  </application-layout>
</template>

<script>
export default {
  
}
</script>

