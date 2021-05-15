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
        <tr v-for="g in groups" :key="g.id">
          <th scope="row">{{ g.id }}</th>
          <td>{{ g.caption }}</td>
          <td><form @submit.prevent="deleteGroup"><button type="submit" class="btn btn-danger">Удалить</button></form></td>
          </tr>
      </tbody>
    </table>
    <form @submit.prevent="toGroup">
      <button type="submit" class="btn btn-primary">Добавление группы</button>
    </form>
  </div>
</template>

<script>

  import axios from 'axios'

export default {
  middleware: 'auth',

  data: () =>({
    groups: [],
  }),
  created(){
    axios.get('/api/group/get').then((res) =>{
      this.groups = res.data
    })
  },
  methods:{
    deleteGroup(){
        axios.post('/api/group/delete',this.group);
        console.log
    },
    toGroup(){
        this.$router.push({name: 'groups.create'});
    },
  },
};
</script>
