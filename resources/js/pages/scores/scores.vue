<template>
  <div>
    <div>
      <form class="myForm bg-dark border-dark" action="#" @submit.prevent="scoresFilter()">
        <div class="row">
          <div class="col-3">
            <label class="text-light" for="sort">Номер тура</label>
            <select v-model="filter.tour" class="bg-dark border-dark text-light" name="sort" id="sort">
              <option selected>Без сортировки</option>
              <option>1 Тур</option>
              <option>2 Тур</option>
              <option>3 Тур</option>
            </select>
          </div>
          <div class="col-3">
            <input v-model="filter.name" placeholder="Введите имя пользователя">
          </div>
        </div>
        <div class="row">
          <button type="submit" class="btn btn-danger">Фильтр</button>
        </div>
      </form>
    </div>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">ФИО</th>
          <th scope="col">Тур</th>
          <th scope="col">Баллы за код</th>
          <th scope="col">Баллы за дизайн</th>
          <th scope="col">Баллы за дисплей</th>
          <th scope="col">Общая сумма баллов</th>
          <th scope="col">Место</th>
          <th scope="col">Редактирование</th>
          <th scope="col">Удаление</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="s in scores" :key="s.id">
          <th scope="row">{{ s.id }}</th>
          <td style="text-align: center">{{ s.user_id }}</td>
          <td style="text-align: center">{{ s.tour }}</td>
          <td style="text-align: center">{{ s.code }}</td>
          <td style="text-align: center">{{ s.design }}</td>
          <td style="text-align: center">{{ s.gameplay }}</td>
          <td style="text-align: center">
            {{ s.code + s.design + s.gameplay }}
          </td>
          <td style="text-align: center">Место</td>
          <td>
            <button @click="editScore(s)" type="submit" class="btn btn-primary">Редактировать</button>
          </td>
          <td>
            <button
              @click="deleteScore(s)"
              type="submit"
              class="btn btn-danger"
              style="text-align: center"
            >
              Удалить
            </button>
          </td>
        </tr>
      </tbody>
    </table>
    <form @submit.prevent="toScore" method="post">
      <button type="submit" class="btn btn-success">
        Добавление результатов
      </button>
    </form>
  </div>
</template>

<script>
import axios from "axios";

export default {
  middleware: "auth",

  data: () => ({
    scores: [],
    filter: {},
  }),
  created() {
    axios.get("/api/score/get").then((res) => {
      this.scores = res.data;
    });
  },
  methods: {
    deleteScore(score) {
      axios.post("/api/score/delete", score).then((res) => {
        this.scores = this.scores.filter((i) => i.id != score.id);
      });
      console.log;
    },
    toScore() {
      this.$router.push({ name: "scores.create" });
    },
    scoresFilter() {
      axios.get("/api/score/get?tour=" + this.filter.tour +"&name"+ this.filter.name).then((res) => {
        this.scores = res.data;
      });
    },
  },
};
</script>
<style scoped>
.myForm {
  padding: 10px;
}
</style>
