<template>
  <div class="add-row">
        <label for="name">Наименование корпуса</label>
        <input type="text" name="name" v-model="name"/>
        <label for="audience_number">Номе аудитории</label>
        <input type="number" name="audience_number" v-model="audience_number"/>
        <label for="floor">Этаж</label>
        <input type="number" name="floor" v-model="floor"/>
        <label for="width">Ширина аудитории, м.</label>
        <input type="number" name="width" v-model="width"/>
        <label for="length">Длина аудитории, м.</label>
        <input type="number" name="length" v-model="length"/>
        <label for="seats_count">Количество посадочных мест</label>
        <input type="number" name="seats_count" v-model="seats_count"/>
        <label for="type">Вид, назначение  помещения</label>
        <input type="text" name="type" v-model="type"/>
        <label for="subdivision">Подразделение владелец</label>
        <input type="text" name="subdivision" v-model="subdivision"/>
        <input v-show="!update_data" type="button" value="Добавить" @click="addNewRow()"/>
        <input v-show="update_data" type="button" value="Обновить" @click="addNewRow()"/>
      </div>
</template>

<script>
import axios from 'axios';

export default {
  name: 'AddRowFormComponent',
  props: [
    'audience',
    'update_data'
  ],
  data() {
    return {
    name: '',
    audience_number: '',
    floor: '',
    width: '',
    length: '',
    seats_count: '',
    type: '',
    subdivision: ''
    }
  },
  methods:
  {
    addNewRow(){
      if (!this.update_data) {
        this.writeBuilding();
      }
      else {
        this.updateBuilding();
      }
    },

    writeBuilding(){
      let formdata = new FormData();
      formdata.append('name', this.name);

      axios.post('http://localhost:8888/buildings', formdata,
      {headers: {'content-type': 'application/json'}})
      .then(response => this.writeSubdivision(response.data.id))
      .catch(exception => console.error('Error: ' + exception));
    },

    updateBuilding(){
      let formdata = new FormData();
      formdata.append('name', this.name);

      console.log(this.audience);

      axios.put('http://localhost:8888/buildings/' + this.audience.building.id, formdata,
      {headers: {'content-type': 'application/json'}})
      .then(response => this.updateSubdivision(response.data.id))
      .catch(exception => console.error('Error: ' + exception));
    },

    writeSubdivision(building_id){
      let formdata = new FormData();
      formdata.append('name', this.subdivision);
      formdata.append('building_id', building_id);

      axios.post('http://localhost:8888/subdivisions', formdata,
      {headers: {'content-type': 'application/json'}})
      .then(response => this.writeAudienceType(response.data.id))
      .catch(exception => console.error('Error: ' + exception));
    },

    updateSubdivision(building_id){
      let formdata = new FormData();
      formdata.append('name', this.subdivision);
      formdata.append('building_id', building_id);

      axios.put('http://localhost:8888/subdivisions/' + this.audience.subdivision.id, formdata,
      {headers: {'content-type': 'application/json'}})
      .then(response => this.updateAudienceType(response.data.id))
      .catch(exception => console.error('Error: ' + exception));
    },

    writeAudienceType(subdivision_id){
      let formdata = new FormData();
      formdata.append('name', this.type);

      axios.post('http://localhost:8888/audiencetypes', formdata,
      {headers: {'content-type': 'application/json'}})
      .then(response => this.writeAudience(subdivision_id, response.data.id))
      .catch(exception => console.error(exception.response));
    },

    updateAudienceType(subdivision_id){
      let formdata = new FormData();
      formdata.append('name', this.type);

      axios.put('http://localhost:8888/audiencetypes/' + this.audience.audienceType.id, formdata,
      {headers: {'content-type': 'application/json'}})
      .then(response => this.updateAudience(subdivision_id, response.data.id))
      .catch(exception => console.error('Error: ' + exception));
    },

    writeAudience(subdivision_id, type_id){
      let formdata = new FormData();
      formdata.append('parent_subdivision', Number(subdivision_id));
      formdata.append('type', Number(type_id));
      formdata.append('anumber', this.audience_number);
      formdata.append('length', this.length);
      formdata.append('width', this.width);
      formdata.append('seats_count', this.seats_count);
      formdata.append('floor', this.floor);

      axios.post('http://localhost:8888/audiences', formdata,
      {headers: {'content-type': 'application/json'}})
      .then(response => this.closeForm(response.data))
      .catch(exception => console.error('Error: ' + exception));
    },

    updateAudience(subdivision_id, type_id){
      let formdata = new FormData();
      formdata.append('parent_subdivision', Number(subdivision_id));
      formdata.append('type', Number(type_id));
      formdata.append('anumber', this.audience_number);
      formdata.append('length', this.length);
      formdata.append('width', this.width);
      formdata.append('seats_count', this.seats_count);
      formdata.append('floor', this.floor);

      axios.put('http://localhost:8888/audiences/' + this.audience.id, formdata,
      {headers: {'content-type': 'application/json'}})
      .then(response => this.closeForm(response.data))
      .catch(exception => console.error('Error: ' + exception));
    },

    closeForm(result){
      console.log(result);
      this.$emit('closeForm');
    },
  },
  mounted:
    function(){
      const audience = this.audience;

      this.name = audience.building.name;
      this.audience_number = audience.anumber;
      this.floor = audience.floor;
      this.width = audience.width;
      this.length = audience.length;
      this.seats_count = audience.seats_count;
      this.type = audience.audienceType.name;
      this.subdivision = audience.subdivision.name;
    }
}
</script>

<style scoped lang="scss">
.add-row {
    position:fixed;
    display:block;
    background-color: #5577AA;
    border-radius: 16px;
    padding: 1rem;
    width: 16rem;
    left:50%;
    margin-left: -150px;
    input, label{
      display:block;
      margin: .5rem auto;
    }
  }
</style>
