<script setup>
  import { useForm } from "@inertiajs/inertia-vue3"
  import { ref, reactive } from 'vue'
  import Layout from "@/layouts/guest.vue"

  const props = defineProps({
    errors: Object,
    message: String,
  })

  const name = ref('Ben Matson')
  const form = useForm({
    username: '',
    secret: '',
  })

  function login() {
    console.log('Logging in the user')
  }

//  export default {
//    setup: () => {
//      const name = ref('Ben Matson')
//    }
//  }
</script>

<template>
  <Layout>
    <h1 class="text-center font-bold text-xl"> Welcome to MMS! </h1>
    <div id="message" v-if="message">
      {{ message }}
    </div>
    <div id="login-msg" v-if="errors.login">
      {{ errors.login }}
    </div>
    <form @submit.prevent="form.post('/login')">
      <div class="flex flex-col pb-4">
        <label for="username" class="pb-2"> Username </label>
        <input type="text" id="username" name="username"
        v-model="form.username" class="pb-2">
        <small v-if="form.errors.username" class="pb-2"> {{ form.errors.username }} </small>
      </div>
      <div class="flex flex-col pb-4">
        <label for="secret" class="pb-4"> Password </label>
        <input type="password" id="secret" v-model="form.secret" class="pb-4">
        <small v-if="form.errors.secret" class="pb-4"> {{ form.errors.secret }} </small>
      </div>
      <div>
        <button type="submit" id="login-btn" class="px-4 py-2 bg-blue-400">
          Login
        </button>
      </div>
      <div> 
        Don't have an account?
        <a :href="route('register-page')" class="underline">
          Sign up
        </a> here.
      </div>
    </form>
  </Layout>
</template>
