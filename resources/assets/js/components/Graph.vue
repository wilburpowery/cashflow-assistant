<template>
    <div>
        <canvas id="myChart"></canvas>
        {{legend}}
    </div>
    
</template>

<script>
    export default {
        props: ['url'],
        mounted() {
            axios.get(this.url)
            .then(response => {
                const data = response.data;
                this.render({
                    labels: Object.keys(data),
                    datasets: [{
                        label: 'Ingresos vs. Egresos',
                        data: Object.keys(data).map(key => data[key]),
                        backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                });
            })
        },
        data() {
            return {
                legend: ''
            }
        },
        methods: {
            render(data) {
                var ctx = document.getElementById("myChart");
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: data,
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero:true
                                }
                            }]
                        }
                    }
                });
            }
        }
    }
</script>