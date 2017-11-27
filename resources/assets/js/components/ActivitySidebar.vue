<template>
  <div>
      <h2>Activity Status</h2>
        <ul class="list-group">
            <li class="list-group-item" v-for="activity in activities" :key="activity.id">{{ activity.description }}</li>
        </ul>
  </div>
</template>
<script>
export default {
    data() {
        return {
            activities: [
                {
                    id: 1,
                    description: '25$ exit'
                },
                {
                    id: 2,
                    description: '30$ entry'
                }
            ]
        }
    }
};
</script>

