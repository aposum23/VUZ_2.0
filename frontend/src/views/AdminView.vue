<template>
  <div class="home">
    <HeaderComponent />
    <div class="content">
      <div class="buttons">
        <input type="button" value="Добавить запись" @click="openCloseAddRowForm(false)"/>
      </div>
      <AddRowFormComponent
        v-if="add_new_row === true"
        @closeForm="closeAndReload()"
        :audience="prop_audience"
        :update_data="update_data"/>
      <div class="table">
        <table>
          <tr>
            <th style="width: 13rem">Наименование корпуса</th>
            <th style="width: 7rem">Номер аудитории</th>
            <th style="width: 5rem">Этаж</th>
            <th style="width: 8rem">Ширина аудитории, м.</th>
            <th style="width: 8rem">Длина аудитории, м.</th>
            <th style="width: 8rem">Количество посадочных мест</th>
            <th style="width: 10rem">Вид, назначение помещения</th>
            <th style="width: 10rem">Подразделение владелец</th>
            <th style="width: 9rem">Редактировать</th>
          </tr>
          <tr v-for="(audience, index) in audience_list">
            <td>{{ audience.building.name }}</td>
            <td>{{ audience.anumber }}</td>
            <td>{{ audience.floor }}</td>
            <td>{{ audience.width }}</td>
            <td>{{ audience.length }}</td>
            <td>{{ audience.seats_count }}</td>
            <td>{{ audience.audienceType.name }}</td>
            <td>{{ audience.subdivision.name }}</td>
            <td><img src="@/assets/edit.svg" class="edit-icon" @click="openCloseAddRowForm(true, index)"/></td>
          </tr>
        </table>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios';
import HeaderComponent from "@/components/HeaderComponent.vue";
import AddRowFormComponent from '@/components/AddRowFormComponent.vue'

export default {
  name: 'HomeView',
  components: {
    HeaderComponent,
    AddRowFormComponent,
  },
  data(){
    return {
      audience_list: [],
      add_new_row: false,
      prop_audience: null,
      update_data: false,
    }
  },
  methods:{
    openCloseAddRowForm(is_updating, audience=null){
      this.update_data = is_updating;

      if (is_updating){
        this.prop_audience = this.audience_list[audience];
        console.log(this.audience_list[audience]);
        console.log(this.prop_audience);
      }

      this.add_new_row = !this.add_new_row;
    },

    closeAndReload(){
      this.$router.go(this.$router.currentRoute);
    },

    getInformation(){
      axios.get('http://localhost:8888/audiences')
      .then(response => this.audience_list = response.data)
      .catch(exeption => console.error('Error: ' + exeption));
    }
  },
  mounted:
  function(){
    this.getInformation();
  }
}
</script>

<style scoped lang="scss">
  .content {
    color: #fff;
    text-align: center;
  }
  
  .buttons {
    margin-top: 2rem;
    color: #000;
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

  .edit-icon {
    background-color: #fff;
    border-radius: 90px;
  }
  .edit-icon:hover {
    background-color: rgb(136, 127, 127);
    border-radius: 90px;
  }
  .edit-icon:active {
    background-color: rgb(80, 77, 77);
    border-radius: 90px;
  }
</style>
