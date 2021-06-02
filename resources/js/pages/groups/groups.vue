<template>
  <div>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Название группы</th>
          <th scope="col">Удаление</th>
          <th scope="col">Редактирование</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="g in groups" :key="g.id">
          <th scope="row">{{ g.id }}</th>
          <td>{{ g.caption }}</td>
          <td>
            <button @click="deleteGroup (g)" type="button" class="btn btn-danger">Удалить</button>
          </td>
          <td>
            <button @click="editGroup (g)" type="button" class="btn btn-primary">Редактировать</button>
          </td>
        </tr>
      </tbody>
    </table>
    <form @submit.prevent="toGroup" method="post">
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
        axios.post('/api/group/delete', group).then((res) =>{
          this.groups = this.groups.filter((i)=> i.id != group.id)
          })
        console.log
    },
    editGroup(group){
        this.$router.push({name: 'groups.edit', params: {group: group,},});
    },
    toGroup(){
        this.$router.push({name: 'groups.create'});
    },
  },
};
</script>
