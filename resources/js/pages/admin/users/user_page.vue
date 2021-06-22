<template>
  <div>
    Successfully logged in {{ user.username }} ({{ user.id }})
  </div>
</template>

<script>
import {mapState} from "vuex"

export default {
  computed: {
    ...mapState('users', ['user']),

  }
}
</script>

<style>

</style>