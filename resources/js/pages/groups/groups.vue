<template>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">First</th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="(g, index) in groups" :key="index">
        <th scope="row">{{ index + 1 }}</th>
        <td>{{ g.caption }}</td>
        <td><button type="submit" class="btn btn-danger"></button></td>
        </tr>
    </tbody>
  </table>
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
};
</script>
