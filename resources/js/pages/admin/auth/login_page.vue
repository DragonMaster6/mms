<template>
    <basic-layout>
        <div>
            <span> Login to your MMS account </span>
            <div v-if="err_msg">
                <span v-for="(error, index) in err_msg" :key="index">
                    {{ error }}
                </span>
            </div>
            <form @submit.prevent="login">
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
            err_msg: [],
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

                // Retrieve the error messages
                _.each(error.data.errors, (detail, field) => {
                    console.log(detail);
                    this.err_msg.push(detail.join(". "));
                });
            })
        }
    }
}
</script>

<style>

</style>