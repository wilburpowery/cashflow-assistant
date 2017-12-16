<template>
  <div>
    <img src="http://www.activprayer.com/media/profile_images/default.png" alt="User Image" style="width: 50px; height: 50px; border-radius: 100%;"> <span v-text="user.name"></span>
    <hr>
    <ul class="list-group">
        <router-link tag="li" to="/dashboard" class="list-group-item">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 20a10 10 0 1 1 0-20 10 10 0 0 1 0 20zm-5.6-4.29a9.95 9.95 0 0 1 11.2 0 8 8 0 1 0-11.2 0zm6.12-7.64l3.02-3.02 1.41 1.41-3.02 3.02a2 2 0 1 1-1.41-1.41z"/></svg>
            Dashboard
        </router-link>
        <router-link tag="li" to="/incomes" class="list-group-item">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 20a10 10 0 1 1 0-20 10 10 0 0 1 0 20zm1-5h1a3 3 0 0 0 0-6H7.99a1 1 0 0 1 0-2H14V5h-3V3H9v2H8a3 3 0 1 0 0 6h4a1 1 0 1 1 0 2H6v2h3v2h2v-2z"/></svg>                    
            Ingresos
        </router-link>                
        <router-link tag="li" to="/expenses" class="list-group-item">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 20a10 10 0 1 1 0-20 10 10 0 0 1 0 20zm1-5h1a3 3 0 0 0 0-6H7.99a1 1 0 0 1 0-2H14V5h-3V3H9v2H8a3 3 0 1 0 0 6h4a1 1 0 1 1 0 2H6v2h3v2h2v-2z"/></svg>                    
            Egresos
        </router-link>
        <router-link tag="li" to="/clients" class="list-group-item">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M7 8a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm0 1c2.15 0 4.2.4 6.1 1.09L12 16h-1.25L10 20H4l-.75-4H2L.9 10.09A17.93 17.93 0 0 1 7 9zm8.31.17c1.32.18 2.59.48 3.8.92L18 16h-1.25L16 20h-3.96l.37-2h1.25l1.65-8.83zM13 0a4 4 0 1 1-1.33 7.76 5.96 5.96 0 0 0 0-7.52C12.1.1 12.53 0 13 0z"/></svg>
            Mis Clientes
        </router-link>
        <router-link tag="li" to="/payments" class="list-group-item">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M18 6V4H2v2h16zm0 4H2v6h16v-6zM0 4c0-1.1.9-2 2-2h16a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm4 8h4v2H4v-2z"/></svg>
            Cuentas
        </router-link>
        <router-link tag="li" to="/profile" class="list-group-item">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 20a10 10 0 1 1 0-20 10 10 0 0 1 0 20zM7 6v2a3 3 0 1 0 6 0V6a3 3 0 1 0-6 0zm-3.65 8.44a8 8 0 0 0 13.3 0 15.94 15.94 0 0 0-13.3 0z"/></svg>                    
            Perfíl
        </router-link>
        <router-link tag="li" to="/accounting" class="list-group-item">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M0 4c0-1.1.9-2 2-2h15a1 1 0 0 1 1 1v1H2v1h17a1 1 0 0 1 1 1v10a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm16.5 9a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"/></svg>
            Caja
        </router-link>
        <router-link tag="li" to="/settings" class="list-group-item">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M6.47 9.8A5 5 0 0 1 .2 3.22l3.95 3.95 2.82-2.83L3.03.41a5 5 0 0 1 6.4 6.68l10 10-2.83 2.83L6.47 9.8z"/></svg>
            Configuración
        </router-link>
        <router-link tag="li" to="/graphs" class="list-group-item" v-if="isAdmin">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M4.13 12H4a2 2 0 1 0 1.8 1.11L7.86 10a2.03 2.03 0 0 0 .65-.07l1.55 1.55a2 2 0 1 0 3.72-.37L15.87 8H16a2 2 0 1 0-1.8-1.11L12.14 10a2.03 2.03 0 0 0-.65.07L9.93 8.52a2 2 0 1 0-3.72.37L4.13 12zM0 4c0-1.1.9-2 2-2h16a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4z"/></svg>
            Gráficos
        </router-link>
    </ul>
</div>
</template>
<script>
import {mapState} from 'vuex';
export default {
    computed: {
        ...mapState(['user'])
    }
}
</script>

<style lang="scss" scoped>
@import "../../sass/variables";
.list-group-item {
    display: flex;
    align-items: center;
    border: none;
    background-color: transparent;
    font-size: 1.2em;
    padding-left: 0;

    &:hover {
        cursor: pointer;
        color: $brand-primary;
        opacity: 1;

        svg {
            fill: $brand-primary;
        }
    }

    svg {
        margin-right: 10px;
        width: 20px;
        height: auto;
        fill: #c1c1c1;
    }
}
.router-link-active {
    color: $brand-primary;
    opacity: 1;

    svg {
        fill: $brand-primary;
    }
}
hr {
    border-top: 1px solid #bbb2b2;
    margin: .9em 0em;
}
</style>


