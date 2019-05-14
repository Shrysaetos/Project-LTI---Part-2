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
        	        <th>Nome</th>
        	        <th>Nome da Imagem</th>
        	        <th>Endereço IP</th>
                    <th>Flavor</th>
                    <th>Par de chaves</th>
                    <th>Status</th>
                    <th>Zona de disponibilidade</th>
                    <th>Tarefa</th>
                    <th>Estado de energia</th>
                    <th>Ações</th>
        	    </tr>
       		</thead>
        	<tbody>
                <tr v-for='i in instances.servers'>
                    <td>{{i.name}}</td>
                    <td v-if='i.image==""'>-</td>
                    <td v-if='i.image!=""'>{{i.image}}</td>
                    <td>{{i.addresses.shared[0].addr}}</td>
                    <td>Como ir buscar o nome do flavor em vez do ID</td>
                    <td>{{i.key_name}}</td>
                    <td>{{i["OS-EXT-STS:vm_state"]}}</td>
                    <td>{{i["OS-EXT-AZ:availability_zone"]}}</td>
                    <td v-if='i["OS-EXT-STS:task_state"] == null'>Nenhuma</td>
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