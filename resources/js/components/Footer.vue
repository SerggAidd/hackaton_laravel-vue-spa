<template>
  <footer class="footer fixed-bottom">
    <div class="container4">
      <div class="footer_row">
        <div class="footer_item">
          <div class="item_summary">
            <div class="item_title">
              <p class="title_light">
                Произведено в IT-школе Р<img
                  class="adaptive_img"
                  src="img/rocket_min.PNG"
                  width="35"
                  height="35"
                />кета
              </p>
            </div>
            <div class="item_text">
              <p class="text_light">
                ©2021 IT-школа Ракета - Образование в сфере IT.<br />
                Все права защищены. Копирование материалов с сайта без ссылки на этот
                ресурс запрещено.<br />
                Мы нахолимся по адресу: г. Камышин, ул. Пролетарская, дом 4
              </p>
            </div>
          </div>
        </div>
        <div class="footer_item">
          <div class="item_list">
            <p>
              • Если у вас возникнут вопросы образайтесь по номеру
              <a
                class="list_link"
                style="text-decoration: none"
                href="tel:+7(927)-123-45-67"
                >+7(927)-123-45-67</a
              >.<br />
              • Внимательно ознакомьтесь с основной информацией в разделе "Главная".
              <br />
              • Подписывайтесь на наши обновления в соц. сетях.
            </p>
          </div>
        </div>
        <div class="footer-item footer_item2">
          <div class="item_us">
            <a
              href="https://instagram.com/raketait?igshid=1br07peapxsna"
              class="zero_style"
            >
              <img class="us_img" src="img/instagram.png" width="25px" height="25px" /> -
              Наш инстаграмм
            </a>
            <a href="https://vk.com/bigbenit" class="zero_style">
              <img class="us_img" src="img/vk.png" width="25px" height="25px" /> - Наша
              группа в вк
            </a>
            <a
              href="https://www.youtube.com/channel/UCajxvhqpiRrmmkfZXH7NeFg"
              class="zero_style"
            >
              <img class="us_img" src="img/youtube.png" width="25px" height="25px" /> -
              Наш ютуб канал
            </a>
          </div>
        </div>
      </div>
    </div>
  </footer>
</template>

<script>
import { mapGetters } from 'vuex'
import LocaleDropdown from './LocaleDropdown'

export default {
  components: {
    LocaleDropdown
  },

  data: () => ({
    appName: window.config.appName
  }),

  computed: mapGetters({
    user: 'auth/user'
  }),
}

</script>

<style scoped>

</style>