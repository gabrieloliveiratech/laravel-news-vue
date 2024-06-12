<template>
  <div class="container mt-4">
    <div class="card">
      <div class="card-body">
        <h1 class="card-title">{{ news.title }}</h1>
        <hr>
        <p class="card-text">{{ news.content }}</p>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ['news']
}
</script>

<style scoped>
h1 {
  color: blue;
}
</style>