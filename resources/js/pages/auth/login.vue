<script setup>
  import { useForm } from "@inertiajs/inertia-vue3"
  import { ref, reactive } from 'vue'

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
  <div>
    <!-- Create the Auth Layout component so that registrations works similar-->
    <div>
      Image goes here
    </div>
    <div>
      <form @submit.prevent="form.post('/login')">
        <div>
          <label for="username"> Username </label>
          <input type="text" id="username" v-model="form.username">
          <small v-if="form.errors.username"> {{ form.errors.username }} </small>
        </div>
        <div>
          <label for="secret"> Password </label>
          <input type="password" id="secret" v-model="form.secret">
          <small v-if="form.errors.secret"> {{ form.errors.secret }} </small>
        </div>
        <div>
          <button type="submit"> Login </button>
          <button> Register </button>
        </div>
      </form>
    </div>
  </div>
</template>
