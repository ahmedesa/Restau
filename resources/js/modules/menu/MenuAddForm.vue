<template>
  <div class="add_form_wrapper">
    <form v-on:submit.prevent='handelSubmit'>
      <div class="form-group">
        <label for="name">Food item</label>
        <input class="form-control" type="text" placeholder="Enter food item name" v-model="food.name">
        <div class="validation-message" v-text="validation.getMessage('name')">
        </div>
      </div>
      <div class="form-group">
        <label for="name">Food description</label>
        <textarea class="form-control " placeholder="Enter food item description" v-model='food.description'></textarea>
        <div class="validation-message" v-text="validation.getMessage('description')">
        </div>
      </div>
      <div class="form-group">
        <label for="category">Category</label>
        <multiselect v-model="food.category" :options='categories'></multiselect>
        <div class="validation-message" v-text="validation.getMessage('category')">
        </div>
      </div>
      <div class="form-group">
        <label for="name">price</label>
        <input class="form-control" type="number" placeholder="Enter food price" v-model="food.price">
        <div class="validation-message" v-text="validation.getMessage('price')">
        </div>
      </div>
      <button type="submit" class="btn btn-primary">save</button>
      <i v-if="loading" class="fa fa-spinner fa-spin" style="font-size:24px"></i>

    </form>
  </div>
</template>
<script>
import Multiselect from 'vue-multiselect';
import Validation from './../../utils/Validation.js';
export default {

  name: 'MenuAddForm',
  props: ['categories', 'restau_id'],
  components: { Multiselect },
  data() {
    return {
      food: this.emptyFoodItem() ,
      validation: new Validation(),
      loading :false,
    }
  },
  methods: {
    emptyFoodItem() {
      return {
        name: '',
        category: '',
        price: 100,
        description: ''
      }
    },
    handelSubmit() {
      this.loading =true;
      let Data = this.food;
      Data.restau_id = this.restau_id
      var url = window.Laravel.basePath + '/api/item/create';
      window.axios.post(url, Data)
        .then(response => {
          this.$emit('newItemAdded', response.data, Data.category);
          this.food = this.emptyFoodItem(); 
          this.loading = false;

        })
        .catch(error => {
          if (error.response.status == 422) {
            this.validation.setMessages(error.response.data.errors)
          }
        })
    }
  }
}

</script>
<style lang="css" scoped>
</style>
