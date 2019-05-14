<template>
  <div>
    <div class="jumbotron">
      <h1>Create Volume</h1>
    </div>
    <div>
        <h4>Componentes para adicionar Volumes (TODO)</h4>

        <ul>
            <li>
              <label>Nome:</label>
              <input v-model="name" placeholder="Volume name">
            </li>
        </ul>

        <p>test: {{info}}</p>
        

        <br><br>
      <div>
        <button type="button" class="btn btn-outline-success" v-on:click.prevent='createVolume()'>Create</button>
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
            createVolume: function () {
                this.info = [];
                var vm = this;
                    axios.post('api/createVolume')
                    .then(function (response){
                      vm.info = response.data;
                    })
                    .catch(function (error){
                      vm.info = 'An error occurred.' + error;
                    });
                },                        
            goBack() {
                this.$router.push('/volumes');
            },
        },
        mounted() {
        }
    };
</script>