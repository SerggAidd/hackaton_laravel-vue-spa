<template>
  <form @submit.prevent="addScore">
    <div class="form-user">
      <label for="exampleInputEmail1">Введите баллы за код</label>
      <input type="text" required class="form-control" v-model="user.name" placeholder="Введите баллы за код">
      <label for="exampleInputEmail1">Введите баллы за дизайн</label>
      <input type="text" required class="form-control" v-model="user.email" placeholder="Введите баллы за дизайн">
      <label for="exampleInputEmail1">Введите баллы за дисплей</label>
      <input type="text" required class="form-control" v-model="user.age" placeholder="Введите баллы за геймплей">
      <label for="exampleInputEmail1">обЪявите пользователя</label>
      <select v-model="score.user_id">
        <option class="form-control" :value="u.id" v-for="u in useres" :key="u.id">{{u.name}}</option>
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
    score: {},
  }),
  created(){
    axios.get('/api/score/get').then((res) =>{
      this.scores = res.data
    })
  },
  methods:{
    addScore(){
      axios.post('/api/score/create',this.user).then((res) =>{
        this.$router.push({name: 'scores'})
    });
    },
  },
};
</script>
