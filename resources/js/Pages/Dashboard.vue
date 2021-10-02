<template>
    <app-layout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-5">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <form-index :forms="forms" :responses="responses" :users="users"/>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import { defineComponent } from 'vue'
    import AppLayout from '@/Layouts/AppLayout.vue'
    import FormIndex from '@/Pages/Forms/Index.vue'
    export default defineComponent({
        props:['forms','responses',"users"],
        components: {
            AppLayout,
            FormIndex
        },
    })
</script>
