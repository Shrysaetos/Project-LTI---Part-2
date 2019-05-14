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
        	        <th>a</th>
        	        <th>b</th>
        	        <th>c</th>
                    <th>d</th>
                    <th>e</th>
                    <th>f</th>
                    <th>g</th>
        	    </tr>
       		</thead>
        	<tbody>
                <tr v-for='f in flavors'>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
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
            getInstaces: function () {
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
            this.getInstaces();
        }
    };
</script>