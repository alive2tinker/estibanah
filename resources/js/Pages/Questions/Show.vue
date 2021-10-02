<template>
    <app-layout :title="`Question ${question.data.text}`">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ `Question ${question.data.text}` }}
            </h2>
        </template>
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-8 lg:px-8">
            <!-- This example requires Tailwind CSS v2.0+ -->
            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                <div class="flex justify-between">
                    <div class="px-4 py-5 sm:px-6">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                            {{ question.data.text }}
                        </h3>
                        <p class="mt-1 max-w-2xl text-sm text-gray-500">
                            {{ question.data.description }}
                        </p>
                    </div>
                    <div>
                        <div
                            v-if="
                                question.data.type === 'multiple' ||
                                question.data.type === 'checkbox'
                            "
                        >
                            <chart-line class="min-w-64 min-h-64 p-3" :title="question.data.text" :labels="getLables()" :data="getData()"></chart-line>
                        </div>
                        <div class="p-4" v-else>
                            <h1 class="text-2xl font-bold">
                                {{ question.data.responses.length }}
                            </h1>
                        </div>
                    </div>
                </div>
                <div class="border-t border-gray-200 px-4 py-5 sm:p-0">
                    <ul
                        role="list"
                        class="divide-y divide-gray-200 list-decimal"
                    >
                        <li
                            v-for="(response, index) in question.data.responses"
                            :key="index"
                            class="
                                relative
                                bg-white
                                py-5
                                px-4
                                hover:bg-gray-50
                                focus-within:ring-2
                                focus-within:ring-inset
                                focus-within:ring-indigo-600
                            "
                        >
                            <div class="flex justify-between space-x-3">
                                <div class="min-w-0 flex-1">
                                    <div class="block focus:outline-none">
                                        <span
                                            class="absolute inset-0"
                                            aria-hidden="true"
                                        ></span>
                                        <p
                                            class="
                                                text-sm
                                                font-medium
                                                text-gray-900
                                                truncate
                                            "
                                        >
                                            {{ response.value }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <!-- More messages... -->
                    </ul>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import { defineComponent } from "vue";
import AppLayout from "../../Layouts/AppLayout.vue";
import ChartLine from '../../components/ChartLine.vue'

export default defineComponent({
    props: {
        question: Object,
    },
    components: {
        AppLayout,
        ChartLine
    },
    mounted() {
        //
    },
    methods: {
        getLables: function()
        {
            return Array.from(new Set(this.question.data.responses.map((x) => x.value)))
        },
        getData: function()
        {
            var labels = this.getLables();
            var data = [];
            labels.forEach((label) => {
                data.push(this.question.data.responses.filter((r) => r.value === label).length);
            });

            console.log(data);

            return data;
        }
    }
});
</script>

<style></style>
AppLayout
