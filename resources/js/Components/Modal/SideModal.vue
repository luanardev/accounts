<script setup>
import { useModal } from "momentum-modal"
import Sidebar from 'primevue/sidebar';

const { show} = useModal()
</script>

<template>
    <Sidebar v-model:visible="show" position="right">
        <slot />
    </Sidebar>
</template>
