<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
const apps = [
    {
        name: "Organization",
        link: "http://localhost:8001/auth/login",
    },
    {
        name: "LUMIS",
        link: "https://lumis.luanar.ac.mw",
    },
    {
        name: "SARIS",
        link: "https://luanar.ac.mw/auth/login.php",
    },

];
</script>

<template>
    <AppLayout title="Apps">
        <template #header>
            <h2 class="text-xl text-gray-800 leading-tight">
                Apps and Resources
            </h2>
        </template>
        <div class="py-4">
            <div class="max-w-7xl mx-auto ">

                <div class="bg-white overflow-hidden sm:rounded-lg min-h-screen ">

                    <div class="lg:mx-20 sm:mx-auto p-4 ">

                        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-4">
                            <template v-for="app in apps">
                                <a :href="app.link" target="_blank" class="block flex flex-wrap gap-4 items-center max-w-sm p-8 bg-white border-b border-gray-300 hover:bg-gray-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-auto h-10">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z" />
                                    </svg>

                                    <p class="text-2xl tracking-tight text-gray-900">
                                        {{app.name}}
                                    </p>
                                </a>
                            </template>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
