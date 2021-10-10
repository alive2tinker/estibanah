<template>
    <guest-app-layout :title="form.data.title">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ form.data.title }}
            </h2>
        </template>
        <!-- This example requires Tailwind CSS v2.0+ -->
        <div v-if="formSuccess" class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <!--
                  Background overlay, show/hide based on modal state.

                  Entering: "ease-out duration-300"
                    From: "opacity-0"
                    To: "opacity-100"
                  Leaving: "ease-in duration-200"
                    From: "opacity-100"
                    To: "opacity-0"
                -->
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

                <!-- This element is to trick the browser into centering the modal contents. -->
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

                <!--
                  Modal panel, show/hide based on modal state.

                  Entering: "ease-out duration-300"
                    From: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    To: "opacity-100 translate-y-0 sm:scale-100"
                  Leaving: "ease-in duration-200"
                    From: "opacity-100 translate-y-0 sm:scale-100"
                    To: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                -->
                <div class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-sm sm:w-full sm:p-6">
                    <div>
                        <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-green-100">
                            <!-- Heroicon name: outline/check -->
                            <svg class="h-6 w-6 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                        <div class="mt-3 text-center sm:mt-5">
                            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                {{ $t('form submitted successfully') }}
                            </h3>
                            <div class="mt-2">
                                <p class="text-sm text-gray-500">
                                    {{ $t('you can close this page now') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-8 my-5 lg:px-4">
            <!-- This example requires Tailwind CSS v2.0+ -->
            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                <div class="px-4 py-5 sm:px-6">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        {{ $t('Description')}}
                    </h3>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">
                        {{ form.data.description }}
                    </p>
                </div>
                <div class="border-t border-gray-200 px-4 py-5 sm:p-0">
                    <ul role="list" class="divide-y divide-gray-200">
                        <li
                            v-for="(response, index) in responseForm.responses"
                            v-show="shouldBeShown(response.question.show)"
                            :key="index"
                            class="relative bg-white py-5 px-4"
                        >
                            <div>
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
                                <div v-if="response.question.type === 'short'">
                                    <label
                                        for="email"
                                        class="
                                            block
                                            text-sm
                                            font-medium
                                            text-gray-700
                                        "
                                        >{{ response.question.text }}</label
                                    >
                                    <div class="mt-1">
                                        <input
                                            type="text"
                                            v-model="response.value"
                                            id="email"
                                            :class="{'shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md':true, 'border border-red-600': errors['responses.'+index+'.value']}
                                            "
                                        />
                                    </div>
                                </div>
                                <div v-if="response.question.type === 'long'">
                                    <div class="sm:col-span-6">
                                        <label
                                            for="about"
                                            :class="{'block text-sm font-medium text-gray-700':true}
                                            "
                                        >
                                            {{ response.question.text }}
                                        </label>
                                        <div class="mt-1">
                                            <textarea
                                                id="about"
                                                v-model="response.value"
                                                rows="3"
                                                :class="{'shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border border-gray-300 rounded-md':true, 'border border-red-600': errors['responses.'+index+'.value']}
                                                "
                                            ></textarea>
                                        </div>
                                        <p class="mt-2 text-sm text-gray-500">
                                            {{ response.question.description }}
                                        </p>
                                    </div>
                                </div>
                                <div v-if="response.question.type === 'multiple'">
                                    <label
                                        for="email"
                                        class="
                                            block
                                            text-sm
                                            font-medium
                                            text-gray-700
                                        "
                                        >{{ response.question.text }}</label
                                    >
                                    <fieldset class="my-5">
                                        <legend class="sr-only">
                                            {{ response.question.text }}
                                        </legend>
                                        <div
                                            v-for="(
                                                answer, index
                                            ) in response.question.answers"
                                            :key="index"
                                            class="
                                                bg-white
                                                rounded-md
                                                -space-y-px
                                            "
                                        >
                                            <!-- Checked: "bg-indigo-50 border-indigo-200 z-10", Not Checked: "border-gray-200" -->
                                            <label
                                                class="
                                                    rounded-tl-md rounded-tr-md
                                                    relative
                                                    border
                                                    p-4
                                                    flex
                                                    cursor-pointer
                                                    focus:outline-none
                                                "
                                            >
                                                <input
                                                    type="radio"
                                                    v-model="response.value"
                                                    :value="answer.text"
                                                    class="
                                                        h-4
                                                        w-4
                                                        mt-0.5
                                                        cursor-pointer
                                                        text-indigo-600
                                                        border-gray-300
                                                        focus:ring-indigo-500
                                                    "
                                                    aria-labelledby="privacy-setting-0-label"
                                                    aria-describedby="privacy-setting-0-description"
                                                />
                                                <div class="ml-3 flex flex-col">
                                                    <!-- Checked: "text-indigo-900", Not Checked: "text-gray-900" -->
                                                    <span
                                                        id="privacy-setting-0-label"
                                                        class="
                                                            block
                                                            text-sm
                                                            font-medium
                                                        "
                                                    >
                                                        {{ answer.text }}
                                                    </span>
                                                    <span
                                                        id="privacy-setting-0-description"
                                                        class="block text-sm"
                                                    >
                                                        {{ answer.description }}
                                                    </span>
                                                </div>
                                            </label>
                                        </div>
                                    </fieldset>
                                </div>
                                <div v-if="response.question.type === 'checkbox'">
                                    <label
                                        for="email"
                                        class="
                                            block
                                            text-sm
                                            font-medium
                                            text-gray-700
                                        "
                                        >{{ response.question.text }}</label
                                    >
                                    <fieldset class="space-y-5 my-5">
                                        <div
                                            v-for="(
                                                answer, index
                                            ) in response.question.answers"
                                            :key="index"
                                            class="relative flex items-start"
                                        >
                                            <div class="flex items-center h-5">
                                                <input
                                                    id="comments"
                                                    aria-describedby="comments-description"
                                                    v-model="response.value"
                                                    :value="answer.text"
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
                                                <label
                                                    for="comments"
                                                    class="
                                                        font-medium
                                                        text-gray-700
                                                    "
                                                    >{{ answer.text }}</label
                                                >
                                                <p
                                                    id="comments-description"
                                                    class="text-gray-500"
                                                >
                                                    Get notified when someones
                                                    posts a comment on a
                                                    posting.
                                                </p>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                                <div v-if="response.question.type === 'file'">
                                    <div class="sm:col-span-6" >
                                        <label
                                            for="cover-photo"
                                            class="
                                                block
                                                text-sm
                                                font-medium
                                                text-gray-700
                                            "
                                        >
                                            {{ response.question.text }}
                                        </label>
                                        <div
                                            class="
                                                mt-1
                                                flex
                                                justify-center
                                                px-6
                                                pt-5
                                                pb-6
                                                border-2
                                                border-gray-300
                                                border-dashed
                                                rounded-md
                                            "
                                        >
                                            <div class="space-y-1 text-center" >
                                                <svg
                                                    class="
                                                        mx-auto
                                                        h-12
                                                        w-12
                                                        text-gray-400
                                                    "
                                                    stroke="currentColor"
                                                    fill="none"
                                                    viewBox="0 0 48 48"
                                                    aria-hidden="true"
                                                >
                                                    <path
                                                        d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                                        stroke-width="2"
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                    />
                                                </svg>
                                                <div
                                                    class="
                                                        flex
                                                        text-sm text-gray-600
                                                    "
                                                >
                                                    <label
                                                        for="file-upload"
                                                        class="
                                                            relative
                                                            cursor-pointer
                                                            bg-white
                                                            rounded-md
                                                            font-medium
                                                            text-indigo-600
                                                            hover:text-indigo-500
                                                            focus-within:outline-none
                                                            focus-within:ring-2
                                                            focus-within:ring-offset-2
                                                            focus-within:ring-indigo-500
                                                        "
                                                    >
                                                        <span
                                                            >Upload a file</span
                                                        >
                                                        <input
                                                            id="file-upload"
                                                            name="file-upload"
                                                            type="file"
                                                            class="sr-only"
                                                            @input="response.value.push($event.target.files[0])"
                                                        />
                                                    </label>
                                                    <p class="pl-1">
                                                        or drag and drop
                                                    </p>
                                                </div>
                                                <p
                                                    class="
                                                        text-xs text-gray-500
                                                    "
                                                >
                                                    PNG, JPG, GIF up to 10MB
                                                </p>
                                            </div>
                                        </div>
                                        <div v-if="response.value.length > 0">
                                            <!-- This example requires Tailwind CSS v2.0+ -->
                                            <div class="rounded-md bg-green-50 p-4">
                                                <div class="flex">
                                                    <div class="flex-shrink-0">
                                                        <!-- Heroicon name: solid/check-circle -->
                                                        <svg class="h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                                        </svg>
                                                    </div>
                                                    <div class="ml-3">
                                                        <h3 class="text-sm font-medium text-green-800">
                                                            File Uploaded
                                                        </h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div v-if="response.question.type === 'date'">
                                    <label
                                        for="email"
                                        class="
                                            block
                                            text-sm
                                            font-medium
                                            text-gray-700
                                        "
                                        >{{ response.question.text }}</label
                                    >
                                    <div class="mt-1">
                                        <input
                                            type="date"
                                            v-model="response.value"
                                            id="email"
                                            :class="{'shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md': true, 'border border-red-600': errors['responses.'+index+'.value']}
                                            "
                                        />
                                    </div>
                                </div>
                            </div>
                        </li>

                        <!-- More messages... -->
                    </ul>
                </div>
                <div class="p-5">
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
                            {{ $t('Cancel')}}
                        </button>
                        <button
                            @click="submitForm"
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
                        >
                            {{ $t('Save')}}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </guest-app-layout>
</template>

<script>
import { useForm } from "@inertiajs/inertia-vue3";
import { defineComponent } from "vue";
import GuestAppLayout from "../../Layouts/GuestAppLayout.vue";

export default defineComponent({
    props: {
        form: Object,
        errors: Object
    },
    components: {
        GuestAppLayout,
    },
    data(){
        return{
            formSuccess: false,
            responseForm: useForm({
                responses: []
            })
        }
    },
    mounted() {
        this.form.data.questions.forEach((q) => {
            if (q.type === "checkbox" || q.type === "file")
                this.responseForm.responses.push({ question: q, value: [] });
            else this.responseForm.responses.push({ question: q, value: "" });
        });
    },
    methods: {
        submitForm: function(){
            this.responseForm.post(route('formResponses.store', this.form.data.id),{
                preserveScroll: true,
                forceFormData: true,
                onSuccess: () => {
                    this.formSuccess = true;
                }
            })
        },
        shouldBeShown: function(statement) {
            if(statement === 'true')
                return true;
            else
                return eval(statement);
        },
        isNotEmpty: function(questionID){
            var response = this.responseForm.responses.find((s) => s.question.id == questionID);
            return response.question.type === 'checkbox' ? response.value.length > 0
                : response.value !== '';
        },
        equals: function(questionID, value)
        {
            var response = this.responseForm.responses.find((s) => s.question.id == questionID);
            if(response.question.type === 'checkbox' || response.question.type === 'multiple'){
                return response.value.length > 0 && response.value.includes(value)
            }else{
                return response.value === value && response.value !== '';
            }
        },
        notEquals: function(questionID, value)
        {
            var response = this.responseForm.responses.find((s) => s.question.id == questionID);
            if(response.question.type === 'checkbox' || response.question.type === 'multiple'){
                return response.value.length > 0 && !response.value.includes(value)
            }else{
                return response.value !== value && response.value !== '';
            }
        },
    }
});
</script>

<style></style>
