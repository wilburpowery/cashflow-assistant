<template>
  <div class="row">
        <div class="col-md-2">
            <menu-sidebar></menu-sidebar>
        </div>
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <slot name="header"></slot>
                </div>
                <div class="panel-body">
                    <slot />
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import MenuSidebar from '../components/MenuSidebar.vue';
import ActivitySidebar from '../components/ActivitySidebar.vue';
export default {
  components: {MenuSidebar}
}
</script>

<style lang="scss" scoped>
.panel-heading {
    border: none;
    * {
        font-size: 2em;
        font-weight: 700;
    }
}
.panel-body {
    border: none;
    background-color: #fafafa;
}
</style>


