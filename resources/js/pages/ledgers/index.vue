<template>
  <DashboardLayout>
    <template v-slot:content>
      <!-- Table of all the ledgers that were made -->
      <table>
        <thead>
          <tr>
            <th> Ledger </th>
            <th> Balance </th>
            <th> Income </th>
            <th> Expense </th>
            <th> Actions </th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="ledger in ledgers" :key="'ledger-' + ledger.id">
            <td> {{ ledger.title }} </td>
            <td> NA </td>
            <td> NA </td>
            <td> NA </td>
            <td>
              <a :href="'/ledgers/'+ledger.id"> Details </a>
              <a href="#"> Delete </a>
            </td>
          </tr>
        </tbody>
      </table>
    </template>
  </DashboardLayout>
</template>

<script setup>
import DashboardLayout from '../../layouts/dashboard'
import { defineProps } from 'vue';

const props = defineProps(['ledgers'])


</script>
