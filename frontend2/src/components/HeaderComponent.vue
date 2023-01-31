<template>
  <div class="header">
    <router-link :to="url" class="logo">
      <img src="@/assets/logo.svg" />
    </router-link>
    <router-link to="/auth" class="button-sign-in" v-show="!is_loged">
      <p>Войти</p>
    </router-link>
    <router-link to="/user" class="button-user" v-show="is_loged">
      <img src="@/assets/user.svg"/>
    </router-link>
  </div>
</template>

<script>
export default {
  name: 'HeaderComponent',
  data(){
    return {
      is_loged: false,
      url: '/student'
    }
  },
  created:
    function(){
      if (localStorage.getItem('session_key')){
        this.is_loged = true;

        let session_key = localStorage.getItem('session_key');
        const current_url = this.$route.path;

        if (current_url === '/admin' && session_key.at(-1) === '1'){
          this.$router.push('/student');
        }

        if (session_key.at(-1) === '1'){
          this.url = '/student';
        }
        else {
          this.url = '/admin';
        }
      }
      else {
        this.$router.push('');
      }
    }
}
</script>

<style scoped lang="scss">
.header {
  display: inline-flex;
  width: 100%;
  background-color: #5577AA;
}
.logo {
  background-color: #fff;
  border-radius: 90px;
  margin: .5rem;
  height: 4rem;
}
.logo img{
  width: 4rem;
}
.button-sign-in {
  text-decoration: none;
  & p {
    color: #000;
    width: 4rem;
    height: 1.3rem;
    background-color: #fff;
    padding: .1rem;
    margin: auto;
  }
  margin: auto 1rem auto auto;
  text-align: center;

  &:hover {
    & p {
      border: 1px solid #1E1C1C;
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

.button-user {
  text-decoration: none;
  border-radius: 90px;
  & img {
    color: rgb(255, 255, 255);
    padding: .1rem;
    margin: auto;
  }
  margin: auto 1rem auto auto;
  text-align: center;

  &:hover {
    & img {
      border: 1px solid #1E1C1C;
    }
    cursor: pointer;
  }

  &:active {
    & img {
      border: 1px solid #FFF;
      background-color: #1E1C1C;
      color: #fff;
      user-select: none;
    }
  }
}
</style>
