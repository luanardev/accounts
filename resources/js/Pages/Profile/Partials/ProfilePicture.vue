<script setup>
    const props = defineProps({
        user:Object,
    });

</script>

<template>
    <div class="mt-2">
        <img :src="user.profile_photo_url" :alt="user.name" class="rounded-full h-20 w-20 object-cover">
    </div>
</template>
