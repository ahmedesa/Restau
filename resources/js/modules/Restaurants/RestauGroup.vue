<template>
  <div class="restau-group__wrapper mb-5">
    <div class="row">
      <div class="col-md-4 mb-4" v-for="restau in localRestaus" :key="restau.id">
        <card-component>
          <template slot="title">{{restau.name}}</template>
          <template slot="body">
            {{restau.location}}
            <br>
            <a v-bind:href="restau.slug" class="card-link">Show Menu</a>
          </template>
        </card-component>
      </div>
      <div class="col-md-4" v-if="showAddForm">
        <card-component>
          <template slot="title">Add new Restaurant</template>
          <template slot="body">
            <div class="add_new_retau">
              <span @click="handeLaAddNewRestau">
                <i class="fa fa-plus-circle fa-3x pointer"></i>
              </span>
            </div>
          </template>
        </card-component>
        <modal height="auto" name="add-new-restau">
          <div class="p-1">
            <restau-add-form @addRestauEvent="handelSaveRestau" @cancleModelEvent="cancleModel"></restau-add-form>
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
      localRestaus: {}
    }
  },
  computed: {
    showAddForm() {
      return (this.restaus.length < 5) ? true : false;
    }
  },
  created() {
    this.localRestaus = this.restaus;
  },
  methods: {
    cancleModel() {
      this.$modal.hide('add-new-restau');

    },
    handeLaAddNewRestau() {
      this.$modal.show('add-new-restau');

    },
    handelSaveRestau(restauData) {
      var url = window.Laravel.basePath + '/api/restau/create';
      window.axios.post(url, restauData).then(response => {
        this.cancleModel();
        this.localRestaus.unshift(response.data);
      })
    }
  }
}

</script>
<style>
.add_new_retau {
  cursor: pointer;
  text-align: center;


}

</style>
