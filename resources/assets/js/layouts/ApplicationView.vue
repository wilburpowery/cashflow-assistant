<template>
    <div class="col-md-10 col-sm-9">
        <div class="panel panel-default">
            <div class="panel-heading">
                <slot name="header"></slot>
            </div>
            <div class="panel-body">
                <slot />
            </div>
        </div>
    </div>
</template>

<script>
export default {
}
</script>

<style lang="scss" scoped>
.panel {
    border: none;
}
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


