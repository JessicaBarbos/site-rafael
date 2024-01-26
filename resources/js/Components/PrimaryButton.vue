<script setup>
defineProps({
  type: {
    type: String,
    default: "submit",
  },
});
</script>

<template>
  <button :type="type" class="btn bg-gradient-info w-100 my-4 mb-2">
    <slot />
  </button>
</template>
