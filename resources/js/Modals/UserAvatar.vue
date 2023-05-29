<script setup>

import { ref } from 'vue';
import { router, useForm } from '@inertiajs/vue3';
import PageModal from "@/Components/Modal/PageModal.vue";
import InputError from '@/Components/Form/InputError.vue';
import SecondaryButton from '@/Components/Button/SecondaryButton.vue';
import Submit from '@/Components/Form/Submit.vue';

const props = defineProps({
    user: Object,
});

const form = useForm({
    _method: 'PUT',
    photo: null,
});


const photoPreview = ref(null);
const photoInput = ref(null);

const updatePhoto = () => {
    if (photoInput.value) {
        form.photo = photoInput.value.files[0];
    }

    form.post(route('user.avatar.update'), {
        errorBag: 'updatePhoto',
        preserveScroll: true,
        onSuccess: () => clearPhotoFileInput(),
    });
};

const selectNewPhoto = () => {
    photoInput.value.click();
};

const updatePhotoPreview = () => {
    const photo = photoInput.value.files[0];

    if (! photo) return;

    const reader = new FileReader();

    reader.onload = (e) => {
        photoPreview.value = e.target.result;
    };

    reader.readAsDataURL(photo);
};

const clearPhotoFileInput = () => {
    if (photoInput.value?.value) {
        photoInput.value.value = null;
    }
};

</script>

<template>
    <PageModal>

        <form @submit.prevent="updatePhoto">

            <div class="grid place-items-center">
                <!-- Profile Photo File Input -->
                <input ref="photoInput" type="file" class="hidden" @change="updatePhotoPreview">

                <!-- Current Profile Photo -->
                <div v-show="! photoPreview" class="mt-2">
                    <img :src="user.profile_photo_url" :alt="user.name" class="rounded-full w-32 h-32 object-cover">
                </div>

                <!-- New Profile Photo Preview -->
                <div v-show="photoPreview" class="mt-2">
                    <span class="block rounded-full w-32 h-32 bg-cover bg-no-repeat bg-center" :style="'background-image: url(\'' + photoPreview + '\');'"/>
                </div>

                <SecondaryButton class="mt-4" type="button" @click.prevent="selectNewPhoto">
                    Select A New Photo
                </SecondaryButton>

                <InputError :message="form.errors.photo" class="mt-2" />

                <div class="mt-8">
                    <Submit :form="form" />
                </div>
            </div>


        </form>

    </PageModal>
</template>


