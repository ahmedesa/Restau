<template>
	   <div class="section">
              <table class="table table-hover table-striped">
                <thead>
                  <tr>
                    <th >Name &amp : discreption</th>
                    <th scope="col">price</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="(item ,index ) in items" :key='index'>
                    <td><strong v-text='item.name'></strong>
                    	<p v-text="item.description"></p>
                    </td>
                    <td><span v-text="item.price"></span></td>
                  </tr>   
                </tbody>
              </table>
            </div>
</template>

<script>
export default {

  name: 'MenuGroups',
  props : ['items'],
  data () {
    return {

    }
  }
}
</script>

<style lang="css" scoped>
</style>