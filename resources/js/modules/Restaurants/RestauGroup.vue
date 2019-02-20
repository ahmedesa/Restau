<template>
  <div class="restau-group__wrapper mb-5">
    <div class="row">
      <div class="col-md-4 mb-4" v-for="restau in restaus" :key="restau.id">
        <card-component>
          <template slot="title">{{restau.name}}</template>
          <template slot="body">{{restau.location}} </template>
        </card-component>
      </div>
      <div class="col-md-4" v-if="showAddForm">
        <card-component>
          <template slot="title">Add new Restaurant</template>
          <template slot="body">
            <span @click="handeLaAddNewRestau">+</span>
          </template>
        </card-component>
        <modal height="auto" name="add-new-restau">
          <div class="p-1">
            <restau-add-form
			@addRestauEvent="handelSaveRestau"
            ></restau-add-form>
          </div>
        </modal>
      </div>
    </div>
  </div>
</template>
<script>
import RestauAddForm from './RestauAddForm.vue';
export default {
  components: {
    RestauAddForm
  },
  props: ['restaus'],
  data() {
    return {

    }
  },
  computed: {
    showAddForm() {
      return (this.restaus.length < 3) ? true : false;
    }
  },
  methods: {
    handeLaAddNewRestau() {
      this.$modal.show('add-new-restau');

    },
    handelSaveRestau(restauData){
    console.log(restauData);
    }
  }
}

</script>
<style lang="css" scoped>
</style>
