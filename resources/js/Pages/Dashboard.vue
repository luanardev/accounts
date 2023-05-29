<script setup>
import {Link} from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import UserAvatar from '@/Components/Avatar/UserAvatar.vue';
</script>

<template>
    <AppLayout title="Dashboard">

        <div class="py-4">
            <div class="max-w-7xl mx-auto">
                <div class="bg-white overflow-hidden sm:rounded-lg">

                    <div class="lg:mx-20 sm:mx-auto p-4">

                        <div class="flex mt-4" >
                            <div class="w-full">
                                <div class="grid place-items-center">
                                    <UserAvatar class="block" />
                                    <h1 class="mt-2 text-2xl font-medium text-gray-900">
                                        Welcome, {{$page.props.auth.user.name}}
                                    </h1>
                                </div>

                                <p class="mt-8 text-base text-gray-600 sm:text-lg dark:text-gray-400">
                                    Luanar Account helps you to access Apps and Resources with single sign on. Save time by automatically signing in to all apps using information saved in your account.
                                    Manage your info, privacy and security to make Luanar Apps work better for you.
                                </p>
                            </div>
                        </div>

                        <div class="grid lg:grid-cols-2 gap-2 mt-8">

                            <div class="w-full p-4 text-center bg-white border  rounded-lg sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                                <h5 class="mb-2 text-xl font-semibold text-gray-800 dark:text-white">Apps and Resources</h5>
                                <p class="mb-4 text-base text-gray-500 sm:text-lg dark:text-gray-400">
                                    Access Luanar Apps and Resources anytime and anywhere in the world.
                                </p>
                                <Link :href="route('apps')" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    View Apps
                                    <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                </Link>
                            </div>

                            <div class="w-full p-4 text-center bg-white border rounded-lg sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                                <h5 class="mb-2 text-xl font-semibold text-gray-800 dark:text-white">Manage Profile</h5>
                                <p class="mb-4 text-base text-gray-500 sm:text-lg dark:text-gray-400">
                                    Manage your profile, two factor authentication and browser sessions
                                </p>
                                <Link :href="route('profile.show')" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    Manage Profile
                                    <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                </Link>
                            </div>

                            <div class="w-full p-4 text-center bg-white border rounded-lg sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                                <h5 class="mb-2 text-xl font-semibold text-gray-800 dark:text-white">Help Options</h5>
                                <p class="mb-4 text-base text-gray-500 sm:text-lg dark:text-gray-400">
                                   Are you facing problems while accessing Apps? Visit our Help Resources to help you solve that problem.
                                </p>
                                <Link class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    Let us Help You
                                    <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                </Link>
                            </div>

                            <div class="w-full p-4 text-center bg-white border rounded-lg sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                                <h5 class="mb-2 text-xl font-semibold text-gray-800 dark:text-white">Send Feedback</h5>
                                <p class="mb-4 text-base text-gray-500 sm:text-lg dark:text-gray-400">
                                    You can report an issue or send your suggestions on how to improve our services.
                                </p>
                                <Link  class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    Send Feedback
                                    <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                </Link>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>

    </AppLayout>
</template>
