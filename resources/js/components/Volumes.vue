<template>
  <div>
    <div class="jumbotron">
      <h1>Volumes</h1>
    </div>
    <div>
        <h4>Volume list</h4>

       

        <p>test: {{info}}</p>
        

        <br><br>
      <div>
        <button type="button" class="btn btn-outline-success" v-on:click.prevent='createVolume()'>Create a Volume</button>
        <button type="button" class="btn btn-outline-danger" v-on:click.prevent="goBack">Cancel</button>

      </div>
    </div>
  </div>
</template>
<script>
    module.exports = {
        data() {
            return {
                info: [],
                count: 0,
                name,
            };
        },
        methods: {
            listVolumes: function () {
                this.info = [];
                var vm = this;
                    axios.get('api/volumes')
                    .then(function (response){
                      vm.info = response.data;
                    })
                    .catch(function (error){
                      vm.info = 'An error occurred.' + error;
                    });
                },  
            createVolume: function () {
                this.$router.push('/createVolume');
            },                        
            goBack() {
                this.$router.push('/login');
            },
        },
        mounted() {
            this.listVolumes();
        }
    };
</script>