<template>
  <div class="container-fluid bg-dark mb-3">
    <div class="container">
      <nav class="navbar navbar-dark">
        <span class="navbar-brand mb-0 h1">Vue Laravel SPA</span>
        <div>
          <router-link v-bind:to="{ name: 'task.list' }">
            <button class="btn btn-success">List</button>
          </router-link>
          <router-link v-bind:to="{ name: 'task.create' }">
            <button class="btn btn-success">ADD</button>
          </router-link>
          <router-link v-bind:to="{ name: 'auth.login' }">
            <button class="btn btn-success">Login</button>
          </router-link>
          <router-link v-bind:to="{ name: 'auth.usercreate' }">
            <button class="btn btn-success">ユーザークリエイト</button>
          </router-link>
          <button class="btn btn-success" v-on:click="logout">logout</button>
        </div>
      </nav>
    </div>
  </div>
</template>
      axios
        .get("/api/tasks", {
          headers: {
            Authorization: `Bearer ${token}`,
          },
        })
<script>
export default {
  methods: {
    async logout() {
      const token = localStorage.getItem("jwt-token");
      console.log(token);
      await axios.post("/api/logout", {
        headers: {
          Authorization: `Bearer ${token}`,
        },
      });
      this.$router.push({ name: "auth.login" });
    },
  },
};
</script>
