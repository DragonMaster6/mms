<template>
  <main>
    <!-- Sidebare -->
    <section class="">
      Side bar content goes here
      <ul>
        <li> <Link href="/ledgers"> Ledgers </Link> </li>
      </ul>
    </section>

    <!-- Main content -->
    <section>
      <slot name="content"></slot>
    </section>
  </main>
</template>

<script setup>
import { Link } from '@inertiajs/inertia-vue3';

</script>
