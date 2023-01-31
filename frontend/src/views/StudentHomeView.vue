<template>
  <div class="home">
    <HeaderComponent />
    <div class="content">
      <div class="navigation">
        <router-link to="/buildings" class="button-sign-in">
          <p>Корпусы</p>
        </router-link>
        <router-link to="/lections" class="button-sign-in">
          <p>Лекционные аудитории</p>
        </router-link>
        <router-link to="/ierarchy" class="button-sign-in">
          <p>Аудитории корпусов</p>
        </router-link>
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

  .navigation {
    margin: 4.5rem;
    input {
      margin: 0rem 2rem;
      padding: 0px;
      width: 11rem;
      height: 2rem;
      font-weight: bold;
    }
  }

  .button-sign-in {
    display: inline-flex;
    text-decoration: none;
    & p {
      color: #000;
      width: 12rem;
      height: 1.3rem;
      background-color: #fff;
      padding: .1rem;
      margin: auto;
    }
    margin: auto 1rem auto auto;
    text-align: center;

    &:hover {
      & p {
        background-color: #5577AA;
      }
      cursor: pointer;
    }

    &:active {
      & p {
        border: 1px solid #FFF;
        background-color: #1E1C1C;
        color: #fff;
        user-select: none;
      }
    }
  }
</style>
