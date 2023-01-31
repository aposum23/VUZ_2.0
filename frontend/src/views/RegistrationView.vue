<template>
  <div class="registr">
    <div class="form">
      <LoginRegistrForm :registration="true"/>
    </div>
    <div class="logo">
      <img src="@/assets/logo.svg" />
    </div>
  </div>
</template>

<script>
import LoginRegistrForm from '@/components/LoginRegistrForm.vue';

export default {
  name: 'RegistrationView',
  components: {
    LoginRegistrForm,
  }
}
</script>

<style scoped lang="scss">
.logo{
  width: 35rem;
}

.form{
  margin-right: 7rem;
}
.registr {
  display: inline-flex;
  width: 100%;
  margin-top: 7rem;
  align-items: center;
  justify-content: center;
}
</style>
