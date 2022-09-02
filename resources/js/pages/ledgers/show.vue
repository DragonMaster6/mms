<template>
  <DashboardLayout>
    <template v-slot:content>
      This is the {{ ledger.title }} ledger <br>
      <section v-for="section in ledger.sections" :key="'section-'+section.id">
        <h2> {{ section.title }}: ${{ (section.budget - section.transactions.reduce((carry, value) => (carry + value.value), 0)) }} </h2>
        <h3> Budget: ${{ section.budget }} </h3>
        <ul>
          <li v-for="trans in section.transactions" :key="'trans-'+trans.id">
            {{ trans.date }} {{ trans.title }}: ${{ trans.value }}
          </li>
        </ul>
      </section>
      <section>
        <Link :href="'/ledgers/'+ledger.id+'/sections/create'"> Create Section </Link>
      </section>
    </template>
  </DashboardLayout>
</template>

<script setup>
import { Link } from '@inertiajs/inertia-vue3'
import DashboardLayout from '../../layouts/dashboard.vue'
import { defineProps } from 'vue';

const props = defineProps(['ledger'])
console.log(props.ledger)

</script>
