<script setup>
import Footer from "./Components/Footer.vue";
import Breadcrumbs from "./Components/Breadcumbs.vue";
import VerticalMenu from "./Components/VerticalMenu.vue";
import ProgressBar from "../Components/ProgressBar.vue";
import FlashMessage from "@/Components/FlashMessage.vue";
</script>

<template>
  <div>
    <div class="min-h-screen bg-gray-100">
      <VerticalMenu @visible="deleteFilial($event)" />

      <main
        class="main-content position-relative max-height-vh-100 h-100 border-radius-lg"
      >
        <FlashMessage />
        <ProgressBar :visible="visible" />
        <Breadcrumbs />
        <slot />
        <Footer />
      </main>
    </div>
  </div>
</template>
