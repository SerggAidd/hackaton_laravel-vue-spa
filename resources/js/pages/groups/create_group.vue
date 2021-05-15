<template>
  <form @submit.prevent="addGroup">
    <div class="form-group">
      <label for="exampleInputEmail1">Название группы</label>
      <input type="text" required class="form-control" v-model="group.caption" placeholder="Введите название группы">
    </div>
    <button type="submit" class="btn btn-success">Добавить</button>
  </form>
</template>

<script>

  import axios from 'axios'

export default {
  middleware: 'auth',

  data: () =>({
    group: {},
  }),
  methods:{
    addGroup(){
      axios.post('/api/group/create',this.group).then((res) =>{
        this.$router.push({name: 'groups'})
    });
    },
  },
};
</script>
