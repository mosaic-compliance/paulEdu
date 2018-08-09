<template>
    <div class="form-inline">
       <h3>Sign In</h3>
        <div class="form-group">
            <input type="text"
                   class="form-control"
                   placeholder="email"
                   v-model= "email"
                   />
            <input
                type="password"
                placeholder="password"
                class="form-control"
                v-model="password"
                />
            <br>
            <br>
            <button class="btn btn-primary" @click="signIn">Sign In</button>

        </div>
        <br>
        <br>
        <router-link to="/signup">Not already a User? Sign up</router-link>
        <br>
        <p>{{error.message}}</p>


    </div>
</template>

<script>
    import {fbApp} from '../fbApp.js'
    export default {
        data(){
            return{
                email:'',
                password:'',
                error:{
                    message:''
                }
            }
        },
        methods:{
            signIn(){
                fbApp.auth().signInWithEmailAndPassword(this.email, this.password)
                    .catch(error=>{
                        this.error =error
                    })
            }
        }
    }
</script>
