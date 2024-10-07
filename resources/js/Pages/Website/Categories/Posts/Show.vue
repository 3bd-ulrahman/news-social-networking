<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { route } from 'vendor/tightenco/ziggy/src/js';
import axios from 'axios';
import { router, usePage } from '@inertiajs/vue3';
import { ref } from 'vue';

defineOptions({ layout: AppLayout });

const props = defineProps({
  article: Object,
  similarArticles: Object
});

const showMoreComments = () => {
  axios.get(route('articles.comments.index', {article: props.article.id}), {
    params: {
      comment_id: props.article.comments[props.article.comments.length - 1].id
    }
  }).then(function (response) {
    if (response.data.length != 0) {
      props.article.comments.push(...response.data.data);
    }
  });
};

const commentContent = ref('');
const storeComment = () => {
  axios.post(route('articles.comments.store', {article: props.article.id}), {
    content: commentContent.value,
    article_id: props.article.id
  }).then(function (response) {
    commentContent.value = '';
    usePage().props.errors = {};
    props.article.comments.unshift(response.data.data)
  }).catch(function (error) {
    Object.keys(error.response.data.errors).forEach((field) => {
      error.response.data.errors[field].forEach((message) => {
        usePage().props.errors[field] = message;
      });
    });
  });
};
</script>

<template>
  <!-- Breadcrumb Start -->
  <div class="breadcrumb-wrap">
    <div class="container">
      <ul class="breadcrumb">
        <li class="breadcrumb-item">
          <a :href="route('home')">Home</a>
        </li>
        <li class="breadcrumb-item">
          <a href="#">News</a>
        </li>
        <li class="breadcrumb-item active">News details</li>
      </ul>
    </div>
  </div>
  <!-- Breadcrumb End -->

  <!-- Single News Start-->
  <div class="single-news">
    <div class="container">
      <div class="row">

        <div class="col-lg-8">
          <!-- Carousel -->
          <div id="newsCarousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li v-for="(image, index) in article.images"
                :class="{ active: index === 0 }"
                data-target="#newsCarousel"
                :data-slide-to="index"
              ></li>
            </ol>
            <div class="carousel-inner">
              <div v-for="(image, index) in article.images" :key="article.id"
                class="carousel-item"
                :class="{ active: index === 0 }"
              >
                <img :src="image" class="d-block w-100" alt="First Slide">
                <div class="carousel-caption d-none d-md-block">
                  <h5>{{ article.title }}</h5>
                </div>
              </div>
            </div>

            <a class="carousel-control-prev" href="#newsCarousel" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#newsCarousel" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
          <div class="sn-content">
            {{ article.content }}
          </div>

          <!-- Comment Section -->
          <div class="comment-section">
            <!-- Comment Input -->
            <form @submit.prevent="storeComment()">
              <div class="comment-input" style="display: block;">
                <textarea name="content" v-model="commentContent"
                placeholder="Add a comment..." style="width: 100%;" rows="5"></textarea>
                <span class="text-danger" v-if="usePage().props.errors.content">
                  {{ '* ' + usePage().props.errors.content }}
                </span>
                <button id="addCommentBtn" type="submit">Add</button>
              </div>
            </form>

            <!-- Display Comments -->
            <div class="comments">
              <div v-for="comment in article.comments" :key="comment.id" class="comment">
                <img :src="comment.user.avatar" alt="User Image" class="comment-img" />
                <div class="comment-content">
                  <span class="username">{{ comment.user.username }}</span>
                  <p class="comment-text">{{ comment.content }}</p>
                </div>
              </div>
              <!-- Add more comments here for demonstration -->
            </div>

            <!-- Show More Button -->
            <button @click="showMoreComments" id="showMoreBtn" class="show-more-btn">
              Show more
            </button>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="sidebar">

            <div class="sidebar-widget">
              <h2 class="sw-title">In This Category</h2>
              <div class="news-list">
                <div v-for="article in similarArticles" :key="article.id" class="nl-item">
                  <div class="nl-img">
                    <img :src="article.images[0]" />
                  </div>
                  <div class="nl-title">
                    <a :href="route('articles.show', {article: article.slug})">
                      {{ article.title.substr(0, 50) }}
                    </a>
                  </div>
                </div>
              </div>
            </div>

            <div class="sidebar-widget">
              <h2 class="sw-title">News Category</h2>
              <div class="category">
                <ul>
                  <li><a href="">National</a><span>(98)</span></li>
                  <li><a href="">International</a><span>(87)</span></li>
                  <li><a href="">Economics</a><span>(76)</span></li>
                  <li><a href="">Politics</a><span>(65)</span></li>
                  <li><a href="">Lifestyle</a><span>(54)</span></li>
                  <li><a href="">Technology</a><span>(43)</span></li>
                  <li><a href="">Trades</a><span>(32)</span></li>
                </ul>
              </div>
            </div>

            <div class="sidebar-widget">
              <h2 class="sw-title">Tags Cloud</h2>
              <div class="tags">
                <a href="">National</a>
                <a href="">International</a>
                <a href="">Economics</a>
                <a href="">Politics</a>
                <a href="">Lifestyle</a>
                <a href="">Technology</a>
                <a href="">Trades</a>
              </div>
            </div>

          </div>
        </div>

      </div>
    </div>
  </div>
  <!-- Single News End-->
</template>
