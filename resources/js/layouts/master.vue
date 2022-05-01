<script setup>

</script>

<template>

<div>
  <ul>
    <li>
      <a :href="route('dashboard')"> Dashboard </a>
    </li>
    <li>
      <a :href="route('ledger.page')"> Ledgers </a>
    </li>
  </ul>
</div>

<!-- Page Content goes here -->
<div>
  <slot></slot>
</div>


</template>

