<template>
  <application-layout>
      <h1 slot="header">Cierre Diario</h1>

      <form class="form-horizontal" @submit.prevent="add" v-if="loaded">
        <div class="form-group">
          <label class="col-sm-3 control-label">Balance Inicial</label>
          <div class="col-sm-9">
            <div class="row">
              <div class="col-sm-9">
                  <input type="text" class="form-control" v-model="daily_budget" disabled>
              </div>
              <div class="col-sm-3">
                {{daily_budget | toMoney}}
              </div>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-3 control-label">Ingresos</label>
          <div class="col-sm-9">
            <div class="row">
              <div class="col-sm-9">
                  <input type="text" class="form-control" v-model="income" disabled>
              </div>
              <div class="col-sm-3">
                {{income | toMoney}}
              </div>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="" class="col-sm-3 control-label">Egresos</label>
          <div class="col-sm-9">
           <div class="row">
             <div class="col-sm-9">
                <input type="text" class="form-control" v-model="expense" disabled>
             </div>
             <div class="col-sm-3">
               {{expense | toMoney}}
             </div>
           </div>
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-3 control-label">Servicio de Transferencias</label>
          <div class="col-sm-9">
           <div class="row">
             <div class="col-sm-9">
                <input type="text" class="form-control" v-model.number="data.transfers">
             </div>
             <div class="col-sm-3">
               {{data.transfers | toMoney}}
             </div>
           </div>
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-3 control-label">Pagos y retiros con Tarjeta</label>
          <div class="col-sm-9">
            <div class="row">
              <div class="col-md-9">
                  <input type="text" class="form-control" placeholder="Acumulado de mov banco pago y retiro con tarjeta" v-model.number="data.card_payments">
              </div>
              <div class="col-sm-3">
                {{data.card_payments | toMoney}}
              </div>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-3 control-label">Recaudo SP</label>

          <div class="col-sm-9">
            <div class="row">
              <div class="col-sm-3">
                <input type="text" class="form-control" placeholder="digitar recaudo total SP" v-model.number="data.earn_sp">
              </div>
              <div class="col-sm-3">
                <input type="text" class="form-control" placeholder="digitar recaudo a depositar" v-model.number="data.deposit_sp">
              </div>
              <div class="col-sm-6">
               <div class="row">
                 <div class="col-sm-6">
                    <input type="text" class="form-control" placeholder="comision = total recaudo - total a depositar" v-model.number="commission_sp" disabled>
                 </div>
                 <div class="col-sm-6">
                   {{commission_sp | toMoney}}
                 </div>
               </div>
              </div>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-3 control-label">Recargas</label>
          <div class="col-sm-9">
            <div class="row">
              <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="digitar monto recargado" v-model.number="data.refills">
              </div>
              <div class="col-sm-8">
                <div class="row">
                  <div class="col-sm-7">
                      <input type="text" class="form-control" placeholder="comision = monto * 6%" v-model.number="refills_commission" disabled>
                  </div>
                  <div class="col-sm-5">
                    {{refills_commission | toMoney}}
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-3 control-label">Efectivo en cajas</label>
          <div class="col-sm-9">
            <div class="row">
              <div class="col-sm-9">
                  <input type="text" class="form-control" placeholder="digitar valores en caja (efectivo y cheques)" v-model.number="data.cash_box">
              </div>
              <div class="col-sm-3">
                {{data.cash_box | toMoney}}
              </div>
            </div>
          </div>
        </div>
        <hr>        
        <div class="form-group">
          <label for="" class="col-sm-3 control-label">Balance final</label>
          <div class="col-sm-9">
           <div class="row">
             <div class="col-sm-9">
                <input type="text" class="form-control" placeholder="Efectivo en cajas - (Balance Inicial + Ingresos + Servicios Transferencias + Total Recaudado SP + Total Recargado - egresos - pagos con tarjeta)" v-model.number="final_balance" disabled>
             </div>
             <div class="col-sm-3">
               {{ final_balance | toMoney}}
             </div>
           </div>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label">Balance Real</label>
          <div class="col-sm-9">
           <div class="row">
             <div class="col-sm-9">
                <input type="text" class="form-control" placeholder="(Balance Inicial + Ingresos - egresos + comision recaudo sp + comision recargas  - egresos )" v-model.number="real_balance" disabled>
             </div>
             <div class="col-sm-3">
               {{ real_balance | toMoney}}
             </div>
           </div>
          </div>
        </div>

        <div class="form-group">
          <div class="col-sm-6 col-sm-offset-3">
            <button class="btn btn-primary mr-1">Guardar</button>
            <button class="btn btn-default">Cancelar</button>
          </div>
        </div>

      </form>
  </application-layout>
</template>

<script>
  export default {
    created() {
      this.fetchAccoutingData();
    },
    data() {
      return {
        loaded: false,
        daily_budget: false,
        income: false,
        expense: false,
        data: {
          transfers: 0,
          card_payments: 0,
          earn_sp: 0,
          deposit_sp: 0,
          refills: 0,
          cash_box: 0
        }
      }
    },
    filters: {
      toMoney(value) {
        return window.accounting.formatMoney(value, {symbol: 'CRC', format: '%v %s'}, 2);
      }
    },
    computed: {
      commission_sp() {
        return this.data.earn_sp - this.data.deposit_sp;
      },
      refills_commission() {
        return this.data.refills * 0.06;
      },
      final_balance() {
        return this.data.cash_box - (this.daily_budget + this.income + this.data.transfers + this.data.earn_sp + this.data.refills - this.expense - this.data.card_payments);
      },
      real_balance() {
        return this.data.cash_box - (this.daily_budget + this.income + this.data.transfers + this.commission_sp + this.refills_commission - this.expense - this.data.card_payments);
      }
    },
    methods: {
      fetchAccoutingData() {
        axios.get('/accounting/data')
          .then(response => {
            this.daily_budget = response.data.dailyBudget.total;
            this.income = response.data.income;
            this.expense = response.data.expense;
            this.loaded = true;
          })
      }
    }
  }
</script>
