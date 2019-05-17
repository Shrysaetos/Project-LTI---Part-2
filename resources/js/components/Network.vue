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
        	        <th></th>
        	        <th></th>
        	        <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
        	    </tr>
       		</thead>
        	<tbody>
                <tr v-for='n in networks'>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
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