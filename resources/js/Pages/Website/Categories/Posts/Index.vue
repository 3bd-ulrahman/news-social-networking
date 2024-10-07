<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link, usePage } from '@inertiajs/vue3';
import { route } from 'vendor/tightenco/ziggy/src/js';

defineOptions({ layout: AppLayout })

const props = defineProps({
  category: Object,
  articles: Object
});
</script>

<template>
  <div class="main-news">
    <div class="container">
      <div class="row pt-5">

        <div class="col-lg-9">
          <div class="row">
            <div v-for="article in articles.data" :key="article.id" class="col-md-4">
              <div class="mn-img">
                <img :src="article.images[0]" />
                <div class="mn-title">
                  <a :href="route('articles.show', {article: article.slug})" :title="article.title">
                    {{ article.title.substring(0, 30) }}
                  </a>
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
            <h2>Other Categories</h2>
            <ul>
              <li v-for="category in usePage().props.sharedCategories" :key="category.id">
                <a href="">Lorem ipsum dolor sit amet</a>
              </li>
            </ul>
          </div>
        </div>

      </div>
    </div>
  </div>
</template>
