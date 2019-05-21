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
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr v-for=''>
                    <td></td>
                    <td>
                        <button type="button" class="btn btn-danger" v-on:click.prevent="deleteRule(r)">Delete</button>
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
                rules: [],
            };
        },
        methods: {
            getRules: function (id) {
                this.securitygroups = [];
                var vm = this;
                axios.get('api/security_groups/')
                    .then(function (response){
                        vm.rules = response.data;
                    })
                    .catch(function (error){
                        vm.rules = 'An error occurred.' + error;
                    });
            },

            goBack() {
                this.$router.push('/security_groups');
            },

            deleteSecurityGroup: function(sg_id, rule_id) {
                axios.delete('api/security_groups/' + sg_id + "/" + rule_id)
                    .then(response => {
                        this.getRules();
                    })
            },

            createSecurityGroup() {
                this.$router.push('/createRule');
            }
        },
        mounted() {
            this.getRules(id);
        }
    };
</script>