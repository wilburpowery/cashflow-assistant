<template>
    <application-layout>
        <h1 slot="header">Dashboard</h1>
        <div class="row">
            <div class="col-md-4">
                <div class="box card">
                    <h4 class="card-number">$128,421.01</h4>
                    <p class="card-title">Total ingresos</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box card">
                    <h4 class="card-number">$128,421.01</h4>
                    <p class="card-title">Total egresos</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box card">
                    <h4 class="card-number">$128,421.01</h4>
                    <p class="card-title">Total Cuentas</p>
                </div>
            </div>
        </div>
    </application-layout>
</template>

<script>
    export default {
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
</style>

