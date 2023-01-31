<template>
  <div class="home">
    <HeaderComponent />
    <div class="content">
      <div class="hello-message">
        <h2>Добро пожаловать в систему ВУЗ 2.0!<br/>Авторизируйтесь для начала работы</h2>
      </div>
      <div class="logo">
        <img src="@/assets/logo.svg" />
      </div>
    </div>
  </div>
</template>

<script>
import HeaderComponent from "@/components/HeaderComponent.vue";

export default {
  name: 'HomeView',
  components: {
    HeaderComponent,
  }
}
</script>

<style scoped lang="scss">
  .content {
    color: #fff;
    text-align: center;
  }

  .hello-message {
    margin: 4.5rem
  }
</style>
