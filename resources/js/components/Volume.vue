<template>
  <div>
    <div class="jumbotron">
      <h1>Volumes</h1>
    </div>
    <div>
        <h4>Volume list</h4>
        

        <table class="table">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Tamanho</th>
                        <th>Status</th>
                        <th>Grupo</th>
                        <th>Tipo</th>
                        <th>Anexado a</th>
                        <th>Zona de Disponibilidade</th>
                        <th>Bootable</th>
                        <th>Encriptado</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for='v in volumes.volumes'>
                        <td>{{v.name}}</td>
                        <td>{{v.size}}G</td>
                        <td>{{v.status}}</td>
                        <td v-if= 'consistencygroup_id == null'>-</td>
                        <td v-if= 'consistencygroup_id != null'>{{v.consistencygroup_id}}</td>
                        <td>{{v.volume_type}}</td>
                        <td v-if= 'v.attachments.length != 0' v-for= 'a in v.attachments'>{{a.device}}</td>
                        <td v-if= 'v.attachments.length == 0'>-</td>
                        <td>{{v.availability_zone}}</td>
                        <td v-if='v.bootable=="false"'>Não</td>
                        <td v-if='v.bootable=="true"'>Sim</td>
                        <td v-if='v.encrypted==false'>Não</td>
                        <td v-if='v.encrypted==true'>Sim</td>
                        <td>
                            <button class="btn btn-info" v-on:click.prevent="editVolume">Edit</button>
                            <button type="button" class="btn btn-danger" v-on:click.prevent="deleteVolume(v)">Delete</button>
                        </td>
                    </tr>
                </tbody>
        </table>
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
                volumes: [],
                count: 0,
                name,
            };
        },
        methods: {
            getVolumes: function () {
                this.volumes = [];
                var vm = this;
                    axios.get('api/volumes')
                    .then(function (response){
                      vm.volumes = response.data;
                    })
                    .catch(function (error){
                      vm.volumes = 'An error occurred.' + error;
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
            this.getVolumes();
        }
    };
</script>