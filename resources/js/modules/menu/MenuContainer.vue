<template>
  <div class="wrapper menu_container">
    <div class="row ">
      <div class="col-md-8">
        <card-component>
          <template slot="title"> item</template>
          <template slot="body">
            <div class="section">
              <multiselect :options="categories" v-model="menu"></multiselect>
            </div>
            <menu-groups :items="currentMenuItems"></menu-groups>
          </template>
        </card-component>
      </div>
      <div class="col-md-4">
        <card-component>
          <template slot="title"> add menu</template>
          <template slot="body">
            <menu-add-form 
            :categories="categories"
            :restau_id='restau_id'
            v-on:newItemAdded='handelNewItem'
            ></menu-add-form>
          </template>
        </card-component>
      </div>
    </div>
  </div>
</template>
<script>
import Multiselect from 'vue-multiselect';
import _ from 'lodash';
import MenuGroups from './MenuGroups.vue';
import MenuAddForm from './MenuAddForm.vue';


export default {

  name: 'MenuContainer',
  props: ['items' ,'restau_id'],
  components: { Multiselect, MenuGroups, MenuAddForm },
  data() {
    return {
      localItem: '',
      categories: [],
      menu: ''
    }
  },
  created() {
    _.forEach(this.items, (item, key) => {
      this.categories.push(key);
    });
    this.localItem = this.items;
  },
  computed: {
    currentMenuItems() {
      return this.localItem[this.menu];
    }
  },
  methods :{
    handelNewItem(item , category){
      this.localItem[category].unshift(item);
    }
  }
}

</script>
<style lang="css" scoped>
</style>
