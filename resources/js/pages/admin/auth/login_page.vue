<template>
    <basic-layout>
        <div>
            <span> Login to your MMS account </span>
            <form @submit.prevent="login">
                <div v-if="err_msg"> {{ err_msg }} </div>
                <label for="username"> Username </label>
                <input type="text" id="username" v-model="username">
                <label for="password"> Password </label>
                <input type="password" id="password" v-model="password">
                <input type="submit" value="Login">
            </form>
        </div>
    </basic-layout>
</template>

<script>
import BasicLayout from "../../../components/layouts/basic"

export default {
    components: {
        BasicLayout,
    },
    data() {
        return {
            err_msg: '',
            username: '',
            password: '',
        }
    },
    methods: {
        login() {
            console.log("Logging In.....");
            axios.post("/api/login", {
                email: this.username,
                password: this.password,
            })
            .then(success => {
                console.log(success.data);
            })
            .catch(error => {
                if (error.response)
                    error = error.response;

                console.error("Login failed");
                console.error(error);
            })
        }
    }
}
</script>

<style>

</style>