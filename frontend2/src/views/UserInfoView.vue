<template>
  <div class="home">
    <HeaderComponent />
    <div class="content">
      <form>
        <label for="lastName">Фамилия</label>
        <input type="text" name="lastName" v-model="last_name"/>
        <label for="firstName">Имя</label>
        <input type="text" name="firstName" v-model="first_name"/>
        <label for="midleName">Отчество</label>
        <input type="text" name="midleName" v-model="midle_name"/>
        <label for="birthDate">Дата рождения</label>
        <input type="date" name="birthDate" v-model="birth_date"/>
        <label for="place_of_residence">Адрес регистрации</label>
        <input type="text" name="plase_of_residence" v-model="place_of_residence"/>
        <label for="address">Адрес проживания</label>
        <input type="text" name="address" v-model="residential_address"/>
        <label for="phone">Контактный номер телефона</label>
        <input type="text" name="phone" v-model="phone_number"/>
        <label for="email">Электронная почта</label>
        <input type="text" name="email" v-model="email"/>
        <input type="button" class="form-button" value="Сохранить" @click="saveData()"/>
        <p v-show="show_message" class="sign-up" @click="changeToReg()">Данные сохранены!</p>
      </form>
    </div>
  </div>
</template>

<script>
import axios from 'axios';
import HeaderComponent from "@/components/HeaderComponent.vue";

export default {
  name: 'HomeView',
  components: {
    HeaderComponent,
  },
  data(){
    return {
      last_name: '',
      first_name: '',
      midle_name: '',
      birth_date: '',
      place_of_residence: '',
      residential_address: '',
      phone_number: '',
      email: '',
      show_message: false,
    }
  },
  methods: {
    fillUserData(data){
      this.last_name = data.last_name;
      this.first_name = data.first_name;
      this.midle_name = data.midle_name;
      this.birth_date = data.birth_date;
      this.place_of_residence = data.place_of_residence;
      this.residential_address = data.residential_address;
      this.phone_number = data.phone_number;
      this.email = data.email;
    },

    getUserData(id){
      axios.get('http://localhost:8888/students/' + id)
      .then(response => this.fillUserData(response.data))
      .catch(exception => console.error(exception.response));
    },

    saveData(){
      let formdata = new FormData();
      formdata.append('last_name', this.last_name);
      formdata.append('first_name', this.first_name);
      formdata.append('midle_name', this.midle_name);
      formdata.append('birth_date', this.birth_date);
      formdata.append('place_of_residence', this.place_of_residence);
      formdata.append('residential_address', this.residential_address);
      formdata.append('phone_number', this.phone_number);
      formdata.append('email', this.email);

      axios.post('http://localhost:8888/students', formdata,
      {headers: {'content-type': 'application/json'}})
      .then(response => this.updateUser(response.data.id))
      .catch(exception => console.error(exception.response));
    },

    updateUser(id){
      const session_key = localStorage.getItem('session_key');
      const user_token = session_key.slice(0, session_key.length - 1);
      const user_data = user_token.split(' ');

      let formdata = new FormData();
      formdata.append('username', user_data[0]);
      formdata.append('student_id', id);

      axios.put('http://localhost:8888/users/' + id, formdata,
      {headers: {'content-type': 'application/json'}})
      .then(response => this.show_message = true)
      .catch(exception => console.error(exception.response.data));
    }
  },
  mounted:
  function(){
    const session_key = localStorage.getItem('session_key');
    const user_token = session_key.slice(0, session_key.length - 1);

    axios.get('http://localhost:8888/users', {
        params: {
          auth_string: user_token
        }
      },
      {headers: {"Content-type": "application/json"}})
    .then(response => this.getUserData(response.data.student_id))
    .catch(exception => console.error('Error: ' + exception));
  }
}
</script>

<style scoped lang="scss">
  .content {
    color: #fff;
    text-align: center;
  }

  input {
    display:block;
    margin: 1rem auto;
    width: 14rem;
  }
</style>
