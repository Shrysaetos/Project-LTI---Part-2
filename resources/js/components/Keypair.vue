<template>
    <div>
        <div class="jumbotron">
            <h1>Key Pairs</h1>
        </div>
        <button class="btn btn-info col-lg-2 control-label" v-on:click.prevent="createKeypair">Create Key Pair</button>
        <button type="button" class="btn btn-outline-danger" v-on:click.prevent="goBack">Cancel</button>
    	<table class="table">
        	<thead>
        	    <tr>
        	        <th>Name</th>
                    <th>Fingerprint</th>
                    <th>Public key</th>
        	    </tr>
       		</thead>
        	<tbody>
                <tr v-for='k in keypairs.keypairs'>
                    <td>{{k.keypair.name}}</td>
                    <td>{{k.keypair.fingerprint}}</td>
                    <td>{{k.keypair.public_key}}</td>
                    <td
                        <button class="btn btn-info" v-on:click.prevent="editKeypair">Edit</button>
                        <button type="button" class="btn btn-danger" v-on:click.prevent="deleteKeypair(k)">Delete</button>
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
                keypairs: [],
            };
        },
        methods: {
            getKeypairs: function () {
                this.keypairs = [];
                var vm = this;
                axios.get('api/keypairs')
                    .then(function (response){
                        vm.keypairs = response.data;
                    })
                    .catch(function (error){
                        vm.keypairs = 'An error occurred.' + error;
                    });
            },

            goBack() {
                this.$router.push('/keypair');
            },

            deleteKeypair: function(image) {
                axios.delete('api/keypairs' + keypair.id)
                    .then(response => {
                        this.getKeypairs();
                    })
            },

            createImage() {
                this.$router.push('/createKeypair');
            }
        },
        mounted() {
            this.getKeypairs();
        }
    };
</script>