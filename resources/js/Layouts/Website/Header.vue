<script setup>
import { Link, usePage } from '@inertiajs/vue3';
import { route } from 'vendor/tightenco/ziggy/src/js';
</script>

<template>
<!-- Top Bar Start -->
<div class="top-bar">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="tb-contact">
            <p><i class="fas fa-envelope"></i>{{ usePage().props.settings.email }}</p>
            <p><i class="fas fa-phone-alt"></i>{{ usePage().props.settings.phone }}</p>
          </div>
        </div>
        <div class="col-md-6">
          <div class="tb-menu">
            <a href="">About</a>
            <a href="">Privacy</a>
            <a href="">Terms</a>
            <a href="">Contact</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Top Bar Start -->

  <!-- Brand Start -->
  <div class="brand">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-3 col-md-4">
          <div class="b-logo">
            <a href="index.html">
              <img :src="'/' + usePage().props.settings.logo" alt="Logo" />
            </a>
          </div>
        </div>
        <div class="col-lg-6 col-md-4"></div>
        <div class="col-lg-3 col-md-4">
          <div class="b-search">
            <input type="text" placeholder="Search" />
            <button><i class="fa fa-search"></i></button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Brand End -->

  <!-- Nav Bar Start -->
  <div class="nav-bar">
    <div class="container">
      <nav class="navbar navbar-expand-md bg-dark navbar-dark">
        <a href="#" class="navbar-brand">MENU</a>
        <button
          type="button"
          class="navbar-toggler"
          data-toggle="collapse"
          data-target="#navbarCollapse">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div
          class="collapse navbar-collapse justify-content-between"
          id="navbarCollapse">
          <div class="navbar-nav mr-auto">
            <a :href="route('home')" class="nav-item nav-link active">Home</a>
            <div class="nav-item dropdown">
              <a
                href="#"
                class="nav-link dropdown-toggle"
                data-toggle="dropdown">Categories</a>
              <div class="dropdown-menu">
                <Link v-for="category in usePage().props.sharedCategories"
                  :key="category.id"
                  :href="route('categories.articles.index', category.slug)"
                  :title="category.name"
                  class="dropdown-item"
                >
                  {{ category.name }}
                </Link>
              </div>
            </div>
            <a href="single-page.html" class="nav-item nav-link">Single Page</a>
            <a href="dashboard.html" class="nav-item nav-link">Dashboard</a>
            <a href="contact.html" class="nav-item nav-link">Contact Us</a>
          </div>
          <div class="social ml-auto">
            <a :href="usePage().props.settings.twitter" title="Twitter">
              <i class="fab fa-twitter"></i>
            </a>
            <a :href="usePage().props.settings.facebook" title="Facebook">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a :href="usePage().props.settings.linkedin" title="Linkedin">
              <i class="fab fa-linkedin-in"></i>
            </a>
            <a :href="usePage().props.settings.instagram" title="Instagram">
              <i class="fab fa-instagram"></i>
            </a>
            <a :href="usePage().props.settings.youtube" title="Youtube">
              <i class="fab fa-youtube"></i>
            </a>
          </div>
        </div>
      </nav>
    </div>
  </div>
  <!-- Nav Bar End -->
</template>
