<script>
import {usePage} from "@inertiajs/vue3";

export default {

    data(){
        return{
            toast: usePage().props.flash,
            visible:false,
            timeout: null
        }
    },
    watch: {
        toast: {
            handler() {
                if(this.isSuccess || this.isError){
                    this.visible = true;
                }
                if(this.timeout){
                    clearTimeout(this.timeout);
                }
                this.timeout = setTimeout(() => this.visible=false, 3000);
            },
            immediate: true
        }
    },
    computed: {
        isSuccess(){
            return this.toast.success != null;
        },
        isError(){
            return this.toast.error != null;
        },
        message(){
            if(this.toast.success != null){
                return this.toast.success;
            }
            else if(this.toast.error != null ){
                return this.toast.error;
            }
        }

    }
}

</script>

<template>
    <Transition name="fade">
        <div v-if="toast && visible" :class="{'bg-green-500': isSuccess, 'bg-red-500' : isError}"
             class="absolute flex items-center sm:max-w-xs w-full mt-2 mr-2 top-0 right-0 p-2 rounded shadow" role="alert">
            <div class="mr-2">
                <svg
                    class="w-8 h-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <div class="flex-1 text-white font-normal">
                {{message}}
            </div>
            <div class="mr-2">
                <button @click="visible=!visible" class="text-white rounded-lg focus:ring-2 p-1.5 hover:ring-2 inline-flex h-8 w-8" >
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
            </div>
        </div>
    </Transition>
</template>


<style scoped>
.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.5s ease;
}

.fade-enter-from,
.fade-leave-to {
    opacity: 0;
}
</style>
