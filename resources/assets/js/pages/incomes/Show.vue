<template>
        <application-layout>
            <h1 slot="header">Ingreso: </h1>
        </application-layout>
    </template>
    
    <script>
    export default {
        props: {
            income: {
                type: Object,
                required: true
            }
        },

        created() {
            if(this.income == 'undefined') {
                this.router.push({name: 'incomes.index'});
            }
        }

    }
    </script>