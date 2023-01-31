<template>
  <div class="home">
    <HeaderComponent />
    <div class="content">
      <div class="table">
        <table>
          <tr>
            <th style="width: 13rem">Наименование корпуса</th>
            <th style="width: 7rem">Количество аудиторий</th>
            <th style="width: 8rem">Количество лекционных аудиторий</th>
            <th style="width: 9rem">Количество аудиторий для практических занятий</th>
            <th style="width: 9rem">Количество компьютерных аудиторий</th>
          </tr>
          <tr v-for="building in building_list">
            <td>{{ building.name }}</td>
            <td>{{ building.audienceCount }}</td>
            <td>{{ building.lectionCount }}</td>
            <td>{{ building.practicCount }}</td>
            <td>{{ building.computerCount }}</td>
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
      building_list: [],
    }
  },
  mounted:
  function(){
    axios.get('http://localhost:8888/buildings')
    .then(response => this.building_list = response.data)
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
