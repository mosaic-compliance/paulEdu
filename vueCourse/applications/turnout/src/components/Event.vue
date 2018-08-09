<template>
    <div class="">
        <h4>Add an event <input type="checkbox" v-model="showForm"/></h4></h4>
        <div class="form" v-if="showForm">
            <div class="form-group">
                <label>Title</label>
                <input class="form-control" type = "text" v-model="event.title"/>
            </div>
            <div class="form-group">
                <label>Description</label>
                <input class="form-control" type = "text" v-model="event.description"/>
            </div>
            <div class="form-group">
                <label>Date</label>
                <input class="form-control" type = "date" v-model="event.date"/>
            </div>
            <div class="form-group">
                <label>Location</label>
                <input class="form-control" type = "text" v-model="event.location"/>
            </div>
            <div class="form-group">
                <label>email</label>
                <input class="form-control" type = "text" v-model="event.email"/>
            </div>
            <button class="btn-sm btn-primary" @click="addEvents">Submit</button>

        </div>

    </div>

</template>

<script>
    import {eventsRef} from '../fbApp.js'
    export default {
       data(){
           return{
               event:{
                   title:'',
                   description:'',
                   date:'',
                   location:'',
                   email:''
               },
               showForm:false

           }
       },
        methods:{
           addEvents(){
               this.event.email=this.$store.state.user.email;
               eventsRef.push(this.event)
               console.log('event')
           }
        }
    }
</script>
