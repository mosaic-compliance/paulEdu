<template>
        <div class="">
            <div class="organization-card">
                <h3 class="organization-title">{{organizations.name}}</h3>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Type: {{organizations.orgType}}</li>
                    <li class="list-group-item">Address:{{organizations.address}}</li>
                    <li class="list-group-item"></li>
                </ul>
            </div>
        </div>
</template>

<script>
    export default {
        name: 'organization',
        props:['organization']
    }

</script>
