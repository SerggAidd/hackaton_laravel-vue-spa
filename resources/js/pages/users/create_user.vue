<template>
  <form @submit.prevent="addUser">
    <div class="form-user">
      <label for="exampleInputEmail1">Введитеи имя</label>
      <input type="text" required class="form-control" v-model="user.name" placeholder="Введите ФИО">
      <label for="exampleInputEmail1">Введите электронную почту</label>
      <input type="text" required class="form-control" v-model="user.email" placeholder="Введите email">
      <label for="exampleInputEmail1">Введите возраст</label>
      <input type="text" required class="form-control" v-model="user.age" placeholder="Введите Возраст">
      <select v-model="user.group_id">
        <option class="form-control-lg" :value="g.id" v-for="g in groups" :key="g.id">{{g.caption}}</option>
      </select>
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
    groups: [],
  }),
  created(){
    axios.get('/api/group/get').then((res) =>{
      this.groups = res.data
    })
  },
  methods:{
    addUser(){
      axios.post('/api/user/create',this.user).then((res) =>{
        this.$router.push({name: 'users'})
    });
    },
  },
};
</script>
