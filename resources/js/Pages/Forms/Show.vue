<template>
    <div>
        <!-- This example requires Tailwind CSS v2.0+ -->
        <div
            v-show="deleteModalOpen"
            class="fixed z-10 inset-0 overflow-y-auto"
            aria-labelledby="modal-title"
            role="dialog"
            aria-modal="true"
        >
            <div
                class="
                    flex
                    items-end
                    justify-center
                    min-h-screen
                    pt-4
                    px-4
                    pb-20
                    text-center
                    sm:block sm:p-0
                "
            >
                <!--
      Background overlay, show/hide based on modal state.

      Entering: "ease-out duration-300"
        From: "opacity-0"
        To: "opacity-100"
      Leaving: "ease-in duration-200"
        From: "opacity-100"
        To: "opacity-0"
    -->
                <div
                    class="
                        fixed
                        inset-0
                        bg-gray-500 bg-opacity-75
                        transition-opacity
                    "
                    aria-hidden="true"
                ></div>

                <!-- This element is to trick the browser into centering the modal contents. -->
                <span
                    class="hidden sm:inline-block sm:align-middle sm:h-screen"
                    aria-hidden="true"
                    >&#8203;</span
                >
                <div
                    class="
                        inline-block
                        align-bottom
                        bg-white
                        rounded-lg
                        text-left
                        overflow-hidden
                        shadow-xl
                        transform
                        transition-all
                        sm:my-8 sm:align-middle sm:max-w-lg sm:w-full
                    "
                >
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div
                                class="
                                    mx-auto
                                    flex-shrink-0 flex
                                    items-center
                                    justify-center
                                    h-12
                                    w-12
                                    rounded-full
                                    bg-red-100
                                    sm:mx-0 sm:h-10 sm:w-10
                                "
                            >
                                <!-- Heroicon name: outline/exclamation -->
                                <svg
                                    class="h-6 w-6 text-red-600"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    aria-hidden="true"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"
                                    />
                                </svg>
                            </div>
                            <div
                                class="
                                    mt-3
                                    text-center
                                    sm:mt-0 sm:ml-4 sm:text-left
                                "
                            >
                                <h3
                                    class="
                                        text-lg
                                        leading-6
                                        font-medium
                                        text-gray-900
                                    "
                                    id="modal-title"
                                >
                                    Delete {{ userForm.data.title }}
                                </h3>
                                <div class="mt-2">
                                    <p class="text-sm text-gray-500">
                                        Are you sure you want to deactivate your
                                        account? All of your data will be
                                        permanently removed. This action cannot
                                        be undone.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="
                            bg-gray-50
                            px-4
                            py-3
                            sm:px-6 sm:flex sm:flex-row-reverse
                        "
                    >
                        <button
                            @click="deleteForm()"
                            type="button"
                            class="
                                w-full
                                inline-flex
                                justify-center
                                rounded-md
                                border border-transparent
                                shadow-sm
                                px-4
                                py-2
                                bg-red-600
                                text-base
                                font-medium
                                text-white
                                hover:bg-red-700
                                focus:outline-none
                                focus:ring-2
                                focus:ring-offset-2
                                focus:ring-red-500
                                sm:ml-3 sm:w-auto sm:text-sm
                            "
                        >
                            Delete
                        </button>
                        <button
                            @click="deleteModalOpen = false"
                            type="button"
                            class="
                                mt-3
                                w-full
                                inline-flex
                                justify-center
                                rounded-md
                                border border-gray-300
                                shadow-sm
                                px-4
                                py-2
                                bg-white
                                text-base
                                font-medium
                                text-gray-700
                                hover:bg-gray-50
                                focus:outline-none
                                focus:ring-2
                                focus:ring-offset-2
                                focus:ring-indigo-500
                                sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm
                            "
                        >
                            Cancel
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- This example requires Tailwind CSS v2.0+ -->
        <div
            v-show="shareModalOpen"
            class="fixed z-10 inset-0 overflow-y-auto"
            aria-labelledby="modal-title"
            role="dialog"
            aria-modal="true"
        >
            <div
                class="
                    flex
                    items-end
                    justify-center
                    min-h-screen
                    pt-4
                    px-4
                    pb-20
                    text-center
                    sm:block sm:p-0
                "
            >
                <!--
      Background overlay, show/hide based on modal state.

      Entering: "ease-out duration-300"
        From: "opacity-0"
        To: "opacity-100"
      Leaving: "ease-in duration-200"
        From: "opacity-100"
        To: "opacity-0"
    -->
                <div
                    class="
                        fixed
                        inset-0
                        bg-gray-500 bg-opacity-75
                        transition-opacity
                    "
                    aria-hidden="true"
                ></div>

                <!-- This element is to trick the browser into centering the modal contents. -->
                <span
                    class="hidden sm:inline-block sm:align-middle sm:h-screen"
                    aria-hidden="true"
                    >&#8203;</span
                >

                <!--
      Modal panel, show/hide based on modal state.

      Entering: "ease-out duration-300"
        From: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        To: "opacity-100 translate-y-0 sm:scale-100"
      Leaving: "ease-in duration-200"
        From: "opacity-100 translate-y-0 sm:scale-100"
        To: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
    -->
                <div
                    class="
                        inline-block
                        align-bottom
                        bg-white
                        rounded-lg
                        px-4
                        pt-5
                        pb-4
                        text-left
                        overflow-hidden
                        shadow-xl
                        transform
                        transition-all
                        sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6
                    "
                >
                    <div>
                        <div
                            class="
                                mx-auto
                                flex
                                items-center
                                justify-center
                                h-12
                                w-12
                                rounded-full
                                bg-green-100
                            "
                        >
                            <!-- Heroicon name: outline/check -->
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-6 w-6 text-green-700"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"
                                />
                            </svg>
                        </div>
                        <div class="mt-3 text-center sm:mt-5">
                            <h3
                                class="
                                    text-lg
                                    leading-6
                                    font-medium
                                    text-gray-900
                                "
                                id="modal-title"
                            >
                                Share your estibanah
                            </h3>
                            <div class="mt-2">
                                <div>
                                    <label
                                        for="email"
                                        class="
                                            block
                                            text-sm
                                            font-medium
                                            text-gray-700
                                        "
                                        >Link</label
                                    >
                                    <div class="mt-1">
                                        <div class="grid grid-cols-6 gap-0.5">
                                            <div class="col-span-5">
                                                <input
                                                    type="text"
                                                    id="form-answer-link"
                                                    readonly
                                                    class="
                                                        shadow-sm
                                                        focus:ring-indigo-500
                                                        focus:border-indigo-500
                                                        block
                                                        w-full
                                                        sm:text-sm
                                                        border-gray-300
                                                        rounded-md
                                                    "
                                                    :value="
                                                        route(
                                                            'forms.answer',
                                                            userForm.data.id
                                                        )
                                                    "
                                                />
                                            </div>
                                            <div class="col-span-1">
                                                <button @click="copyLink()">
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
                                                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"
                                                        />
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-2">
                                    <label
                                        for="email"
                                        class="
                                            block
                                            text-sm
                                            font-medium
                                            text-gray-700
                                        "
                                        >Send Invitation to email
                                        addresses</label
                                    >
                                    <!-- This example requires Tailwind CSS v2.0+ -->
                                    <span
                                        :class="{'inline-flex my-4 items-center px-2.5 py-0.5 rounded-full text-xs font-medium': true, 'bg-green-100 text-green-800': validEmailList, 'bg-red-100 text-red-800': !validEmailList}
                                        "
                                    >
                                        {{ validEmailList ? 'Good Syntax' : 'Bad Syntax'}}
                                    </span>
                                    <textarea
                                        v-model="invitationForm.emailList"
                                        class="
                                            max-w-lg
                                            shadow-sm
                                            block
                                            w-full
                                            focus:ring-indigo-500
                                            focus:border-indigo-500
                                            sm:text-sm
                                            border border-gray-300
                                            rounded-md
                                        "
                                        id=""
                                        cols="30"
                                        rows="5"
                                    ></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="
                            mt-5
                            sm:mt-6
                            sm:grid
                            sm:grid-cols-2
                            sm:gap-3
                            sm:grid-flow-row-dense
                        "
                    >
                        <button
                            type="button"
                            class="
                                w-full
                                inline-flex
                                justify-center
                                rounded-md
                                border border-transparent
                                shadow-sm
                                px-4
                                py-2
                                bg-indigo-600
                                text-base
                                font-medium
                                text-white
                                hover:bg-indigo-700
                                focus:outline-none
                                focus:ring-2
                                focus:ring-offset-2
                                focus:ring-indigo-500
                                sm:col-start-2 sm:text-sm
                            "
                            :disabled="!validEmailList"
                            @click="sendInvitations()"
                        >
                            Invite
                        </button>
                        <button
                            type="button"
                            class="
                                mt-3
                                w-full
                                inline-flex
                                justify-center
                                rounded-md
                                border border-gray-300
                                shadow-sm
                                px-4
                                py-2
                                bg-white
                                text-base
                                font-medium
                                text-gray-700
                                hover:bg-gray-50
                                focus:outline-none
                                focus:ring-2
                                focus:ring-offset-2
                                focus:ring-indigo-500
                                sm:mt-0 sm:col-start-1 sm:text-sm
                            "
                            @click="shareModalOpen = false"
                        >
                            Cancel
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <app-layout :title="userForm.data.title">
            <template #header>
                <div class="flex justify-between">
                    <h2
                        class="
                            font-semibold
                            text-xl text-gray-800
                            leading-tight
                        "
                    >
                        {{ userForm.data.title }}
                    </h2>
                    <div class="flex justify-between -mt-3">
                        <SwitchGroup as="div" class="flex items-center">
                            <Switch
                                v-if="$page.props.user.isAdmin"
                                @click="submitForm"
                                v-model="form.published"
                                :class="[
                                    form.published
                                        ? 'bg-indigo-600'
                                        : 'bg-gray-200',
                                    'relative inline-flex flex-shrink-0 h-6 w-11 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500',
                                ]"
                            >
                                <span
                                    aria-hidden="true"
                                    :class="[
                                        form.published
                                            ? 'ltr:translate-x-5 rtl:-translate-x-5'
                                            : 'ltr:translate-x-0 rtl:-translate-x-0',
                                        'pointer-events-none inline-block h-5 w-5 rounded-full bg-white shadow transform ring-0 transition ease-in-out duration-200 ',
                                    ]"
                                />
                            </Switch>
                            <SwitchLabel as="span" class="ml-3">
                                <span
                                    :class="{
                                        'inline-flex items-center mx-2.5 px-2.5 py-0.5 rounded-md text-sm font-medium': true,
                                        'bg-green-100 text-green-800':
                                            form.published,
                                        'bg-red-100 text-red-800':
                                            !form.published,
                                    }"
                                >
                                    <svg
                                        :class="{
                                            '-ml-0.5 mr-1.5 h-2 w-2': true,
                                            'text-green-800': form.published,
                                            'text-red-400': !form.published,
                                        }"
                                        fill="currentColor"
                                        viewBox="0 0 8 8"
                                    >
                                        <circle cx="4" cy="4" r="3" />
                                    </svg>
                                    <p class="rtl:mr-4">
                                        {{
                                            form.published
                                                ? $t("Published")
                                                : $t("Not Published")
                                        }}
                                    </p>
                                </span>
                            </SwitchLabel>
                        </SwitchGroup>
                        <!-- This example requires Tailwind CSS v2.0+ -->
                        <span
                            class="
                                relative
                                z-0
                                inline-flex
                                shadow-sm
                                rounded-md
                                mx-5
                            "
                        >
                            <!-- edit button -->
                            <Link
                                :href="route('forms.edit', userForm.data.id)"
                                as="button"
                                type="button"
                                class="
                                    relative
                                    inline-flex
                                    items-center
                                    px-4
                                    py-2
                                    rounded-l-md
                                    border border-gray-300
                                    bg-white
                                    text-sm
                                    font-medium
                                    text-gray-700
                                    hover:bg-gray-50
                                    focus:z-10
                                    focus:outline-none
                                    focus:ring-1
                                    focus:ring-indigo-500
                                    focus:border-indigo-500
                                "

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
                                        d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"
                                    />
                                </svg>
                            </Link>
                            <!-- delete Button -->
                            <button
                                @click="deleteModalOpen = true"
                                type="button"
                                class="
                                    -ml-px
                                    relative
                                    inline-flex
                                    items-center
                                    px-4
                                    py-2
                                    border border-gray-300
                                    bg-white
                                    text-sm
                                    font-medium
                                    text-gray-700
                                    hover:bg-gray-50
                                    focus:z-10
                                    focus:outline-none
                                    focus:ring-1
                                    focus:ring-indigo-500
                                    focus:border-indigo-500
                                "
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
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
                                    />
                                </svg>
                            </button>
                            <!-- share button -->
                            <button
                                @click="shareModalOpen = true"
                                type="button"
                                class="
                                    -ml-px
                                    relative
                                    inline-flex
                                    items-center
                                    px-4
                                    py-2
                                    border border-gray-300
                                    bg-white
                                    text-sm
                                    font-medium
                                    text-gray-700
                                    hover:bg-gray-50
                                    focus:z-10
                                    focus:outline-none
                                    focus:ring-1
                                    focus:ring-indigo-500
                                    focus:border-indigo-500
                                "
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
                                        d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"
                                    />
                                </svg>
                            </button>
                            <!-- export results button -->
                            <a
                                :href="route('results.export', userForm.data.id)"
                                type="button"
                                class="
                                    -ml-px
                                    relative
                                    inline-flex
                                    items-center
                                    px-4
                                    py-2
                                    rounded-r-md
                                    border border-gray-300
                                    bg-white
                                    text-sm
                                    font-medium
                                    text-gray-700
                                    hover:bg-gray-50
                                    focus:z-10
                                    focus:outline-none
                                    focus:ring-1
                                    focus:ring-indigo-500
                                    focus:border-indigo-500
                                "

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
                                        d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"
                                    />
                                </svg>
                            </a>
                        </span>
                    </div>
                </div>
            </template>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-5">
                <!-- This example requires Tailwind CSS v2.0+ -->
                <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                    <div class="px-4 py-5 sm:px-6">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                            {{ $t("Form Description")}}
                        </h3>
                        <p class="mt-1 max-w-2xl text-sm text-gray-500">
                            {{ userForm.data.description }}
                        </p>
                    </div>
                    <div class="px-4 py-5 sm:px-6">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                            {{ $t("Questions")}}
                        </h3>
                    </div>
                    <div class="border-t border-gray-200 px-4 py-5 sm:p-0">
                        <dl class="sm:divide-y sm:divide-gray-200">
                            <!--
  This example requires Tailwind CSS v2.0+

  This example requires some changes to your config:

  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/line-clamp'),
    ],
  }
  ```
-->
                            <ul role="list" class="divide-y divide-gray-200">
                                <li
                                    v-for="(question, index) in userForm.data
                                        .questions"
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
                                            <a
                                                :href="
                                                    route(
                                                        'questions.show',
                                                        question.id
                                                    )
                                                "
                                                class="block focus:outline-none"
                                            >
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
                                                    {{ question.text }}
                                                </p>
                                                <!-- This example requires Tailwind CSS v2.0+ -->
                                                <span
                                                    class="
                                                        inline-flex
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
                                            </a>
                                        </div>
                                        <div>
                                            <h1 class="text-2xl font-bold">
                                                {{ question.replies }}
                                            </h1>
                                        </div>
                                    </div>
                                    <div class="mt-1">
                                        <p
                                            class="
                                                line-clamp-2
                                                text-sm text-gray-600
                                            "
                                        >
                                            {{ question.description }}
                                        </p>
                                    </div>
                                    <div
                                        class="mt-1 px-4"
                                        v-if="question.answers.length > 0"
                                    >
                                        <p>Answers</p>
                                        <ul class="list-disc">
                                            <li
                                                v-for="(
                                                    answer, index
                                                ) in question.answers"
                                                :key="index"
                                            >
                                                {{ answer.text }}
                                            </li>
                                        </ul>
                                    </div>
                                </li>

                                <!-- More messages... -->
                            </ul>
                        </dl>
                    </div>
                </div>
            </div>
        </app-layout>
    </div>
</template>

<script>
import { defineComponent } from "vue";
import AppLayout from "../../Layouts/AppLayout.vue";
import { Switch, SwitchGroup, SwitchLabel } from "@headlessui/vue";
import { useForm, Link } from "@inertiajs/inertia-vue3";

export default defineComponent({
    props: {
        userForm: Object,
    },
    components: { AppLayout, Switch, SwitchGroup, SwitchLabel, Link },
    computed: {
        validEmailList: function(){
            var res = true;
            if(this.emailList === '')
                return false;
            var emails = this.invitationForm.emailList.split(',');
            emails.forEach(email => {
                email = email.replace(/\s/g, '');
                if(!this.reg.test(email))
                    res = res && false;
            });

            return res;
        }
    },
    data() {
        return {
            deleteModalOpen: false,
            shareModalOpen: false,
            reg: /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,24}))$/,
            invitationForm: useForm({
                emailList: ''
            }),

            form: useForm({
                published: this.userForm.data.published,
            }),
        };
    },
    methods: {
        submitForm: function () {
            this.form.patch(route("forms.update", this.userForm.data.id), {
                preserveScroll: true,
            });
        },
        deleteForm: function () {
            this.$inertia.delete(route("forms.destroy", this.userForm.data.id));
        },
        copyLink: function () {
            let copyText = document.getElementById("form-answer-link");

            /* Select the text field */
            copyText.select();
            copyText.setSelectionRange(0, 99999); /* For mobile devices */

            /* Copy the text inside the text field */
            document.execCommand("copy");

            alert("copied successfully");
        },
        sendInvitations: function(){
            this.invitationForm.post(route('invitations'), {
                preserveScroll: true,
                onSuccess: () => {
                    this.shareModalOpen = false
                }
            })
        }
    },
});
</script>

<style></style>
