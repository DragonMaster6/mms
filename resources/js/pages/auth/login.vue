<script setup>
  import { ref } from 'vue'

  const name = ref('Ben Matson')

//  export default {
//    setup: () => {
//      const name = ref('Ben Matson')
//    }
//  }
</script>

<template>
  <h1> Hello {{ name }} </h1>
</template>
