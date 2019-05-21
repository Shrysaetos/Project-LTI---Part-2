<template>
    <div>
        <div class="jumbotron">
            <h1>Security Groups</h1>
        </div>
        <button class="btn btn-info col-lg-2 control-label" v-on:click.prevent="createSecurityGroup">Create Security Group</button>
        <button type="button" class="btn btn-outline-danger" v-on:click.prevent="goBack">Cancel</button>
    	<table class="table">
        	<thead>
        	    <tr>
        	        <th>Name</th>
                    <th>Security Group ID</th>
                    <th>Description</th>
                    <th>Actions</th>
        	    </tr>
       		</thead>
        	<tbody>
                <tr v-for='s in securitygroups.security_groups'>
                    <td>{{s.name}}</td>
                    <td>{{s.id}}</td>
                    <td>{{s.description}}</td>
                    <td>
                        <button class="btn btn-info" v-on:click.prevent="manageRules(s.id)">Manage Rules</button>
                        <button type="button" class="btn btn-danger" v-on:click.prevent="deleteSecurityGroup(s)">Delete</button>
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
                securitygroups: [],
            };
        },
        methods: {
            getSecurityGroups: function () {
                this.securitygroups = [];
                var vm = this;
                axios.get('api/security_groups')
                    .then(function (response){
                        vm.securitygroups = response.data;
                    })
                    .catch(function (error){
                        vm.securitygroups = 'An error occurred.' + error;
                    });
            },

            goBack() {
                this.$router.push('/security_groups');
            },

            manageRules: function (id) {
                this.$router.push('/security_groups/'+id);
            },

            deleteSecurityGroup: function(securitygroup) {
                axios.delete('api/SecurityGroup' + securitygroup.id)
                    .then(response => {
                        this.getSecurityGroups();
                    })
            },

            createSecurityGroup() {
                this.$router.push('/createSecurityGroup');
            }
        },
        mounted() {
            this.getSecurityGroups();
        }
    };
</script>