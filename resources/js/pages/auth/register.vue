<script setup>
  import Layout from "@/layouts/guest"
  import { useForm } from "@inertiajs/inertia-vue3"

  const props = defineProps({
    errors: Object,
  })

  const form = useForm({
    'username': '',
    'firstname': '',
    'lastname': '',
    'email': '',
    'password': '',
    'pass_confirm': '',
  })
</script>

<template>

<Layout>
  <h2 class="text-center text-bold text-xl"> Sign up </h2>
  <div id="message">

  </div>
  <form @submit.prevent="form.post('/register')">
    <div class="flex flex-col mb-4">
      <label for="username"> Username </label>
      <input type="text" id="username" v-model="form.username">
      <small class="color-red-600" v-if="errors.username">
        {{ errors.username }}
      </small>
    </div>
    <div class="flex flex-col mb-4">
      <label for="first-name"> First Name </label>
      <input type="text" id="first-name" v-model="form.firstname">
      <small class="color-red-600" v-if="errors.firstname">
        {{ errors.firstname }}
      </small>
    </div>
    <div class="flex flex-col mb-4">
      <label for="last-name"> Last Name </label>
      <input type="text" id="last-name" v-model="form.lastname">
      <small class="color-red-600" v-if="errors.lastname">
        {{ errors.lastname }}
      </small>
    </div>
    <div class="flex flex-col mb-4">
      <label for="email"> Email </label>
      <input type="email" id="email" v-model="form.email">
      <small class="color-red-600" v-if="errors.email">
        {{ errors.email }}
      </small>
    </div>
    <div class="flex flex-col mb-4">
      <label for="password"> Password </label>
      <input type="password" id="password" v-model="form.password">
      <small class="color-red-600" v-if="errors.password">
        {{ errors.password }}
      </small>
    </div>
    <div class="flex flex-col mb-4">
      <label for="pass-confirm"> Confirm Password </label>
      <input type="password" id="pass-confirm" v-model="form.password_confirm">
      <small class="color-red-600" v-if="errors.confirm">
        {{ errors.confirm }}
      </small>
    </div>
    <div class="flex justify-between">
      <button id="create-user" class="px-4 py-2 bg-blue-400">
        Register
      </button>

      <a :href="route('login-page')" class="underline">
        Back to login 
      </a>
    </div>
  </form>
</Layout>

</template>
