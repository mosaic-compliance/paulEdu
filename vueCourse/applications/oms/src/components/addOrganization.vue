<template>
    <div class="">
        <div class="row">
        <p>Add Organization  <input type="checkbox" v-model="showForm"/></p>
        </div>
        <div class="form col-md-6 col-md-offset-3 add-org" v-if="showForm">
            <h3 class="org-form-title">Add Organization</h3>
            <div class="form-group">
                <label>Name</label>
                <input class="form-control" type="text" v-model="organization.name"/>
            </div>
            <div class="form-group">
                <label>Type</label>
                <input class="form-control" type="text" v-model="organization.orgType"/>
            </div>
            <div class="form-group">
                <label>Street</label>
                <input class="form-control" type="text" v-model="organization.address"/>
            </div>
            <div class="form-group">
                <label>City</label>
                <input class="form-control" type="text" v-model="organization.city"/>
            </div>
            <div class="form-group">
                <label>City</label>
                <input class="form-control" type="text" v-model="organization.state"/>
            </div>
            <div class="form-group">
                <label>Zip Code</label>
                <input class="form-control" type="text" v-model="organization.zipCode"/>
            </div>
            <button class="btn btn-primary submit" @click="addOrganizations">Submit</button>
        </div>
    </div>
</template>

<script>
    import {organizationsRef} from '../firebaseApp.js'
    export default {
        data() {
            return {
                organization: {
                    name: '',
                    orgType: '',
                    address: '',
                    city: '',
                    zipCode: '',
                    state: ''
                },
                showForm:false
            }
        },

        methods:{
            addOrganizations(){

                organizationsRef.push(this.organization)
                console.log('organization')

            }
        }
    }
</script>
