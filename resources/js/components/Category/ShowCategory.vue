<template>
  <div class="container">
    <div class="row mt-4">
      <div class="col-12">
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Name</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>{{ category.id }}</td>
              <td>{{ category.name }}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  props: ['category']
}
</script>

<style scoped>
h1 {
  color: blue;
}
</style>