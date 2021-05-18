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
          <td>
            <button @click="deleteGroup, g" type="submit" class="btn btn-danger">Удалить</button>
          </td>
        </tr>
      </tbody>
    </table>
    <form @submit.prevent="toGroup" action="{'$group->id'}"  method="post">
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
    deleteGroup(group){
        axios.post('/api/group/delete', group);
        console.log
    },
    toGroup(){
        this.$router.push({name: 'groups.create'});
    },
  },
};
</script>
