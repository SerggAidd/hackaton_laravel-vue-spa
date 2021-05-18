<template>
  <form @submit.prevent="addGroup">
    <div class="form-group">
      <label for="exampleInputEmail1">Название группы</label>
      <input type="text" required class="form-control" v-model="user.name" placeholder="Введите название группы">
    </div>
    <button type="submit" class="btn btn-success">Добавить</button>
  </form>
</template>

<script>

  import axios from 'axios'

export default {
  middleware: 'auth',

  data: () =>({
    user: {},
  }),
  methods:{
    addUser(){
      axios.post('/api/user/create',this.user).then((res) =>{
        this.$router.push({name: 'users'})
    });
    },
  },
};
</script>
