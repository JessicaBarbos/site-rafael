<script setup>
import { ref } from "vue";
import Footer from "./Components/Footer.vue";
import Breadcrumbs from "./Components/Breadcumbs.vue";
import VerticalMenu from "./Components/VerticalMenu.vue";

const showingNavigationDropdown = ref(false);
</script>

<template>
  <div>
    <div class="min-h-screen bg-gray-100">
      <VerticalMenu />
      <main
        class="main-content position-relative max-height-vh-100 h-100 border-radius-lg"
      >
        <Breadcrumbs />
        <slot />
        <Footer />
      </main>
    </div>
  </div>
</template>
