<template>
  <div :class="['flex', inline ? 'flex-row' : 'flex-col']">
      <label v-if="label != ''"> {{ label }} </label>
      <input :type="type" 
            class="border-2 border-gray-300 rounded-lg px-2 py-1"
            :value="value" 
            @input="$emit('input', $event.target.value)">
  </div>
</template>

<script>
export default {
    props: {
        inline: {
            type: Boolean,
            default: false,
        },
        label: {
            type: String,
            default: "",
        },
        type: {
            type: String,
            default: "text",
        },
        value: {
            default: '',
        },
    },
    data() {
        return {
            content: this.value,
        }
    },
    methods: {
        updateInput() {
            this.$emit('input', this.content);
        }
    }
}
</script>

<style>

</style>