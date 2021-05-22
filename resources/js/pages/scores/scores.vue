<template>
  <div>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Порядковый номер</th>
          <th scope="col">Имя</th>
          <th scope="col">Баллы за код</th>
          <th scope="col">Баллы за дизайн</th>
          <th scope="col">Баллы за геймплей</th>
          <th scope="col">Возраст</th>
          <th scope="col">Группа</th>
          <th scope="col">Удаление</th>
 
        </tr>
      </thead>
      <tbody>
        <tr v-for="s in scores" :key="s.id">
          <th scope="row">{{ s.id }}</th>
          <td>{{ s.name }}</td>
          <td>{{ s.code }}</td>
          <td>{{ s.design }}</td>
          <td>{{ s.gameplay }}</td>
          <td>Возраст</td>
          <td>{{ s.user_id }}</td>
          <td>
            <button @click="deleteUser(u)" type="submit" class="btn btn-danger">Удалить</button>
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
    axios.get('/api/score/get').then((res) =>{
      this.scores = res.data
    })
  },
  methods:{
    deleteUser(score){
        axios.post('/api/score/delete', user).then((res) =>{
          this.scores = this.scores.filter((i)=> i.id != score.id)
          })
        console.log
    },
    toUser(){
        this.$router.push({name: 'scores.create'});
    },
  },
};
</script>
