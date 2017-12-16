<template>
    <application-layout>
        <h1 slot="header">Dashboard</h1>
        <div class="row">
            <div class="col-md-4">
                <div class="box card">
                    <h4 class="card-number">{{ income | toMoney }}</h4>
                    <div class="line"></div>
                    <p class="card-title">Total ingresos</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box card">
                    <h4 class="card-number">{{ expense | toMoney }} </h4>
                    <div class="line"></div>
                    <p class="card-title">Total egresos</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box card">
                    <h4 class="card-number">
                        <span v-if="dailyBudget">
                            {{dailyBudget.total | toMoney}}
                        </span>
                        <span v-else>
                                {{0 | toMoney}}
                        </span>
                    </h4>
                    <div class="line"></div>
                    <p class="card-title">Balance Inicial</p>
                </div>
            </div>
        </div>
        <hr>

        <div class="row">
            <div class="col-md-6">
                <h4>Ingresos Recientes:</h4>
                <ul class="list-group">
                    <li class="list-group-item income" v-for="income in latestIncomes" :key="income.id">
                        {{ income.description }} <span class="pull-right">{{ income.total | toMoney }}</span>
                    </li>
                </ul>
            </div>
            <div class="col-md-6">
                    <h4>Egresos Recientes:</h4>
                    <ul class="list-group">
                        <li class="list-group-item expense" v-for="expense in latestExpenses" :key="expense.id">
                            {{ expense.description }} <span class="pull-right">{{ expense.total | toMoney }}</span>
                        </li>
                    </ul>
            </div>
        </div>
    </application-layout>
</template>

<script>
    export default {
        created() {
            this.fetchStats();
            this.loadLatestsStats();
            document.title = 'Dashboard';
        },
        data() {
            return {
                income: null,
                expense: null,
                dailyBudget: {
                    total: 0
                },
                latestIncomes: [],
                latestExpenses: []
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
            fetchStats() {
                axios.get('/accounting/data')
                .then(response => {
                    this.income = response.data.income;
                    this.expense = response.data.expense;
                    this.dailyBudget = response.data.dailyBudget;
                })
            },
            loadLatestsStats() {
                axios.get('/dashboard/latest')
                    .then(response => {
                        this.latestIncomes = response.data.incomes;
                        this.latestExpenses = response.data.expenses;
                    }).catch(error => console.log(error));
            }
        }
    }
</script>

<style lang="scss" scoped>
    @import "../../sass/_variables";
    
    .box {
        background-color: #fff;
        padding: 1em;
        border-top: 4px solid $brand-primary;
        box-shadow: 0 2px 3px 0 rgba(0,0,0,.075);
        border-radius: 5px;
    }
    
    .card-number {
        color: #444;
        font-weight: 700;
    }
    
    .card-title {
        color: #888;
        font-weight: 700;
    }
    .line {
        width: 100%;
        max-width: 7rem;
        height: 3px;
        margin: 1rem 0 2rem;
        background: #11B8AB;
    }
    .income {
        border-right: 5px solid $brand-success;
        border-top-right-radius: 6px;
        border-bottom-right-radius: 6px;
        margin-bottom: 10px;
    }
    .expense {
        border-right: 5px solid $brand-danger;
        border-top-right-radius: 6px;
        border-bottom-right-radius: 6px;
        margin-bottom: 10px;
    }
</style>

