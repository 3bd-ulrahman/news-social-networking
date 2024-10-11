<!-- <script>
import AppLayout from '@/Layouts/AppLayout.vue';


// declare additional options
export default {
  layout: AppLayout,
  inheritAttrs: false,
  customOptions: {}
}
</script> -->

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { useForm, usePage } from '@inertiajs/vue3';
import { route } from 'vendor/tightenco/ziggy/src/js';

// defineOptions({ layout: AppLayout });

defineOptions({ layout: AppLayout });

const form = useForm({
  'name': null,
  'email': null,
  'phone': null,
  'subject': null,
  'body': null
});

const storeContact = () => {
  form.post(route('contacts.store'), {
    preserveScroll: true,
    onSuccess: () => {
      Toast.fire({
        icon: 'sucess',
        title: 'Thank you for contacting us!'
      });
    },
    onError: () => {
      Toast.fire({
        icon: 'error',
        title: 'Something went wrong!'
      });
    }
  });
};
</script>

<template>
  <!-- Breadcrumb Start -->
  <div class="breadcrumb-wrap">
    <div class="container">
      <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Contact</li>
      </ul>
    </div>
  </div>
  <!-- Breadcrumb End -->

  <!-- Contact Start -->
  <div class="contact">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-8">
          <div class="contact-form">
            <form @submit.prevent="storeContact()">
              <div class="form-row">
                <div class="form-group col-md-4" style="margin-bottom: 0;">
                  <input
                    v-model="form.name"
                    type="text"
                    class="form-control"
                    style="margin-bottom: 0;"
                    placeholder="Your Name"
                  />
                </div>
                <div class="form-group col-md-4" style="margin-bottom: 0;">
                  <input
                    v-model="form.email"
                    type="email"
                    class="form-control"
                    style="margin-bottom: 0;"
                    placeholder="Your Email"
                  />
                </div>
                <div class="form-group col-md-4" style="margin-bottom: 0;">
                  <input
                    v-model="form.phone"
                    type="tel"
                    class="form-control"
                    style="margin-bottom: 0;"
                    placeholder="Your Phone"
                  />
                </div>
                <span class="text-danger mt-1 col-md-12" v-if="usePage().props.errors.name">
                  {{ usePage().props.errors.name }}
                </span>
                <span class="text-danger mt-1 col-md-12" v-if="usePage().props.errors.email">
                  {{ usePage().props.errors.email }}
                </span>
                <span class="text-danger mt-1 col-md-12" v-if="usePage().props.errors.phone">
                  {{ usePage().props.errors.phone }}
                </span>
              </div>
              <div class="form-group">
                <input
                  v-model="form.subject"
                  type="text"
                  class="form-control"
                  placeholder="Subject"
                  style="margin-bottom: 0; margin-top: 1rem;"
                />
                <span class="text-danger mt-1" v-if="usePage().props.errors.subject">
                  {{ usePage().props.errors.subject }}
                </span>
              </div>
              <div class="form-group">
                <textarea
                  v-model="form.body"
                  class="form-control"
                  style="margin-bottom: 0;"
                  rows="5"
                  required
                  minlength="50"
                  placeholder="Message"
                ></textarea>
                <span class="text-danger mt-1" v-if="usePage().props.errors.body">
                  {{ usePage().props.errors.body }}
                </span>
              </div>
              <div>
                <button class="btn" type="submit" :disabled="form.processing">
                  Send Message
                </button>
              </div>
            </form>
          </div>
        </div>
        <div class="col-md-4">
          <div class="contact-info">
            <h3>Get in Touch</h3>

            <h4><i class="fa fa-map-marker"></i>{{ usePage().props.sharedSettings.address }}</h4>
            <h4><i class="fa fa-envelope"></i>{{ usePage().props.sharedSettings.email }}</h4>
            <h4><i class="fa fa-phone"></i>{{ usePage().props.sharedSettings.phone }}</h4>
            <div class="social">
              <a v-if="usePage().props.sharedSettings.twitter" :href="usePage().props.sharedSettings.twitter">
                <i class="fab fa-twitter"></i>
              </a>
              <a v-if="usePage().props.sharedSettings.facebook" :href="usePage().props.sharedSettings.facebook">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a v-if="usePage().props.sharedSettings.linkedin" :href="usePage().props.sharedSettings.linkedin">
                <i class="fab fa-linkedin-in"></i>
              </a>
              <a v-if="usePage().props.sharedSettings.instagram" :href="usePage().props.sharedSettings.instagram">
                <i class="fab fa-instagram"></i>
              </a>
              <a v-if="usePage().props.sharedSettings.youtube" :href="usePage().props.sharedSettings.youtube">
                <i class="fab fa-youtube"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Contact End -->
</template>
