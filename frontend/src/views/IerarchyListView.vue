<template>
  <div class="home">
    <HeaderComponent />
    <div class="content">
      <div class="table">
        <ul v-for="building in building_list">
          <li><h2>{{ building.name }}</h2></li>
          <ul v-for="subdivision in building.subdivisions">
            <li><h3>{{ subdivision.name }}</h3></li>
            <ul v-for="audience in building.audiences">
              <li v-if="audience.subname == subdivision.name">{{ audience.anumber }}</li>
            </ul>
          </ul>
        </ul>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios'
import HeaderComponent from "@/components/HeaderComponent.vue";

export default {
  name: 'HomeView',
  components: {
    HeaderComponent,
  },
  data() {
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
  }

  .table {
    width: 30rem;
    margin: 5rem auto;
  }
</style>
