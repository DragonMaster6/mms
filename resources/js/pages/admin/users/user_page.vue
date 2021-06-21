<template>
  <div>
    Successfully logged in {{ user.username }} ({{ user.id }})
  </div>
</template>

<script>
import {mapGetters} from "vuex"

export default {
  computed: {
    ...mapGetters({user: "getUser"}),

  }
}
</script>

<style>

</style>