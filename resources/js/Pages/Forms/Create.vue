<template>
    <app-layout title="New Form">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                New Form
            </h2>
        </template>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-5">
            <div class="bg-white rounded-lg shadow p-5">
                <!--
  This example requires Tailwind CSS v2.0+

  This example requires some changes to your config:

  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/forms'),
    ],
  }
  ```
-->
                <form class="space-y-8 divide-y divide-gray-200">
                    <div class="space-y-8 divide-y divide-gray-200">
                        <div>
                            <div>
                                <h3
                                    class="
                                        text-lg
                                        leading-6
                                        font-medium
                                        text-gray-900
                                    "
                                >
                                    Form information
                                </h3>
                                <p class="mt-1 text-sm text-gray-500">
                                    lets start by the title and description of
                                    the form
                                </p>
                            </div>

                            <div
                                class="
                                    mt-6
                                    grid grid-cols-1
                                    gap-y-6 gap-x-4
                                    sm:grid-cols-6
                                "
                            >
                                <div class="sm:col-span-4">
                                    <label
                                        for="username"
                                        class="
                                            block
                                            text-sm
                                            font-medium
                                            text-gray-700
                                        "
                                    >
                                        Title
                                    </label>
                                    <div class="mt-1 flex rounded-md shadow-sm">
                                        <input
                                            type="text"
                                            v-model="form.title"
                                            id="username"
                                            class="
                                                flex-1
                                                focus:ring-indigo-500
                                                focus:border-indigo-500
                                                block
                                                w-full
                                                min-w-0
                                                rounded-none rounded-r-md
                                                sm:text-sm
                                                border-gray-300
                                            "
                                        />
                                    </div>
                                </div>

                                <div class="sm:col-span-6">
                                    <label
                                        for="about"
                                        class="
                                            block
                                            text-sm
                                            font-medium
                                            text-gray-700
                                        "
                                    >
                                        Description
                                    </label>
                                    <div class="mt-1">
                                        <textarea
                                            id="about"
                                            v-model="form.description"
                                            rows="3"
                                            class="
                                                shadow-sm
                                                focus:ring-indigo-500
                                                focus:border-indigo-500
                                                block
                                                w-full
                                                sm:text-sm
                                                border border-gray-300
                                                rounded-md
                                            "
                                        ></textarea>
                                    </div>
                                    <p class="mt-2 text-sm text-gray-500">
                                        Write a few sentences that explains the
                                        purpose of the form.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="pt-8">
                            <div>
                                <h3
                                    class="
                                        text-lg
                                        leading-6
                                        font-medium
                                        text-gray-900
                                    "
                                >
                                    Questions
                                </h3>
                                <p class="mt-1 text-sm text-gray-500">
                                    List all your questions
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-6 gap-4">
                        <div class="col-span-5 py-4 divide-y-2">
                            <div
                                class="py-5"
                                v-for="(question, index) in form.questions"
                                :key="index"
                            >
                                <div>
                                    <div class="flex">
                                        <h1 class="py-2">
                                        Question {{ index + 1 }}
                                    </h1>
                                    <span
                                        class="
                                            inline-flex
                                            items-center
                                            px-2.5
                                            rounded-full
                                            text-xs
                                            font-medium
                                            bg-indigo-100
                                            text-indigo-800
                                            mx-3
                                        "
                                    >
                                        {{ question.type }}
                                    </span>
                                    </div>
                                    <div class="sm:col-span-4">
                                        <label
                                            for="username"
                                            class="
                                                block
                                                text-sm
                                                font-medium
                                                text-gray-700
                                            "
                                        >
                                            Question Text
                                        </label>
                                        <div
                                            class="
                                                mt-1
                                                flex
                                                rounded-md
                                                shadow-sm
                                            "
                                        >
                                            <input
                                                type="text"
                                                v-model="question.text"
                                                id="username"
                                                class="
                                                    flex-1
                                                    focus:ring-indigo-500
                                                    focus:border-indigo-500
                                                    block
                                                    w-full
                                                    min-w-0
                                                    rounded-none rounded-r-md
                                                    sm:text-sm
                                                    border-gray-300
                                                "
                                            />
                                        </div>
                                    </div>
                                    <div
                                        class="my-3"
                                        v-if="
                                            question.type === 'multiple' ||
                                            question.type === 'checkbox'
                                        "
                                    >
                                        <!--
  This example requires Tailwind CSS v2.0+ 
  
  This example requires some changes to your config:
  
  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/forms'),
    ],
  }
  ```
-->
                                        <fieldset class="space-y-5">
                                            <div
                                                v-for="(
                                                    potentialAnswer, index
                                                ) in question.answers"
                                                :key="index"
                                                class="
                                                    relative
                                                    flex
                                                    items-start
                                                "
                                            >
                                                <div
                                                    class="
                                                        flex
                                                        items-center
                                                        h-5
                                                    "
                                                >
                                                    <input
                                                        id="comments"
                                                        aria-describedby="comments-description"
                                                        name="comments"
                                                        type="checkbox"
                                                        class="
                                                            focus:ring-indigo-500
                                                            h-4
                                                            w-4
                                                            text-indigo-600
                                                            border-gray-300
                                                            rounded
                                                        "
                                                    />
                                                </div>
                                                <div class="ml-3 text-sm">
                                                    <input
                                                        type="text"
                                                        v-model="
                                                            potentialAnswer.text
                                                        "
                                                        placeholder="Write your answer"
                                                        class="
                                                            placeholder-gray-900
                                                            border-none
                                                            focus:ring-0
                                                            text-sm
                                                            text-gray-800
                                                        "
                                                    />
                                                    <p
                                                        id="comments-description"
                                                        class="text-gray-500"
                                                    >
                                                        Add a possible answer to
                                                        your question
                                                    </p>
                                                </div>
                                            </div>
                                        </fieldset>

                                        <button
                                            class="
                                                bg-none
                                                text-indigo-500 text-center
                                            "
                                            type="button"
                                            @click="
                                                addPotentialAnswer(question)
                                            "
                                        >
                                            Add Potential Answer
                                        </button>
                                    </div>
                                    <div class="sm:col-span-6 mt-3">
                                        <label
                                            for="about"
                                            class="
                                                block
                                                text-sm
                                                font-medium
                                                text-gray-700
                                            "
                                        >
                                            Description
                                        </label>
                                        <div class="mt-1">
                                            <textarea
                                                id="about"
                                                v-model="question.description"
                                                rows="3"
                                                class="
                                                    shadow-sm
                                                    focus:ring-indigo-500
                                                    focus:border-indigo-500
                                                    block
                                                    w-full
                                                    sm:text-sm
                                                    border border-gray-300
                                                    rounded-md
                                                "
                                            ></textarea>
                                        </div>
                                        <p
                                            class="mt-2 text-sm text-gray-500"
                                        ></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-1">
                            <div
                                class="bg-white shadow rounded-md sticky top-5"
                            >
                                <h1
                                    class="
                                        text-center
                                        py-2
                                        border-b border-gray-300
                                        hidden
                                        md:block
                                    "
                                >
                                    add a question
                                </h1>
                                <div
                                    class="
                                        grid grid-cols-1
                                        md:grid-cols-2
                                        gap-0
                                    "
                                >
                                    <div
                                        class="
                                            text-center
                                            border-b border-gray-300
                                        "
                                    >
                                        <button
                                            type="button"
                                            class="py-2 w-auto"
                                            @click="newQuestion('short')"
                                        >
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="h-6 w-6"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke="currentColor"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"
                                                />
                                            </svg>
                                        </button>
                                    </div>
                                    <div
                                        class="
                                            text-center
                                            border-l border-gray-300
                                        "
                                    >
                                        <button
                                            type="button"
                                            class="py-2 w-auto"
                                            @click="newQuestion('long')"
                                        >
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="h-6 w-6"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke="currentColor"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"
                                                />
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="text-center border-gray-300">
                                        <button
                                            type="button"
                                            class="py-2 w-auto"
                                            @click="newQuestion('multiple')"
                                        >
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="h-6 w-6"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke="currentColor"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"
                                                />
                                            </svg>
                                        </button>
                                    </div>
                                    <div
                                        class="
                                            text-center
                                            border-b
                                            border-t
                                            border-l
                                            border-gray-300
                                        "
                                    >
                                        <button
                                            type="button"
                                            class="py-2 w-auto"
                                            @click="newQuestion('checkbox')"
                                        >
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="h-6 w-6"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke="currentColor"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                                                />
                                            </svg>
                                        </button>
                                    </div>
                                    <div
                                        class="
                                            text-center
                                            border-t border-gray-300
                                        "
                                    >
                                        <button
                                            type="button"
                                            class="py-2 w-auto"
                                            @click="newQuestion('date')"
                                        >
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="h-6 w-6"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke="currentColor"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"
                                                />
                                            </svg>
                                        </button>
                                    </div>
                                    <div
                                        class="
                                            text-center
                                            border-l border-gray-300
                                        "
                                    >
                                        <button
                                            type="button"
                                            class="py-2 w-auto"
                                            @click="newQuesion('file')"
                                        >
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="h-6 w-6"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke="currentColor"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"
                                                />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pt-5">
                        <div class="flex justify-end">
                            <button
                                type="button"
                                class="
                                    bg-white
                                    py-2
                                    px-4
                                    border border-gray-300
                                    rounded-md
                                    shadow-sm
                                    text-sm
                                    font-medium
                                    text-gray-700
                                    hover:bg-gray-50
                                    focus:outline-none
                                    focus:ring-2
                                    focus:ring-offset-2
                                    focus:ring-indigo-500
                                "
                            >
                                Cancel
                            </button>
                            <button
                                type="button"
                                class="
                                    ml-3
                                    inline-flex
                                    justify-center
                                    py-2
                                    px-4
                                    border border-transparent
                                    shadow-sm
                                    text-sm
                                    font-medium
                                    rounded-md
                                    text-white
                                    bg-indigo-600
                                    hover:bg-indigo-700
                                    focus:outline-none
                                    focus:ring-2
                                    focus:ring-offset-2
                                    focus:ring-indigo-500
                                "
                                @click="submitForm"
                            >
                                Save
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </app-layout>
</template>

<script>
import { defineComponent } from "vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import { useForm } from "@inertiajs/inertia-vue3";

export default defineComponent({
    components: {
        AppLayout,
    },
    data() {
        return {
            form: useForm({
                title: "",
                description: "",
                questions: [
                    {
                        text: "",
                        description: "",
                        type: "short",
                        conditions: [],
                        required: false,
                        answers: [],
                    },
                ],
            }),
        };
    },
    methods: {
        newQuestion: function (qType) {
            this.form.questions.push({
                text: "",
                description: "",
                type: qType,
                conditions: [],
                required: false,
                answers:
                    qType === "multiple" || qType === "checkbox"
                        ? [{ text: "", description: "" }]
                        : null,
            });
        },
        addPotentialAnswer: function (question) {
            question.answers.push({ text: "", description: "" });
        },
        validateForm: function()
        {
            return true;
        },
        submitForm: function(){
            if(this.validateForm())
                this.form.post(route('forms.store'));
        }
    }
});
</script>

<style></style>
