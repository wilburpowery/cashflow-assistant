<template>
  <application-layout>
    <h1 slot="header">Ingresos</h1>
    <div class="row">
      <div class="col-md-12">
        <router-link class="btn btn-primary pull-right" :to="{ name: 'incomes.create' }">Nuevo Ingreso <i class="fa fa-plus"></i></router-link>
      </div>
    </div>
    <h4>Ingresos del día</h4>
      <div class="row" id="headings">
        <div class="col-xs-1 text-center justify-content-center">ID</div>
        <div class="col-xs-2">Tipo</div>
        <div class="col-xs-3">Detalle</div>
        <div class="col-xs-2">Total</div>
        <div class="col-xs-2">Tiempo</div>          
        <div class="col-xs-2 text-center">Acción</div>
      </div>
      
      <template v-if="incomes.length">
        <div class="row" v-for="income in incomes" :key="income.id">
          <div class="col-md-12">
            <div class="row income-item">
              <div class="col-md-1 text-center" v-text="income.id"></div>
              <div class="col-md-2">{{ types[income.type] }}</div>
              <div class="col-md-3" v-text="income.description"></div>
              <div class="col-md-2">{{ income.total | toMoney}}</div>
              <div class="col-md-2">{{ income.created_at | formatFromTime }}</div>
              <div class="col-md-2 actions text-center">
                <i class="fa fa-pencil text-primary icon" @click="showIncome(income)"></i>
                <i class="fa fa-trash text-danger icon icon-danger" @click="destroy(income)"></i>
              </div>
            </div>
          </div>
        </div>
      </template>
      <p v-else class="text-center">No hay ingresos aún.</p>
  </application-layout>
</template>

<script>
  import {Alert} from '../../utilities';
  import IncomeItem from './Show.vue';
  
  export default {
    components: {IncomeItem},
    
    created() {
      this.fetchIncomes();
    },
    
    data() {
      return {
        incomes: [],
        types: {
          "sales": "Ventas",
          "commissions": "Comisiones",
          "cash": "Efectivo para cajas",
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
      fetchIncomes() {
        axios.get('/incomes')
        .then(response => {
          this.incomes = response.data
        }).catch(error => console.log(error));
      },
      
      showIncome(income) {
        this.$router.push({name: 'incomes.show', params: {id: income.id, income: income}});
      },
      
      destroy(income) {
        Alert.warning('Estas seguro de borrar el ingreso?')
        .then((message) => {
          axios.delete(`/incomes/${income.id}`)
          .then(response => {
            this.incomes.splice(this.incomes.indexOf(income), 1);
            Alert.success('Ingreso borrado');
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
  
  .income-item:hover {
      background-color: #f7f6f6;
  }
  .income-item {
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

