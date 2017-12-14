<template>
  <application-layout>
    <h1 slot="header">Egresos</h1>
    <div class="row">
      <div class="col-md-12">
        <router-link class="btn btn-primary pull-right" :to="{ name: 'expenses.create' }">Nuevo Egreso <i class="fa fa-plus"></i></router-link>
      </div>
    </div>
    <h4>Egresos del día</h4>
    
    <div class="row" id="headings">
      <div class="col-xs-1 text-center justify-content-center">ID</div>
      <div class="col-xs-2">Tipo</div>
      <div class="col-xs-3">Detalle</div>
      <div class="col-xs-2">Total</div>
      <div class="col-xs-2">Tiempo</div>          
      <div class="col-xs-2 text-center">Acción</div>
    </div>
    
     <template v-if="expenses.length">
      <div class="row" v-for="expense in expenses" :key="expense.id">
        <div class="col-md-12">
          <div class="row expense-item">
            <div class="col-md-1 text-center" v-text="expense.id"></div>
            <div class="col-md-2">{{ types[expense.type] }}</div>
            <div class="col-md-3" v-text="expense.description"></div>
            <div class="col-md-2">{{ expense.total | toMoney}}</div>
            <div class="col-md-2">{{ expense.created_at | formatFromTime }}</div>
            <div class="col-md-2 actions text-center">
              <i class="fa fa-pencil text-primary icon" @click="showIncome(expense)"></i>
              <i class="fa fa-trash text-danger icon icon-danger" @click="destroy(expense)"></i>
            </div>
          </div>
        </div>
      </div>
     </template>
      <p v-else class="text-center">No hay egresos aún.</p>
    
  </application-layout>
</template>

<script>
  export default {
    created() {
      this.fetchExpenses();
    },
    
    data() {
      return {
        expenses: [],
        types: {
          "cash-cuts": "Cortes de caja",
          "expenses": "Gastos",
          "payments": "Pagos",
          "other": "Otro"
        },
      }
    }, 
    
    filters: {
      toMoney(value) {
        return window.accounting.formatMoney(value, {symbol: 'CRC', format: '%v %s'}, 2);
      },
      formatFromTime(time) {
        return window.moment(time).fromNow();
      }
    },
    
    methods: {
      fetchExpenses() {
        axios.get('/expenses')
        .then(response => {
          this.expenses = response.data
        }).catch(error => console.log(error));
      },
      
      showIncome(expense) {
        this.$router.push({name: 'expenses.show', params: {id: expense.id, expense: expense}});
      },
      
      destroy(expense) {
        this.Alert.warning('Estas seguro de borrar el egreso?')
        .then((message) => {
          axios.delete(`/expenses/${expense.id}`)
          .then(response => {
            this.expenses.splice(this.expenses.indexOf(expense), 1);
            this.Alert.success('Egreso borrado');
          }).catch(error => {
            console.log('Error');
          })
        })
      }
    }
  }
</script>

<style lang="scss" scoped>
  @import "../../../sass/variables";    
  
  .justify-content-center {
    justify-content: center;
  }
  #headings div {
    background-color: $brand-success;
    color: #fff;
    min-height: 50px;
    display: flex;
    align-items: center;
  }
  
  .expense-item:hover {
    background-color: #f7f6f6;
  }
  .expense-item {
    display: flex;
    align-items: center;
    border-bottom: 1px solid #e3e3e3;
    min-height: 50px;
    
    &:hover {
      cursor: pointer;
    }
    
    &:hover .actions {
      opacity: 1;
    }
    
    .actions {
      opacity: 0;
      padding: 5px 30px;
    }
  }
  
  .icon {
    font-size: 1.4em;
    margin-right: 5px;
    background-color: $brand-primary;
    padding: 7px;
    color: #fff;
    border-radius: 100%;
    font-size: 14px;
    
    &:hover {
      cursor: pointer;
    }
  }
  
  .icon-danger {
    background-color: $brand-danger;
  }
</style>

