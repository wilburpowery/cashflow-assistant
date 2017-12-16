<template>
  <application-layout>
    <h1 slot="header">Configuraciónes</h1>
    <form class="form-horizontal" @submit.prevent="addDailyBudget">
      <div class="form-group">
        <label class="col-sm-3 control-label">Balance Inicial de Hoy</label>
        <div class="col-sm-9">
          <div class="row">
            <div class="col-md-9">
              <input type="text" class="form-control" placeholder="Balance del dia." v-model.number="daily_budget" :disabled="hasBudget" required>
              <p class="bold">{{ daily_budget | toMoney }}</p>
            </div>
          </div>
        </div>
      </div>
      
      <div class="form-group">
        <div class="col-sm-6 col-sm-offset-3">
          <button class="btn btn-primary" :disabled="hasBudget">
            <span v-if="! hasBudget">
              Agregar Balance Inicial <i class="fa fa-plus"></i>  
            </span>
            <span v-else>
              Ya existe un balance inicial
            </span>
          </button>
        </div>
      </div>
      
      <!-- Admin -->
      <div class="col-md-12" v-if="isAdmin">
        <hr>
        <div class="col-md-6">
          <h4>Usuarios</h4>
          <ul class="list-group">
            <li class="list-group-item" v-for="user in users" :key="user.id">
              {{user.name}} 
              <span class="pull-right">{{ user.is_admin ? 'Admin' : '' }}</span>
            </li>
          </ul>
          <router-link class="btn btn-info btn-sm" :to="{name: 'users.create'}">Nuevo Usuario <i class="fa fa-plus"></i></router-link>
        </div>
      </div>
    </form>
  </application-layout>
</template>

<script>
  export default {
    created() {
      this.fetchDailyBudget();
      this.fetchUsers();
      document.title = 'Configuraciones';
    },
    data() {
      return {
        daily_budget: '',
        users: [],
        hasBudget: false
      }
    },
    filters: {
      toMoney(value) {
        return window.accounting.formatMoney(value, {symbol: 'CRC', format: '%v %s'}, 2);
      }
    },
    methods: {
      fetchDailyBudget() {
        axios.get('/daily-budgets')
        .then(response => {
          if(response.data.budget) {
            this.hasBudget = true;
          }
          this.daily_budget = response.data.budget.total;
        }).catch(error => {
          this.Alert.error('Error revisando el balance inicial');
        })
      },
      fetchUsers() {
        axios.get('/users')
        .then(response => {
          this.users = response.data;
        })
      },
      addDailyBudget() {
        axios.post('/daily-budgets', {
          daily_budget: this.daily_budget
        }).then(response => {
          this.hasBudget = true;
          this.Alert.success('Se ha guardado el balance inicial para este día!');
        }).catch(error => {
          this.Alert.error();
        })
      }
    }
  }
</script>
