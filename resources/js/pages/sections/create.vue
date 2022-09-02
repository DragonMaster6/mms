<template>
  <DashboardLayout>
    <template v-slot:content>
      <div v-if="errors.fatal"> {{ errors.fatal }} </div>
      <form @submit.prevent="createSection">
        <!-- Title field -->
        <label for="title-field"> Title </label>
        <input type="text"
            name="title"
            id="title-field"
            placeholder="Ex. August Finances"
            v-model="form.title">
        <span v-if="errors.title"> {{ errors.title }} </span>

        <!-- Budget field -->
        <label for="budget-field"> Budget </label>
        <input type="number"
            name="budget"
            id="budget-field"
            v-model="form.budget">
        <span v-if="errors.budget"> {{ errors.budget }} </span>

        <!-- Section type field -->
        <label for="type-field"> Type </label>
        <div v-for="section_type in type_options" :key="section_type">
          <input type="radio"
              :id="section_type"
              name="section-type"
              :value="section_type"
              v-model="form.type">
          <label :for="section_type"> {{ section_type }} </label>
        </div>
        <span v-if="errors.type"> {{ errors.type }} </span>

        <!-- Submit button -->
        <!-- <input type="submit" value="Create Section"> -->

        <button type="submit"> Create Section </button>
      </form>
    </template>
  </DashboardLayout>
</template>

<script setup>
import DashboardLayout from "../../layouts/dashboard.vue"
import { defineProps } from "vue"
import { useForm } from "@inertiajs/inertia-vue3"

const props = defineProps([
  'errors',
  'ledger',
  'type_options'
]);

const form = useForm({
  title: '',
  budget: 0,
  type: props.type_options[0]
})

const createSection = function() {
  form.post('/ledgers/'+props.ledger.id+'/sections/create')
}
console.log(props.ledger)
</script>
