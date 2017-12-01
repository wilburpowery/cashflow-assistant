<template>
    <div>
        
        <div class="panel panel-default">
            <div class="panel-heading">Register</div>
            
            <div class="panel-body">
                
                <form v-if="showBusinessForm" @submit.prevent="registerBusiness">
                    <p class="text-muted">Danos un poco de información sobre tu empresa. </p>
                    <div class="form-group">
                        <label for="business_name">Nombre:</label>
                        <input type="text" class="form-control" placeholder="Nombre de tu empresa" v-model="business.name" required>
                    </div>
                    <div class="form-group">
                        <label for="business_description">Descripción:</label>
                        <textarea name="business_description" id="business_description" rows="5" class="form-control" placeholder="Describe aqui las actividades de tu empresa" v-model="business.description" required></textarea>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success">Registrar Empresa</button>
                    </div>
                </form>
                
                <form @submit.prevent="registerUser" v-else>
                    <p class="text-muted">Registra tu primer usuario ahora. Este usuario tendrá permisos de administrador.</p>
                    <div class="form-group">
                        <label for="name">Name</label>
                        
                        <input id="name" type="text" class="form-control" name="name" v-model="user.name" required autofocus>
                    </div>
                    
                    <div class="form-group">
                        <label for="email">E-Mail Address</label>
                        
                        <input id="email" type="email" class="form-control" name="email" v-model="user.email" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input id="password" type="password" class="form-control" name="password" v-model="user.password" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="password-confirm">Confirm Password</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" v-model="user.password_confirmation" required>
                    </div>
                    
                    <input type="text" name="business_id" id="business_id" style="display: none;" :value="business.id">
                    
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                            Registrar Usuario
                        </button>
                    </div>
                </form>
            </div>
        </div>
        
        
    </div>
</template>

<script>
    export default {
        data() {
            return {
                business: [],
                user: []
            }
        },
        computed: {
            showBusinessForm() {
                return this.business.length == 0;
            }
        },
        methods: {
            registerBusiness() {
                axios.post('/businesses', {
                    name: this.business.name,
                    description: this.business.description
                }).then(({data}) => {
                    this.business = data.business;
                }).catch(error => {
                    
                });
            },
            registerUser() {
                axios.post('/register', {
                    name: this.user.name,
                    email: this.user.email,
                    password: this.user.password,
                    password_confirmation: this.user.password_confirmation,
                    business_id: this.business.id
                }).then(response => {
                    window.location.pathname = '/home';
                });
            }
        }
    }
</script>

