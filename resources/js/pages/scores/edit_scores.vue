<template>
  <form @submit.prevent="editScore">
    <div class="form-score">
      <label for="exampleInputEmail1">Баллы за код</label>
      <input type="text" required class="form-control" v-model="score.code" placeholder="Введите баллы за код">
      <label for="exampleInputEmail1">Баллы за дизайн</label>
      <input type="text" required class="form-control" v-model="score.design" placeholder="Введите баллы за дизайнн">
      <label for="exampleInputEmail1">Баллы за геймплей</label>
      <input type="text" required class="form-control" v-model="score.gameplay" placeholder="Введите баллы за геймплей">
      <label for="exampleInputEmail1">Выберете студента</label>
      <input type="text" required class="form-control" v-model="score.user_id" placeholder="Введите id студента">
      <label for="exampleInputEmail1">Выберете тур</label>
      <input type="text" required class="form-control" v-model="score.tour" placeholder="Введите номер тура">
    </div>
    <button type="submit" class="btn btn-success">Добавить</button>
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

