<template>
  <DashboardLayout>
    <template v-slot:content>
      This is the {{ ledger.title }} ledger
    </template>
  </DashboardLayout>
</template>

<script setup>
import DashboardLayout from '../../layouts/dashboard.vue'
import { defineProps } from 'vue';

const props = defineProps(['ledger'])
console.log(props.ledger)

</script>
