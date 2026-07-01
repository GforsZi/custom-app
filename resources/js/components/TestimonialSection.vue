<script setup lang="ts">
import { ref, type Ref } from "vue";
import Carousel from 'primevue/carousel';

// Mengubah nama interface agar konsisten tanpa tanda kutip di key
interface Testimonial {
    name: string;
    job: string;
    title: string;
    message: string;
    avatar: string;
}

// Inisialisasi data dummy testimonial
const testimonials: Ref<Testimonial[]> = ref([
    {
        name: "John Doe",
        job: "Hiker Master",
        title: "I love this app!",
        message: "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed dignissim urna eu eros facilisis commodo. Pellentesque nec sem.",
        avatar: "male-1.png"
    },
    {
        name: "Jane Doe",
        job: "Chess Master",
        title: "Made me happier",
        message: "Neque volutpat ac tincidunt vitae semper quis lectus. Eget gravida cum sociis natoque penatibus et. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. ",
        avatar: "female-1.png"
    },
    {
        name: "Jack Sparrow",
        job: "Captain",
        title: "Oh! Its the best",
        message: "Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt.",
        avatar: "male-2.png"
    },
]);

// Opsi responsive agar carousel tetap menampilkan 1 item di semua ukuran layar
const responsiveOptions = ref([
    {
        breakpoint: '1400px',
        numVisible: 1,
        numScroll: 1
    },
    {
        breakpoint: '1199px',
        numVisible: 1,
        numScroll: 1
    },
    {
        breakpoint: '767px',
        numVisible: 1,
        numScroll: 1
    },
    {
        breakpoint: '575px',
        numVisible: 1,
        numScroll: 1
    }
]);
</script>

<template>
    <div id="testimonials" class="pt-12 pb-12">
        <Carousel :value="testimonials" :numVisible="1" :numScroll="1" :responsiveOptions="responsiveOptions" circular
            :autoplayInterval="3000">
            <template #item="slotProps">
                <div class="text-center p-4">
                    <div class="text-2xl italic mb-4">
                        {{ slotProps.data.title }}
                    </div>

                    <p class=" font-base text-md opacity-50 my-6 mx-auto max-w-2xl">
                        {{ slotProps.data.message }}
                    </p>

                    <div class="inline-flex items-center text-left">
                        <img :src="'avatars/' + slotProps.data.avatar" alt="avatar"
                            class="h-16 w-16 rounded-full object-cover">

                        <div class=" ml-4">
                            <div class="font-medium text-lg">
                                {{ slotProps.data.name }}
                            </div>
                            <div class="font-thin text-md opacity-75">
                                {{ slotProps.data.job }}
                            </div>
                        </div>
                    </div>
                </div>
            </template>
        </Carousel>
    </div>
</template>
