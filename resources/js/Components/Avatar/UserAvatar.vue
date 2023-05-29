<script setup>
import {router} from "@inertiajs/vue3";
import Button from "primevue/button";
</script>

<template>
    <Button @click="router.get(route('user.avatar.change'))" link>
        <img  class="h-28 w-28 rounded-full object-cover " :src="$page.props.auth.user.profile_photo_url" :alt="$page.props.auth.user.name">
    </Button>
</template>
