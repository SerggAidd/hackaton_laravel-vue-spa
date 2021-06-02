<template>
  <form @submit.prevent="editGroup">
    <div class="form-group">
      <label for="exampleInputEmail1">Новое название группы</label>
      <input type="text" required class="form-control" v-model="group.caption" placeholder="Введите новое название группы">
    </div>
    <button type="submit" class="btn btn-success">Изменить</button>
  </form>
</template>

<script>

  import axios from 'axios'

export default {
  middleware: 'auth',

  data () {
      return{
         group: {}
      } 
  },
  created(){
        this.group = this.$route.params.group;
        console.log(this.groups)
    },
  methods:{
    editGroup(){
      axios.post('/api/group/edit',this.group).then((res) =>{
        this.$router.push({name: 'groups'})
    });
    },
  },
};
</script>
