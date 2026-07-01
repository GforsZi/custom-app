<script setup lang="ts">
import Button from 'primevue/button';
</script>

<template>
    <div class="container mx-auto px-5 overflow-x-hidden">
        <section class="grid grid-cols-none lg:grid-cols-2 pb-16 pt-8 items-center">
            <div class="lg:w-5/6 order-2 lg:order-none">
                <h1 class="text-4xl xl:text-5xl font-bold font-theme-heading text-center lg:text-left">A Simple
                    Bookmark Manager</h1>
                <p class="lg:text-xl mt-10 font-theme-content text-theme-grayish-blue text-center lg:text-left">A
                    clean and simple interface to organize your favourite websites. Open a new browser tab and see
                    your sites load instantly. Try it for free.</p>
                <div class="flex justify-center lg:justify-start mt-10 gap-2">
                    <Button as="a" label="Primary" variant="outlined" href="/admin" icon="pi pi-th-large" />
                    <Button as="a" label="secondary" variant="outlined" href="/admin" icon="pi pi-th-large" />
                </div>
            </div>
            <div class="relative order-1 lg:order-none mb-20 lg:mt-0 lg:mb-0 lg:-mr-10">
                <img class="z-10 w-full" src="/image/illustration-hero.svg" />
                <div
                    class="-z-10 bg-primary h-52 w-full sm:h-80 sm:w-full rounded-l-full absolute -right-28 md:-right-48 -bottom-8">
                </div>
            </div>
        </section>
    </div>
</template>
