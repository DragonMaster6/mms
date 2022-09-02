<template>
  <DashboardLayout>
    <template v-slot:content>
      Creating a section form for {{ ledger.title }}
    </template>
  </DashboardLayout>
</template>

<script setup>
import DashboardLayout from "../../layouts/dashboard.vue"
import { defineProps } from "vue"

const props = defineProps(['ledger']);
console.log(props.ledger)
</script>
