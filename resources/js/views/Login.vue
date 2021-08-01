<template>
    <v-app>
        <div class="d-flex justify-center" style="height:100vh">
           <div class="d-flex justify-center align-center">
               <v-form>
                    <div>
                        <label>Email</label>
                        <v-text-field placeholder="Email" outlined>

                        </v-text-field>
                    </div>

                    <div>
                        <label>Password</label>
                        <v-text-field type="password" placeholder="Password" outlined>

                        </v-text-field>
                    </div>

                    <div class="d-flex justify-end">
                        <v-btn class="mr-3" text>Login</v-btn>
                        <v-btn color="primary">Cancel</v-btn>
                    </div>
                </v-form>
           </div>
        </div>
    </v-app>
</template>
