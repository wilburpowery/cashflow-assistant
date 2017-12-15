<template>
    <input
        type="checkbox"
        :id="dataId"
        :checked="dataChecked" 
        data-toggle="toggle" 
        :data-on="dataOn" 
        :data-off="dataOff"
        :data-onstyle="dataOnStyle"
        :data-offstyle="dataOffStyle"
    >
</template>

<script>
    export default {
        props: {
            'dataOn': {}, 
            'dataOff': {},
            'dataOnStyle': {
                default: 'primary'
            },
            'dataOffStyle': {
                default: 'default'
            },
            "dataId": {
                default: 'toggle'
            },
            "dataChecked": {
                default: false
            }
        },

        mounted() {
            $(`#${this.dataId}`).bootstrapToggle();
            
            $(`#${this.dataId}`).change(() => {
                this.$emit('changed',  $(`#${this.dataId}`).prop('checked'));
            });
        }

    }
</script>

<style>
    
</style>