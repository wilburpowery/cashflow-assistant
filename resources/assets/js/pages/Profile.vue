<template>
  <application-layout>
      <h1 slot="header">Perfíl</h1>
      
      <div class="row">
        <div class="col-md-12 text-center user-info">
          <img src="http://www.activprayer.com/media/profile_images/default.png" alt="User Image"> 
          <p v-text="user.name"></p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <div class="row">
            <div class="col-md-4">
              <label for="">Nombre:</label>
              <p v-text="user.name"></p>
            </div>
            <div class="col-md-4">
              <label for="">Email:</label>
              <p v-text="user.email"></p>
            </div>
            <div class="col-md-4 d-flex align-items-center">
              <label for="" class="m-0">Administrador?</label>
              <svg class="icon icon-sm is-error" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" v-if="!user.is_admin"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zM11.4 10l2.83-2.83-1.41-1.41L10 8.59 7.17 5.76 5.76 7.17 8.59 10l-2.83 2.83 1.41 1.41L10 11.41l2.83 2.83 1.41-1.41L11.41 10z"/></svg>

              <svg class="icon icon-sm is-success" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" v-else><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM6.7 9.29L9 11.6l4.3-4.3 1.4 1.42L9 14.4l-3.7-3.7 1.4-1.42z"/></svg>

            </div>
          </div>
        <button class="btn btn-info" @click="editMode">Editar</button>
        </div>
      </div>
  </application-layout>
</template>

<script>
import {mapState} from 'vuex';
export default {
  computed: {
    ...mapState(['user']),
  },

  methods: {
    editMode() {
      console.log('Editing');
    }
  }
}
</script>
<style lang="scss" scoped>
.user-info {
  border-bottom: 1px solid #e3e3e3;
  margin-bottom: 1em;

    img {
    width: 100px;
    height: 100px;
    border-radius: 100%;
    margin-bottom: 1em;
    border: 2px solid #e3e3e3;
    padding: .5em;
  }
  p {
    font-size: 1.1em;
    text-transform: capitalize;
  }
}

.icon-sm {
  height: 20px;
  width: 20px;
}
.icon {
  margin-left: 10px;
}
.icon.is-error {
  fill: red;
}
.icon.is-success {
  fill: green;
}
.m-0 {
  margin: 0 !important;
}
.d-flex {
  display: flex;
}
.align-items-center {
  align-items: center;
}
</style>


