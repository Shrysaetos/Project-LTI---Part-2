<template>
    <div>
        <div class="jumbotron">
            <h1>Networks</h1>
        </div>
        <button class="btn btn-info col-lg-2 control-label" v-on:click.prevent="createNetwork">Create Network</button>
        <button type="button" class="btn btn-outline-danger" v-on:click.prevent="goBack">Cancel</button>
    	<table class="table">
        	<thead>
        	    <tr>
        	        <th>Name</th>
        	        <th>Subnets</th>
        	        <th>Shared</th>
                    <th>External</th>
                    <th>Status</th>
                    <th>Admin State</th>
                    <th>Availability Zones</th>
                    <th>Port Security</th>
                    <th>Actions</th>
        	    </tr>
       		</thead>
        	<tbody>
                <tr v-for='n in networks.networks'>
                    <td><router-link to='/'>{{n.name}}</router-link></td>
                    <td>TODO</td>
                    <td v-if='n.shared == true'>Yes</td>
                    <td v-if='n.shared == false'>No</td>
                    <td v-if='n["router:external"] == true'>Yes</td>
                    <td v-if='n["router:external"] == false'>No</td>
                    <td>{{n.status}}</td>
                    <td v-if='n["admin_state_up"] == true'>Up</td>
                    <td v-if='n["admin_state_up"] == false'>Down</td>
                    <td v-for='a in n.availability_zones'>{{n.availability_zones[0]}}</td>
                    <td v-if='n["port_security_enabled"] == true'>Enabled</td>
                    <td v-if='n["port_security_enabled"] == false'>Disabled</td>
                    <td>
                        <button class="btn btn-info" v-on:click.prevent="editNetwork">Edit</button>
                        <button type="button" class="btn btn-danger" v-on:click.prevent="deleteNetwork(n)">Delete</button>
                    </td>
                </tr>
        	</tbody>
    	</table>
    	</div>
</template>
<script>
    module.exports = {
        data() {
            return {
                networks: [],
            };
        },
        methods: {
            getNetworks: function () {
                this.networks = [];
                var vm = this;
                axios.get('api/networks')
                    .then(function (response){
                        vm.networks = response.data;
                    })
                    .catch(function (error){
                        vm.networks = 'An error occurred.' + error;
                    });
            },

            goBack() {
                this.$router.push('/networks');
            },

            deleteNetwork: function(flow) {
                axios.delete('api/networks' + network.id)
                    .then(response => {
                        this.getNetworks();
                    })
            },

            createFlavor() {
                this.$router.push('/createNetwork');
            }
        },
        mounted() {
            this.getNetworks();
        }
    };
</script>