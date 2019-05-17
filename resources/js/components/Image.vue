<template>
    <div>
        <div class="jumbotron">
            <h1>Images</h1>
        </div>
        <button class="btn btn-info col-lg-2 control-label" v-on:click.prevent="createFlavor">Create Image</button>
        <button type="button" class="btn btn-outline-danger" v-on:click.prevent="goBack">Cancel</button>
    	<table class="table">
        	<thead>
        	    <tr>
        	        <th>Name</th>
                    <th>Status</th>
                    <th>Protected</th>
                    <th>Public</th>
        	    </tr>
       		</thead>
        	<tbody>
                <tr v-for='i in images.images'>
                    <td>{{i.name}}</td>
                    <td>{{i.status}}</td>
                    <td v-if='i.protected == false'>No</td>
                    <td v-if='i.protected == true'>Yes</td>
                    <td v-if='i.visibility == "public"'>Yes</td>
                    <td v-if='i.visibility != "public"'>No</td>
                    <td
                        <button class="btn btn-info" v-on:click.prevent="editImage">Edit</button>
                        <button type="button" class="btn btn-danger" v-on:click.prevent="deleteImage(i)">Delete</button>
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
                images: [],
            };
        },
        methods: {
            getImages: function () {
                this.images = [];
                var vm = this;
                axios.get('api/images')
                    .then(function (response){
                        vm.images = response.data;
                    })
                    .catch(function (error){
                        vm.images = 'An error occurred.' + error;
                    });
            },

            goBack() {
                this.$router.push('/image');
            },

            deleteImage: function(image) {
                axios.delete('api/images' + image.id)
                    .then(response => {
                        this.getImages();
                    })
            },

            createImage() {
                this.$router.push('/createImage');
            }
        },
        mounted() {
            this.getImages();
        }
    };
</script>