<template>
    <div>
        <div class="jumbotron">
            <h1>Instances</h1>
        </div>
        <button class="btn btn-info col-lg-2 control-label" v-on:click.prevent="createInstance">Create Instance</button>
        <button type="button" class="btn btn-outline-danger" v-on:click.prevent="goBack">Cancel</button>
    	<table class="table">
        	<thead>
        	    <tr>
        	        <th>Name</th>
        	        <th>Image Name</th>
        	        <th>IP Address</th>
                    <th>Flavor</th>
                    <th>Key Pair</th>
                    <th>Status</th>
                    <th>Availability Zone</th>
                    <th>Task</th>
                    <th>Power State</th>
                    <th>Ações</th>
        	    </tr>
       		</thead>
        	<tbody>
                <tr v-for='i in instances.servers'>
                    <td>{{i.name}}</td>
                    <td v-if='i.image==""'>-</td>
                    <td v-if='i.image!=""'>{{i.image}}</td>
                    <td>{{i.addresses.shared[0].addr}}</td>
                    <td> <router-link to='/flavor/'>{{i.flavor.id}}</router-link></td>
                    <td>{{i.key_name}}</td>
                    <td>{{i["OS-EXT-STS:vm_state"]}}</td>
                    <td>{{i["OS-EXT-AZ:availability_zone"]}}</td>
                    <td v-if='i["OS-EXT-STS:task_state"] == null'>None</td>
                    <td v-if='i["OS-EXT-STS:task_state"] != null'>{{i["OS-EXT-STS:task_state"]}}</td>
                    <td>{{i["OS-EXT-STS:power_state"]}}</td>
                    <td>
                        <button class="btn btn-info" v-on:click.prevent="editInstance">Edit</button>
                        <button type="button" class="btn btn-danger" v-on:click.prevent="deleteInstance(f)">Delete</button>
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
                instances: [],
            };
        },
        methods: {
            getInstances: function () {
                this.instances = [];
                var vm = this;
                axios.get('api/instances')
                    .then(function (response){
                        vm.instances = response.data;
                    })
                    .catch(function (error){
                        vm.instances = 'An error occurred.' + error;
                    });
            },

            goBack() {
                this.$router.push('/instances');
            },

            deleteInstance: function(flow) {
                axios.delete('api/instances' + flow.id)
                    .then(response => {
                        this.getFlavors();
                    })
            },

            createInstance() {
                this.$router.push('/createInstance');
            }
        },
        mounted() {
            this.getInstances();
        }
    };
</script>