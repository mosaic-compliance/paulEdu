<template>
    <div class="form-inline">
        <h3>Sign Up</h3>
        <div class="form-group">
            <input
                type="text"
                placeholder="email"
                class="form-control"
                v-model="email"
                />
                <input
                    type="password"
                    placeholder="password"
                    class="form-control"
                    v-model="password"
                />
            <br>
            <br>
            <button class="btn btn-primary" @click="signUp">Sign Up</button>

        </div>
        <br>
        <br>
        <router-link to="/signin">Already a User? Sign in.</router-link>
        <br>
        <p>error.message</p>


    </div>
</template>

<script>
    import {fbApp} from '../fbApp.js'
    export default {
        data(){
            return {
                email: '',
                password: '',
                error:{
                    message:''
                }
            }

        },
        methods:{
            signUp(){
                fbApp.auth().createUserWithEmailAndPassword(this.email,this.password)
                    .catch(error=>{
                        this.error=error
                    })
            }
        }
    }
</script>
