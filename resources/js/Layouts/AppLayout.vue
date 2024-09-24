<script setup>
import "https://code.jquery.com/jquery-3.4.1.min.js";
import "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js";
import "../../lib/easing/easing.min.js";
import "../../lib/slick/slick.min.js";

import Header from "@/Layouts/Website/Header.vue";
import Footer from "@/Layouts/Website/Footer.vue";
import { onMounted } from "vue";

onMounted(() => {
  const script = document.createElement('script');
  script.src = 'http://localhost:5173/resources/js/main.js';
  document.head.appendChild(script);

  document.querySelectorAll('img').forEach((img) => {
    if (!img.hasAttribute('loading')) {
      img.loading = "lazy";
    }
  });
});
</script>

<template>
  <Header />

  <slot></slot>

  <Footer />

  <!-- Back to Top -->
  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
</template>

<style>
@import "https://fonts.googleapis.com/css?family=Montserrat:400,600&display=swap";
@import "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css";
@import "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css";
@import "../../lib/slick/slick.css";
@import "../../lib/slick/slick-theme.css";
@import "../../css/style.css";
</style>
