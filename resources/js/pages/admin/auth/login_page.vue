<template>
    <basic-layout>
        <div class="border-2 border-gray-200 rounded-lg px-8 pb-8">
            <div class="bold text-3xl font-serif my-4">
                Login to your MMS account 
            </div>
            <div v-if="err_msg">
                <m-alert type="bg-red-300" v-for="(error, index) in err_msg"
                        :key="index">
                    {{ error }}
                </m-alert>
                <!-- <span v-for="(error, index) in err_msg" :key="index">
                    {{ error }}
                </span> -->
            </div>
            <form class="flex flex-col"
                    @submit.prevent="login">
                <m-input class="mb-4" label="Username" v-model="username"></m-input>
                <m-input class="mb-4" label="Password" type="password" v-model="password"></m-input>
                <input type="submit" value="Login"
                        class="bg-green-400 rounded cursor-pointer py-2">
            </form>
            {{ getUser }}
        </div>
    </basic-layout>
</template>

<script>
import {mapGetters, mapMutations} from "vuex"

import MAlert from "../../../components/alerts/alert"
import BasicLayout from "../../../components/layouts/basic"
import MInput from "../../../components/inputs/input"

export default {
    components: {
        MAlert,
        BasicLayout,
        MInput,
    },
    data() {
        return {
            err_msg: [],
            username: '',
            password: '',
        }
    },
    computed: {
        ...mapGetters(['getUser', 'test']),
    },
    methods: {
        ...mapMutations(["setUser", "setTest"]),
        login() {
            this.err_msg = [];
            console.log("Logging In.....");
            axios.post("/api/login", {
                email: this.username,
                password: this.password,
            })
            .then(success => {
                console.log(success.data);
                // Change to the user's profile or go to the dashboard
                this.setUser({
                    id: success.data.id,
                    username: success.data.name,
                });
                console.log("After Login: ");
                console.log(this.getUser);

                this.setTest("testing");
                console.log(this.test);
                // this.$router.push({name: "userProfile"});
            })
            .catch(error => {
                if (error.response)
                    error = error.response;

                console.error("Login failed");
                console.error(error);

                // Retrieve the error messages
                _.each(error.data.errors, (detail, field) => {
                    console.log(detail);
                    if (typeof detail == "object")
                        this.err_msg.push(detail.join(". "));
                    else
                        this.err_msg.push(detail);
                });
            })
        }
    }
}
</script>

<style>

</style>