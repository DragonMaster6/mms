<script setup>
  import { useForm } from "@inertiajs/inertia-vue3"
  import { ref, reactive } from 'vue'

  const props = defineProps({
    errors: Object,
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
  <div class="flex flex-wrap h-screen">
    <!-- Create the Auth Layout component so that registrations works similar-->
    <div class="grow invisible md:visible bg-gradient-to-r from-green-400 to-teal-500">
      Image goes here
    </div>
    <div class="grow flex flex-col justify-center self-center bg-gray-100 
    h-screen">
      <div class="w-3/4 mx-auto">
        <h1 class="text-center font-bold text-xl"> Welcome to MMS! </h1>
        <div id="login-msg" v-if="errors.login">
          <!-- <ul> -->
          <!--   <li v-for="(error, index) in errors" :key="index"> -->
          <!--     {{ error }} -->
          <!--   </li> -->
          <!-- </ul> -->
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
            <a href="#" class="underline">
              Sign up
            </a> here.
          </div>
        </form>
      </div>
    </div>
  </div>
</template>
