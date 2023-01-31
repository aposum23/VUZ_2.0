<template>
  <form class="form">
      <input type="text" class="form-field" placeholder="Логин" v-model="login"/>
      <input type="password" class="form-field" placeholder="Пароль" v-model="password"/>
      <input v-show="registration" type="password" class="form-field" placeholder="Повторите пароль" v-model="password_repeat"/>
      <input v-show="!registration" type="button" class="form-button" value="Войти" @click="checkAuthData()"/>
      <input v-show="registration" type="button" class="form-button" value="Зарегистрироваться" @click="createAccaunt()"/>
      <p v-show="!registration" class="sign-up" @click="changeToReg()">Нет аккаунта? Зарегистрируйтесь!</p>
      <p v-if="registration === false && wrong_password === true" class="false-password">Логин или пароль неверные</p>
      <p v-if="registration === true && wrong_login === true" class="false-password">Логин уже занят</p>
      <p v-if="registration === true && wrong_password === true" class="false-password">Пароли не совпадают</p>
    </form>
</template>

<script>
import axios from 'axios';

export default {
  name: 'LoginRegistrForm',
  props: {
    registration: Boolean,
  },
  data(){
    return {
      login: '',
      password: '',
      password_repeat: '',
      wrong_password: false,
      wrong_login: false,
    }
  },
  methods: {
    changeToReg(){
      this.$router.push('/registr');
    },

    createAccaunt(){
      if (this.password === this.password_repeat){
        this.wrong_password = false;
        this.wrong_login = false;
        
        let formdata = new FormData();
        formdata.append('username', this.login);
        formdata.append('password', this.password);
        formdata.append('is_student', 1);

        axios.post('http://localhost:8888/users', formdata,
        {headers: {'content-type': 'application/json'}})
        .then(response => this.afterRegist(response.data))
        .catch(exception => console.error(exception.response));
      }
      else {
        this.wrong_password = true;
      }
    },

    afterRegist(data){
      console.log(data);
      if (data.wrong_login){
        this.wrong_login = true;
      }
      else {
        this.$router.push('/auth');
      }
    },

    checkAuthData(){
      const auth_string = (this.login + ' ' + this.password);

      axios.get('http://localhost:8888/users', {
        params: {
          auth_string: auth_string
        }
      },
      {headers: {"Content-type": "application/json"}})
      .then(response => this.changePage(response.data.is_loged, response.data, auth_string))
      .catch(exception => console.error(exception.response));
    },

    changePage(change, data, auth_string){
      console.log(change);
      if (change){
        if (data.is_student === 1) {
          this.wrong_password = false;

          localStorage.setItem('session_key', auth_string + data.is_student);
          localStorage.setItem('user_id', data.id);

          this.$router.push('/student');
        }
        else {
          this.wrong_password = false;

          localStorage.setItem('session_key', auth_string + data.is_student);
          localStorage.setItem('user_id');

          this.$router.push('/admin');
        }
      }
      else {
        this.wrong_password = true;
      }
    }
  }
}
</script>

<style scoped lang="scss">
.form {
  width: 20rem;
  background-color: #5577AA;
  padding: 1.5rem;
  text-align: center;
  box-shadow: 10px 10px 10px #1F324E;
  border-radius: 18px;border-radius: 18px;
}

.form-field {
  margin: 1rem auto .5rem auto;
  display: block;
  width: 90%;
  font-size: 14px;
  font-weight: 600;
  height: 2rem;
  outline: none;
}

.form-button {
  display: block;
  height: 2rem;
  width: 93%;
  margin: 1rem auto 0rem auto;
  font-size: 14px;
  font-weight: 600;
  outline: none;
}

.sign-up {
  color: #FFFFFF;
}

.false-password {
  color: #d65d5d;
}
</style>
