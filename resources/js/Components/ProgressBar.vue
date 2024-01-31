<!-- resources/js/components/ProgressBar.vue -->
<template>
  <div :class="visible ? 'd-md-block' : 'd-none'">
    <div ref="bar" class="nprogress-container">
      <div class="nprogress-bar" ref="progress"></div>
    </div>
  </div>
</template>
  
  <script>
import NProgress from "nprogress";

export default {
  props: {
    visible: Boolean,
  },

  mounted() {
    NProgress.configure({ parent: this.$refs.bar });
    this.$Progress = NProgress;
  },
};
</script>
  
  <style scoped>
.nprogress-container {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  height: 2px;
  z-index: 9999;
}

.nprogress-bar {
  background: #4caf50;
  height: 100%;
}
</style>
  