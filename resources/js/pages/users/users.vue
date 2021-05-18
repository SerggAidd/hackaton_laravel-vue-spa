<template>
  <div>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">First</th>
          <th scope="col">Удаление</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="u in users" :key="u.id">
          <th scope="row">{{ u.id }}</th>
          <td>{{ u.name }}</td>
          <td>
            <button @click="deleteUser, u" type="submit" class="btn btn-danger">Удалить</button>
          </td>
        </tr>
      </tbody>
    </table>
    <form @submit.prevent="toUser" method="post">
      <button type="submit" class="btn btn-primary">Добавление участника</button>
    </form>
  </div>
</template>

<script>

  import axios from 'axios'

export default {
  middleware: 'auth',

  data: () =>({
    users: [],
  }),
  created(){
    axios.get('/api/user/get').then((res) =>{
      this.users = res.data
    })
  },
  methods:{
    deleteUser(user){
        axios.post('/api/user/delete', user);
        console.log
    },
    toUser(){
        this.$router.push({name: 'users.create'});
    },
  },
};
</script>
