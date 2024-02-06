<template>
  <div style="">
    <div
      v-if="$page.props.flash.success && show"
      class="alert alert-success alert-dismissible fade show"
      style="color: white"
    >
      {{ $page.props.flash.success }}
      <button type="button" class="close h-100" @click="show = false">
        <span><i class="fa fa-times"></i></span>
      </button>
      <br />
    </div>
    <div
      v-if="$page.props.flash.error && show"
      class="alert alert-danger alert-dismissible fade show"
      style="color: white"
    >
      {{ $page.props.flash.error }}
      <button type="button" class="close h-100" @click="show = false">
        <span><i class="fa fa-times"></i></span>
      </button>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      show: true,
    };
  },
  watch: {
    "$page.props.flash": {
      handler() {
        this.show = true;
      },
      deep: true,
    },
  },
};
</script>