<template>
    <v-app>
        <div class="d-flex justify-center" style="height:100vh">
           <div class="d-flex justify-center align-center">
               <v-form>
                   <div>
                        <label>Name</label>
                        <v-text-field v-model="user.name" placeholder="Email" outlined>

                        </v-text-field>
                    </div>

                    <div>
                        <label>Email</label>
                        <v-text-field v-model="user.email" placeholder="Email" outlined>

                        </v-text-field>
                    </div>

                    <div>
                        <label>Password</label>
                        <v-text-field  v-model="user.password" type="password" placeholder="Password" outlined>

                        </v-text-field>
                    </div>

                    <div class="d-flex justify-end">
                        <v-btn class="mr-3" text @click="register">Login</v-btn>
                        <v-btn color="primary">Cancel</v-btn>
                    </div>
                </v-form>
           </div>
        </div>
    </v-app>
</template>


<script>
export default {
    data(){
        return{
            user: {
                name: '',
                email: '',
                password: '',
            }
        }
    },
    methods:{
        register(){
            let data = this.formData()

            this.$store.dispatch('REGISTER',data).then(() => {
                this.$router.push('/')
            })

        },
        formData(){
            let formData = new FormData

            formData.set('email',this.user.email)
            formData.set('name',this.user.name)
            formData.set('password',this.user.password)

            return formData
        },
    }
}
</script>