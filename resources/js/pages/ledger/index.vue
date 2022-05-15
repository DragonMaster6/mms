<script setup>
import { useForm } from '@inertiajs/inertia-vue3'
import Layout from '@/layouts/master.vue'

const form = useForm({
  'name': '',
})

const props = defineProps({
  'errors': Object,
  'ledgers': Array,
})
</script>

<template>
<Layout>

  Here is where all the user's created templates are located

  <!-- Display a list of premade ledgers here -->
  <!-- Create a basic view component of a ledger -->
  <div>
    <div v-for="ledger in ledgers" :key="ledger.id">
      Name: {{ ledger.name }}
    </div>
  </div>

  <!-- Create new ledger modal. @todo - create a modal component -->
  <div>
    <form @submit.prevent="form.post(route('ledger.create'))">
      <div>
        <label for="new-ledger-name"> Name: </label>
        <input type="text"
            id="new-ledger-name"
            v-model="form.name">
        <small v-if="errors.name">
          {{ errors.name }}
        </small>
      </div>
      <div>
        <button type="submit"> Create </button>
      </div>
    </form>
  </div>

</Layout>
</template>
