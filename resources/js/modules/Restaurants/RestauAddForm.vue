<template>
  <div class="resyau_add_form_wrapper">
    <h1 class="text-center">Add New Restuarant</h1>
    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" class="form-control" name="name" placeholder="Enter restuarant name" v-model="restau.name">
    </div>
    <div class="form-group">
      <label for="location">location</label>
      <input type="text" class="form-control" name="location" placeholder="Enter restuarant location" v-model="restau.location">
    </div>
    <div class="form-group">
      <label for="tables">Number of tables</label>
      <input type="text" class="form-control" name="tables" placeholder="Enter restuarant tables" v-model="restau.tables">
    </div>
    <button @click='handelAddButton' class="btn btn-primary">Add</button>
    <button @click='handelCancelButton' class="btn btn-warning">Cancel</button>
  </div>
</template>
<script>
export default {

  name: 'RestauAddForm',

  data() {
    return {
      restau: this.emptyRestau(),
    }
  },
  methods: {
    emptyRestau() {
      return {
        name: "",
        location: "",
        tables: 0
      }
    },
    handelAddButton() {
      this.$emit('addRestauEvent', this.restau);
    },
    handelCancelButton() {
      this.$emit('cancleModelEvent');
    }
  }
}

</script>
<style lang="css" scoped>
</style>
