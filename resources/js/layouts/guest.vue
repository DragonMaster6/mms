<script setup>

</script>

<template>

<div class="flex flex-wrap h-screen">
  <!-- Create the Auth Layout component so that registrations works similar-->
  <div class="grow invisible md:visible bg-gradient-to-r from-green-400 to-teal-500">
    Image goes here
  </div>
  <div class="grow flex flex-col justify-center self-center bg-gray-100 
  h-screen">
    <div class="w-3/4 mx-auto">
      <slot/>
    </div>
  </div>
</div>

</template>
