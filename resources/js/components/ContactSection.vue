<script setup lang="ts">
import InputText from "primevue/inputtext";
import Textarea from "primevue/textarea";
import Button from "primevue/button";
</script>

<template>
    <div id="contact" class="mt-24 px-4 md:px-0">
        <div class="flex flex-wrap items-start justify-center gap-8 md:gap-12 max-w-6xl mx-auto">

            <div class="w-full md:w-5/12">
                <h1 class=" font-semibold text-2xl">
                    Contact with us
                </h1>
                <div class="mt-8 opacity-50 lg:text-base text-sm leading-relaxed md:w-3/4 w-full">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua.
                </div>

                <div class="mt-12 font-bold">
                    Head Office
                </div>
                <div class="mt-2 text-sm md:text-base opacity-50 space-y-1">
                    <div>1600 Pennsylvania Avenue NW</div>
                    <div>Washington DC 20500</div>
                    <div>United States of America</div>
                </div>

                <div class="flex mt-12 opacity-50 items-center gap-2">
                    <i class="pi pi-phone text-lg"></i>
                    <span class="text-base">+1 01 2345 6789</span>
                </div>
                <div class="flex items-center mt-2 opacity-50 gap-2">
                    <i class="pi pi-envelope text-lg"></i>
                    <a href="mailto:info@dasos.com" class="no-underline text-base text-main-green">info@dasos.com</a>
                </div>
            </div>

            <div class="w-full md:w-5/12">
                <form @submit.prevent class="flex flex-col gap-6">
                    <div class="text-extrabold font-medium md:hidden block mt-6">
                        Send us a message
                    </div>

                    <div>
                        <InputText placeholder="Your name"
                            class="w-full py-4 font-medium text-base text-centerfocus:outline-none" />
                    </div>

                    <div>
                        <InputText placeholder="Your email"
                            class="w-full py-4 font-medium text-base text-centerfocus:outline-none" />
                    </div>

                    <div>
                        <Textarea placeholder="Your Message" rows="5"
                            class="w-full py-4 font-medium text-base text-centerfocus:outline-none" />
                    </div>

                    <div class="w-full text-center md:text-right">
                        <Button type="submit" label="Send Message"
                            class="w-full lg:w-auto px-4 py-4 rounded font-medium text-center " />
                    </div>
                </form>
            </div>

        </div>
    </div>
</template>

<style scoped>
/* Memastikan placeholder dan teks input tetap berada di tengah sesuai desain awal */
:deep(.p-inputtext::placeholder),
:deep(.p-textarea::placeholder) {
    text-align: center;
}

:deep(.p-inputtext),
:deep(.p-textarea) {
    text-align: center;
}
</style>
