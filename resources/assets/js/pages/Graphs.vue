<template>
    <application-layout>
        <h1 slot="header">Gráficos</h1>
        <graph url="/graphs/incomes"></graph>
    </application-layout>
</template>
<script>
    import Graph from '../components/Graph.vue';
    export default {
        components: {Graph}
    }
</script>