<template>
  <div class="form-app-error" v-if="display">
    <div class="form-app-error-message">
      <a href="#" @click.prevent="reload">{{ message }}</a>
    </div>
  </div>
</template>

<script>
  export default {
    computed: {
      display() {
        return this.$store.state.appError.status;
      },
      message() {
        return this.$store.state.appError.message;
      },
      reload() {
        window.location.reload();
      }
    }
  }
</script>
