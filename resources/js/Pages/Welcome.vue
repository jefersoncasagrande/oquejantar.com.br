<script setup>
import { Head } from '@inertiajs/vue3';
import { ref } from 'vue';

const props = defineProps(['text']);

const tonightDinner = ref(null);

const step = ref(0);
const getDinner = async () => {
    step.value = 1;
    
    var response = await fetch('/api/get-dinner');
    var [ dinner ] = await response.json();

    tonightDinner.value = dinner;

    step.value = 2;
}

const perfect = () => {
    // TODO - Implementar
    step.value = 3;
}
</script>

<template>
    <Head title="O Que Jantar?" />
    <div class="container mx-auto p-14 h-screen overflow-auto">
        <!-- // Passo 1 - boas vindas -->
        <div v-if="step === 0" class="h-full flex flex-col items-center justify-center gap-6 text-center">
            <div><h1 class="bg-clip-text text-transparent text-4xl font-bold bg-gradient-to-r from-primary to-secondary">Não sabe o que jantar, né?</h1></div>
            <div><button @click="getDinner" class="btn btn-primary text-lg">Relaxa! clica aqui</button></div>
        </div>

        <!-- // Passo 2 - loading -->
        <div v-if="step === 1" class="h-full flex flex-col items-center justify-center gap-6 text-center">
            <div>
                <svg width="55" height="42" viewBox="0 0 55 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M23.8333 41.9081C24.8646 42.2704 25.9722 41.5171 25.9722 40.4301V4.44349C25.9722 4.04301 25.8194 3.64252 25.4948 3.3946C23.6233 1.90708 19.3264 0 13.75 0C8.92795 0 4.42101 1.26821 1.7283 2.29803C0.649306 2.71759 0 3.78555 0 4.93934V40.2489C0 41.3836 1.22222 42.1751 2.30122 41.8222C5.30903 40.821 10.0738 39.6672 13.75 39.6672C16.987 39.6672 21.2934 41.0022 23.8333 41.9081ZM31.1667 41.9081C33.7066 41.0022 38.013 39.6672 41.25 39.6672C44.9262 39.6672 49.691 40.821 52.6988 41.8222C53.7778 42.1846 55 41.3836 55 40.2489V4.93934C55 3.78555 54.3507 2.71759 53.2717 2.30757C50.579 1.26821 46.072 0 41.25 0C35.6736 0 31.3767 1.90708 29.5052 3.3946C29.1901 3.64252 29.0278 4.04301 29.0278 4.44349V40.4301C29.0278 41.5171 30.145 42.2704 31.1667 41.9081Z" fill="url(#paint0_linear_1_19)"/>
                    <defs>
                        <linearGradient id="paint0_linear_1_19" x1="0" y1="21" x2="55" y2="21" gradientUnits="userSpaceOnUse">
                            <stop stop-color="#F97316"/>
                            <stop offset="1" stop-color="#DC2626"/>
                        </linearGradient>
                    </defs>
                </svg>
            </div>
            <div class="bg-clip-text text-transparent text-2xl font-medium bg-gradient-to-r from-primary to-secondary">Estou vasculhando os antigos livros de receita da vovó.</div>
            <div class="fixed-bottom"><button class="btn btn-primary w-full text-lg loading" disabled>Aguarde...</button></div>
        </div>

        <!-- // Passo 3 - resultado -->
        <div v-if="step === 2 || step === 3" class="h-full flex flex-col items-center justify-center gap-6 text-center">
            <div>
                <svg width="36" height="42" viewBox="0 0 36 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M33.4286 0C32.1429 0 23.1429 2.625 23.1429 14.4375V23.625C23.1429 26.5207 25.4491 28.875 28.2857 28.875H30.8571V39.375C30.8571 40.827 32.0062 42 33.4286 42C34.8509 42 36 40.827 36 39.375V2.625C36 1.17305 34.8509 0 33.4286 0ZM5.14286 1.3125C5.14286 0.639844 4.65268 0.0820312 3.99375 0.00820313C3.33482 -0.065625 2.74821 0.377344 2.60357 1.02539L0.16875 12.2063C0.05625 12.723 0 13.248 0 13.773C0 17.5383 2.82054 20.6309 6.42857 20.9672V39.375C6.42857 40.827 7.57768 42 9 42C10.4223 42 11.5714 40.827 11.5714 39.375V20.9672C15.1795 20.6309 18 17.5383 18 13.773C18 13.248 17.9437 12.723 17.8312 12.2063L15.3964 1.02539C15.2518 0.369141 14.6491 -0.065625 13.9982 0.00820313C13.3473 0.0820312 12.8571 0.639844 12.8571 1.3125V12.3211C12.8571 12.7641 12.5036 13.125 12.0696 13.125C11.6598 13.125 11.3223 12.8051 11.2821 12.3867L10.2777 1.19766C10.2214 0.516797 9.66696 0 9 0C8.33304 0 7.77857 0.516797 7.72232 1.19766L6.72589 12.3867C6.68571 12.8051 6.34821 13.125 5.93839 13.125C5.50446 13.125 5.15089 12.7641 5.15089 12.3211V1.3125H5.14286ZM9.02411 13.7812H8.97589L9 13.7238L9.02411 13.7812Z" fill="url(#paint0_linear_1_30)"/>
                    <defs>
                        <linearGradient id="paint0_linear_1_30" x1="0" y1="21" x2="36" y2="21" gradientUnits="userSpaceOnUse">
                            <stop stop-color="#F97316"/>
                            <stop offset="1" stop-color="#DC2626"/>
                        </linearGradient>
                    </defs>
                </svg>
            </div>
            <div class="bg-clip-text text-transparent text-2xl font-medium bg-gradient-to-r from-primary to-secondary">Hoje seu jantar vai ser...</div>
            <div><img :src="`https://source.unsplash.com/random/?${tonightDinner}`" class="aspect-square rounded-lg object-cover w-full md:w-1/2 lg:w-1/3 mx-auto" /></div>
            <div class="bg-clip-text text-transparent text-3xl lg:text-4xl font-medium bg-gradient-to-l from-primary to-secondary">...{{ tonightDinner }}</div>
            <div class="flex flex-col items-center gap-2 mt-8" v-if="step === 2">
                <!-- <button @click="perfect" class="btn btn-success text-3xl">Perfeito!</button> -->
                <button @click="getDinner" class="btn btn-primary text-base">Não gosto. Quero outra coisa.</button>
            </div>
            <!-- <div class="flex flex-col items-center gap-2 mt-8" v-if="step === 3">
                <button class="btn btn-primary text-base">Quero a receita</button>
                <button class="btn btn-primary text-base">Salvar nos favoritos</button>
                <button class="btn btn-primary text-base">Compartilhar</button>
            </div> -->
        </div>
    </div>
</template>

<style lang="scss">
.btn {
    @apply font-medium;
    @apply px-12;
    @apply py-5;
    @apply rounded-lg;
    @apply shadow-sm;
    @apply transition-all;
    @apply ease-in-out;
    &:hover {
        @apply px-14;
        @apply shadow-lg;
    }
    &[disabled]:hover {
        @apply px-12;
        @apply shadow-sm;
    }
    &.loading {
        animation: loadingButtonAnimation 1s ease-in-out alternate infinite;
    }
}

.btn-primary {
    @apply bg-gradient-to-r;
    @apply from-secondary;
    @apply to-primary;
    @apply text-white;
}

.btn-success {
    @apply bg-gradient-to-r;
    @apply from-[#22C55E];
    @apply to-[#115E59];
    @apply text-white;
}

@keyframes loadingButtonAnimation {
    from {
        @apply opacity-30;
    }
    to {
        @apply opacity-75;
    }
}
</style>