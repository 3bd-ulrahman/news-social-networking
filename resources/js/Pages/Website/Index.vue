<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link } from '@inertiajs/vue3';

defineOptions({ layout: AppLayout })

const props = defineProps({
  articles: Object,
  latestArticles: Object,
  mostViewedArticles: Object,
  popularArticles: Object,
  categories: Object,
  readMoreArticles: Object
});

</script>

<template>
    <!-- Top News Start-->
    <section class="top-news">
      <div class="container">
        <div class="row">

          <div class="col-md-6 tn-left">
            <div class="row tn-slider">
              <div v-for="article in latestArticles.slice(0, 2)" :key="article.id" class="col-md-6">
                <div class="tn-img">
                  <img :src="article.images[0]" />
                  <div class="tn-title">
                    <a href="">{{ article.title.substring(0, 30) }}</a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6 tn-right">
            <div class="row">
              <div v-for="article in latestArticles" :key="article.id" class="col-md-6">
                <div class="tn-img">
                  <img :src="article.images[0]" />
                  <div class="tn-title">
                    <a href="">{{ article.title.substring(0, 30) }}</a>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </section>
    <!-- Top News End-->

    <!-- Category News Start-->
    <section class="cat-news">
      <div class="container">
        <div class="row">

          <div v-for="category in categories" :key="category.id" class="col-md-6">
            <h2>{{ category.name }}</h2>
            <div class="row cn-slider">
              <div v-for="article in category.articles" :key="article.id" class="col-md-6">
                <div class="cn-img">
                  <img :src="article.images[0]" />
                  <div class="cn-title">
                    <a href="">{{ article.title.substring(0, 30) }}</a>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </section>
    <!-- Category News End-->

    <!-- Tab News Start-->
    <section class="tab-news">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <ul class="nav nav-pills nav-justified">
              <li class="nav-item">
                <a class="nav-link" data-toggle="pill" href="#popular">Popular News</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" data-toggle="pill" href="#latest">Latest News</a>
              </li>
            </ul>

            <div class="tab-content">
              <div id="popular" class="container tab-pane fade">
                <div class="tn-news">
                  <div class="tn-img">
                    <img src="assets/website/img/news-350x223-4.jpg" />
                  </div>
                  <div class="tn-title">
                    <a href="">Lorem ipsum dolor sit amet</a>
                  </div>
                </div>
                <div class="tn-news">
                  <div class="tn-img">
                    <img src="assets/website/img/news-350x223-5.jpg" />
                  </div>
                  <div class="tn-title">
                    <a href="">Lorem ipsum dolor sit amet</a>
                  </div>
                </div>
                <div class="tn-news">
                  <div class="tn-img">
                    <img src="assets/website/img/news-350x223-1.jpg" />
                  </div>
                  <div class="tn-title">
                    <a href="">Lorem ipsum dolor sit amet</a>
                  </div>
                </div>
              </div>

              <div id="latest" class="container tab-pane active">
                <div v-for="article in latestArticles" :key="article.id" class="tn-news">
                  <div class="tn-img">
                    <img :src="article.images[0]" />
                  </div>
                  <div class="tn-title">
                    <a href="">Lorem ipsum dolor sit amet</a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <ul class="nav nav-pills nav-justified">
              <li class="nav-item">
                <a class="nav-link" data-toggle="pill" href="#m-read">Most Read</a>
              </li>
            </ul>

            <div class="tab-content">
              <div id="m-read" class="container tab-pane active">
                <div v-for="article in mostViewedArticles" :key="article.id" class="tn-news">
                  <div class="tn-img">
                    <img :src="article.images[0]" />
                  </div>
                  <div class="tn-title" style="flex-grow: 1;">
                    <a href="">
                      {{ article.title }}
                    </a>
                  </div>
                  <small style="align-self: end; padding: 0.6rem; color: #555;">
                    ({{ article.views_count }}) views
                  </small>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Tab News Start-->

    <!-- Main News Start-->
    <section class="main-news">
      <div class="container">
        <div class="row">

          <div class="col-lg-9">
            <div class="row">
              <div v-for="article in articles.data" :key="article.id" class="col-md-4">
                <div class="mn-img">
                  <!-- <img src="assets/website/img/news-350x223-1.jpg" /> -->
                  <img :src="article.images[0]" />
                  <div class="mn-title">
                    <a href="">Lorem ipsum dolor sit</a>
                  </div>
                </div>
              </div>
            </div>
            <nav aria-label="Page navigation example">
              <ul class="pagination">
                <li
                  v-for="(page, index) in articles.links"
                  :key="page.label"
                  :class="[
                    page.url === null ? 'disabled' : '',
                    page.active ? 'active' : ''
                  ]"
                  class="page-item"
                >
                  <Link class="page-link"
                    :href="page.url === null ? '#' : page.url"
                    v-html="page.label"
                    preserve-scroll
                  />
                </li>
              </ul>
            </nav>
          </div>

          <div class="col-lg-3">
            <div class="mn-list">
              <h2>Read More</h2>
              <ul>
                <li v-for="article in readMoreArticles" :key="article.id">
                  <a href="">{{ article.title.substring(0, 30) }}</a>
                </li>
              </ul>
            </div>
          </div>

        </div>
      </div>
    </section>
    <!-- Main News End-->
</template>
