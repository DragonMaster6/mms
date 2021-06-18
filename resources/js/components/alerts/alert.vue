<template>
  <div :class="[type, 'rounded', 'p-3', 'my-4']">
      <slot></slot>
  </div>
</template>

<script>
export default {
    props: {
        type: {
            type: String,
            default: 'bg-blue-200',
        }
    }
}
</script>

<style>

</style>