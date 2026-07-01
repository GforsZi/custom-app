<script setup lang="ts">
import AppFooter from "../layouts/AppFooter.vue";
import AppTopbar from "../layouts/AppTopbar.vue";
import HeroSection from '../components/HeroSection.vue'
import TestimonialSection from '../components/TestimonialSection.vue'
import ContactSection from '../components/ContactSection.vue'
</script>

<template>
    <AppTopbar class="p-4" />
    <div class="min-h-screen p-4 flex flex-col gap-6">
        <HeroSection />
        <TestimonialSection />
        <ContactSection />
    </div>
    <AppFooter />
</template>
