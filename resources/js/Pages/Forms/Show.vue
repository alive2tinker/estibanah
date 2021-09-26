<template>
    <app-layout :title="form.data.title">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ form.data.title }}
            </h2>
        </template>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-5">
            <!-- This example requires Tailwind CSS v2.0+ -->
            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                <div class="px-4 py-5 sm:px-6">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        Form Description
                    </h3>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">
                        {{ form.data.description }}
                    </p>
                    
                </div>
                <div class="px-4 py-5 sm:px-6">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        Questions
                    </h3>
                </div>
                <div class="border-t border-gray-200 px-4 py-5 sm:p-0">
                    <dl class="sm:divide-y sm:divide-gray-200">
                        <div
                            v-for="(question, index) in form.data.questions"
                            :key="index"
                            class="
                                py-4
                                sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6
                            "
                        >
                            <dt class="text-sm font-medium text-gray-500">
                                Question {{ index + 1 }}
                            </dt>
                            <dd
                                class="
                                    mt-1
                                    text-sm text-gray-900
                                    sm:mt-0 sm:col-span-2
                                "
                            >
                                <a
                                    :href="route('questions.show', question.id)"
                                    >{{ question.text }}</a
                                >
                                <span
                                    class="
                                        inline-block
                                        items-center
                                        px-2.5
                                        py-0.5
                                        rounded-full
                                        text-xs
                                        font-medium
                                        bg-gray-100
                                        text-gray-800
                                    "
                                >
                                    {{ question.type }}
                                </span>
                            </dd>
                            <dd
                                class="
                                    mt-1
                                    text-sm text-gray-900
                                    sm:mt-0 sm:col-span-2
                                "
                            >
                                Replies: {{ question.replies }}
                            </dd>
                        </div>
                    </dl>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import { defineComponent } from "vue";
import AppLayout from "../../Layouts/AppLayout.vue";

export default defineComponent({
    components: { AppLayout },
    props: ["form"],
});
</script>

<style></style>
