<template>
    <application-layout>
        <h1 slot="header">Crear un nuevo usuario</h1>
        
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <form @submit.prevent="addUser">
                    <div class="form-group">
                        <label>Name:</label>
                        <input type="text" class="form-control" v-model="user.name" required>
                    </div>
                    <div class="form-group">
                        <label>Correo:</label>
                        <input type="email" class="form-control" v-model="user.email" required>
                    </div>
                    <div class="form-group">
                        <label for="">Contraseña:</label>
                        <input type="password" class="form-control" v-model="user.password" required>
                    </div>
                    <div class="form-group">
                        <label for="">Confirmación de contraseña:</label>
                        <input type="password" class="form-control" v-model="user.password_confirmation" required>
                    </div>
                    
                    <div class="form-group">
                        <button class="btn btn-primary">Agregar Usuario <i class="fa fa-plus"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </application-layout>
</template>

<script>
    import { required, email, sameAs, minLength } from 'vuelidate/lib/validators'
    export default {
        data() {
            return {
                user: {}
            }
        },
        validations: {
            name: {
                required
            },
            email: {
                required,
                email
            },
            password: {
                required,
                minLength: minLength(6)
            },
            password_confirmation: {
                required,
                sameAsPassword: sameAs('password')
            }
        },

        methods: {
            addUser() {
                axios.post('/users', this.user)
                    .then(response => {
                        this.Alert.success('Se ha agregado el nuevo usuario!')
                            .then(() => {
                                this.$router.push({name: 'settings'});
                            })
                    })
            }
        }
    }
</script>