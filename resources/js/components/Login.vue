<template>
    <div>
        <br>
        <div class="alert" :class="typeofmsg" v-if="showMessage">             
            <strong>{{ message }}</strong>
        </div>
        <div class="jumbotron">
            <h2>Login</h2>
            <div class="form-group">
                <label for="inputUsername">Username</label>
                <input
                    type="username" class="form-control" v-model.trim="user.username"
                    name="username" id="inputUsername"
                    placeholder="Username"/>
            </div>
            <div class="form-group">
                <label for="inputPassword">Password</label>
                <input
                    type="password" class="form-control" v-model="user.password"
                    name="password" id="inputPassword"/>
            </div>
            <div class="form-group">
                <a class="btn btn-primary" v-on:click.prevent="login">Login</a>
            </div>
        </div>
    </div>
</template>

<script type="text/javascript">    
    export default {
        data: function(){
            return { 
                user: {
                    username:"",
                    password:""
                },
                typeofmsg: "alert-success",
                showMessage: false,
                message: "",
            }
        },
        methods: {
            login(user) {
                if (user.username == 'demo' || user.password == 'devstack')
                {
                    //let token = get and save token
                    //let expiration = get and save expiration date of token
                    
                    this.typeofmsg = "alert-success";
                    this.message = "User authenticated correctly";
                    this.showMessage = true;
                    this.$router.push("/dashboard");
                } else {
                    this.typeofmsg = "alert-danger";
                    this.message = "Error authenticating user";
                    this.showMessage = true;
                }
            },
        },
    }
</script>