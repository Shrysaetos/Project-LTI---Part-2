<template>
  <div>
    <div class="jumbotron">
      <h1>Create Volume</h1>
    </div>
    <div>
        <h4>Create a volume</h4>
        <br>

        <div>
            <label>Volume name: </label>
            <input v-model="name" placeholder="Volume name">
        </div>
        
        <div>
            <label>Description: </label>
            <input v-model="description" placeholder="Description">
        </div>
        
        <div>
            <label>Size (GiB): </label>
            <input type="number" v-model="size" :min="0">
        </div>

        <div>
            <label>Source: </label>
            <select v-model="source">
                <option>Empty volume</option>
                <option>Image</option>
            </select>
        </div>

        <div v-if="source === 'Image'">
            <ul>
                <li>
                    <label>Image ID: </label>
                    <select v-model="image">
                        <option disabled value="">Please select one</option>
                        <option v-for='s in imageInfo.images'>{{s["id"]}}</option>
                    </select>

                </li>
            </ul>
        </div>

            
        </div>

        <p>Variaveis --> Name: {{name}} | Description: {{description}}</p>
        

        <br><br>
      <div>
        <button type="button" class="btn btn-outline-success" v-on:click.prevent='createVolume(source, name, description, size, image)'>Create</button>
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
                imageInfo: [],
                name: '',
                source: 'Empty volume',
                image: '',
                description: '',
                size: '1',
            };
        },
        methods: {
            createVolume: function (source, name, description, size, image) {
                this.info = [];
                var vm = this;
                if (this.source == 'Empty volume') {
                    image = 'NO_IMAGE';
                }
                if (this.name == ''){
                    name = 'null';
                } else {
                    name = '"' + name + '"';
                }
                if (this.description == ''){
                    description = 'null';
                } else {
                    description = '"' + description + '"';
                }
                axios.post('api/createVolume/' + name + '/' + description + '/' + size + '/' + image)
                .then(function (response){
                    vm.info = response.data;
                })
                .catch(function (error){
                    vm.info = 'An error occurred.' + error;
                });
            },    
            listImages: function () {
                this.imageInfo = [];
                var vm = this;
                axios.get('api/listImages')
                .then(function (response){
                    vm.imageInfo = response.data;
                })
                .catch(function (error){
                    vm.imageInfo = 'An error occurred.' + error;
                });
            },                 
            goBack() {
                this.$router.push('/volumes');
            },
        },
        mounted() {
            this.listImages();
        }
    };
</script>