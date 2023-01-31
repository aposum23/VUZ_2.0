<template>
  <div class="home">
    <HeaderComponent />
    <div class="content">
      <div class="table">
        <table>
          <tr>
            <th style="width: 13rem">Наименование корпуса</th>
            <th style="width: 7rem">Номер аудитории</th>
            <th style="width: 5rem">Этаж</th>
            <th style="width: 8rem">Площадь аудитории, м.</th>
            <th style="width: 8rem">Количество посадочных мест</th>
            <th style="width: 10rem">Подразделение владелец</th>
          </tr>
          <tr v-for="audience in audience_list">
            <td>{{ audience.building.name }}</td>
            <td>{{ audience.anumber }}</td>
            <td>{{ audience.floor }}</td>
            <td>{{ audience.square }}</td>
            <td>{{ audience.seats_count }}</td>
            <td>{{ audience.subdivision.name }}</td>
          </tr>
        </table>
      </div>
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
      audience_list: [],
    }
  },
  mounted:
  function(){
    axios.get('http://localhost:8888/audiences')
    .then(response => this.audience_list = response.data)
    .catch(exception => console.error('Error: ' + exception));
  }
}
</script>

<style scoped lang="scss">
  .content {
    color: #fff;
    text-align: center;
  }

  .table {
    table {
      margin: 3rem auto;
      border-collapse: collapse;
    }
    th, td {
      border: 1px solid #5577AA;
    }
  }
</style>
