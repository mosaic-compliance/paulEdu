<template>
    <div class="">
        <h3>Organization Dashboard</h3>
        <div class="form-add-org">
            <add-organization/>
        </div>
        <div class="col-md-12">
            <organization
                v-for="(organization, index) in this.$store.state.organizations"
                :organization="organization"
                key="index"/>
        </div>
    </div>
</template>

<script>
    import addOrganization from './addOrganization.vue'
    import Organization from './Organization.vue'
    import {organizationsRef} from "../firebaseApp";
    import {loadOrganization} from "../store/actions";
    export default {
        components: {
            addOrganization,
            Organization
        },

        mounted(){
            organizationsRef.on('value',snap=>{
                let organizations =[];
                snap.forEach(organization=>{
                    organizations.push(organization.val())
                })
                console.log(organizations)
                this.$store.dispatch('loadOrganization',organizations)

                })

            }
        }


</script>
