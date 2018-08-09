<template>
    <div class="">
       <h3>Events Dashboard</h3>
        <button class="btn btn-danger btn-sm signout-btn" @click="signOut">Sign Out</button>
        <hr>
        <Event/>
        <div class="col-md-12">
            <event-item
                v-for="(event_item, index) in this.$store.state.events"
                :event="event_item"
                key="index"/>
        </div>

    </div>
</template>

<script>
    import {fbApp, eventsRef} from '../fbApp.js'
    import Event from './Event.vue'
    import EventItem from './EventItem.vue'
    export default {
        methods:{
            signOut(){
                this.$store.dispatch('signOut')
                fbApp.auth().signOut()
            }
        },
        components:{
            Event,
            EventItem
        },
        mounted(){
            eventsRef.on('value',snap =>{
              let events=[]
              snap.forEach(event =>{
                  events.push(event.val())
              })
                this.$store.dispatch('setEvents',events)
            })
        }
    }
</script>
