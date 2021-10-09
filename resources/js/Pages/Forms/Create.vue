<template>
    <app-layout title="New Form">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{  $t("New Form") }}
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
                                   {{ $t('Just a second before we redirect you to detailed page') }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5 sm:mt-6">
                        <a :href="route('dashboard')" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:text-sm">
                            {{ $t('Go back to dashboard')}}
                        </a>
                    </div>
                </div>
            </div>
        </div>
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
                                    {{ $t("Form information")}}
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
                                        {{ $t('Title')}}
                                    </label>
                                    <div class="mt-1 flex rounded-md shadow-sm">
                                        <input
                                            type="text"
                                            v-model="form.title"
                                            id="username"
                                            :class="{
                                                'flex-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full min-w-0 rounded-md sm:text-sm border-gray-300': true,
                                                'border-red-600': errors.title,
                                            }"
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
                                        {{ $t('Description')}}
                                    </label>
                                    <div class="mt-1">
                                        <textarea
                                            id="about"
                                            v-model="form.description"
                                            rows="3"
                                            :class="{
                                                'shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border border-gray-300 rounded-md': true,
                                                'border-red-600':
                                                    errors.description,
                                            }"
                                        ></textarea>
                                    </div>
                                    <p class="mt-2 text-sm text-gray-500">
                                        {{ $t('Write a few sentences that explains the purpose of the form.')}}
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
                                    {{ $t('Questions')}}
                                </h3>
                                <p class="mt-1 text-sm text-gray-500">
                                    {{ $t('List all your questions')}}
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
                                            {{ $t('Question') }} {{ index + 1 }}
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
                                            {{ $t(question.type) }}
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
                                            {{ $t('Question Text')}}
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
                                                :class="{
                                                    'flex-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full min-w-0 rounded-none rounded-r-md sm:text-sm border-gray-300': true,
                                                    'border-red-600':
                                                        errors[
                                                            'questions.' +
                                                                index +
                                                                '.text'
                                                        ],
                                                }"
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
                                                        :placeholder="$t('Write your answer')"
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
                                            {{ $t("Add Potential Answer")}}
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
                                            {{ $t('Description')}}
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
                                    <SwitchGroup
                                        as="div"
                                        class="flex items-center"
                                    >
                                        <Switch
                                            @click="
                                                questionIsRequired(question)
                                            "
                                            v-model="question.required"
                                            :class="[
                                                question.required
                                                    ? 'bg-indigo-600'
                                                    : 'bg-gray-200',
                                                'relative inline-flex flex-shrink-0 h-6 w-11 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500',
                                            ]"
                                        >
                                            <span
                                                aria-hidden="true"
                                                :class="[
                                                    question.required
                                                        ? 'translate-x-5'
                                                        : 'translate-x-0',
                                                    'pointer-events-none inline-block h-5 w-5 rounded-full bg-white shadow transform ring-0 transition ease-in-out duration-200',
                                                ]"
                                            />
                                        </Switch>
                                        <SwitchLabel as="span" class="ml-3">
                                            <span
                                                class="
                                                    text-sm
                                                    font-medium
                                                    text-gray-900
                                                "
                                                >{{ $t("Required?")}}
                                            </span>
                                        </SwitchLabel>
                                    </SwitchGroup>
                                    <div class="w-full py-4">
                                        <div
                                            class="
                                                w-full
                                                mx-auto
                                                bg-white
                                                rounded-2xl
                                            "
                                            v-show="index > 0"
                                        >
                                            <Disclosure v-slot="{ open }">
                                                <DisclosureButton
                                                    class="
                                                        flex
                                                        justify-between
                                                        w-full
                                                        px-4
                                                        py-2
                                                        text-sm
                                                        font-medium
                                                        text-left
                                                        text-purple-900
                                                        bg-purple-100
                                                        rounded-lg
                                                        hover:bg-purple-200
                                                        focus:outline-none
                                                        focus-visible:ring
                                                        focus-visible:ring-purple-500
                                                        focus-visible:ring-opacity-75
                                                    "
                                                >
                                                    <span>{{ $t('Conditions')}}</span>
                                                    <ChevronUpIcon
                                                        :class="
                                                            open
                                                                ? 'transform rotate-180'
                                                                : ''
                                                        "
                                                        class="
                                                            w-5
                                                            h-5
                                                            text-purple-500
                                                        "
                                                    />
                                                </DisclosureButton>
                                                <DisclosurePanel
                                                    class="
                                                        px-4
                                                        pt-4
                                                        pb-2
                                                        text-sm text-gray-500
                                                    "
                                                >
                                                    <div v-if="question.conditions.length > 0">
                                                        <div
                                                        class="
                                                            mt-6
                                                            grid grid-cols-1
                                                            gap-y-6 gap-x-4
                                                            sm:grid-cols-6
                                                        "
                                                        v-for="(condition, index) in question.conditions" :key="index"
                                                    >

                                                        <div
                                                            class="
                                                                sm:col-span-2
                                                            "
                                                        >
                                                            <label
                                                                for="city"
                                                                class="
                                                                    block
                                                                    text-sm
                                                                    font-medium
                                                                    text-gray-700
                                                                "
                                                            >
                                                                Prior Question
                                                            </label>
                                                            <div class="mt-1">
                                                                <select v-model="condition.foreignQuestion" class="shadow-sm
                                                                        focus:ring-indigo-500
                                                                        focus:border-indigo-500
                                                                        block
                                                                        w-full
                                                                        sm:text-sm
                                                                        border-gray-300
                                                                        rounded-md">
                                                                    <option value="">Choose</option>
                                                                    <option v-for="(question, index) in priorQuestionsTo(question)" :key="index" :value="question.text">{{question.text}}</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div
                                                            class="
                                                                sm:col-span-2
                                                            "
                                                        >
                                                            <label
                                                                for="state"
                                                                class="
                                                                    block
                                                                    text-sm
                                                                    font-medium
                                                                    text-gray-700
                                                                "
                                                            >
                                                                Operation
                                                            </label>
                                                            <div class="mt-1">
                                                                <select v-model="condition.operation" class="shadow-sm
                                                                        focus:ring-indigo-500
                                                                        focus:border-indigo-500
                                                                        block
                                                                        w-full
                                                                        sm:text-sm
                                                                        border-gray-300
                                                                        rounded-md">
                                                                    <option value="">Choose</option>
                                                                    <option value="notEmpty">Question not empty</option>
                                                                    <option value="equals">Question response equals to</option>
                                                                    <option value="notEquals">Question response not equals to</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div
                                                        v-if="index > 0"
                                                            class="
                                                                sm:col-span-2
                                                            "
                                                        >
                                                            <label
                                                                for="zip"
                                                                class="
                                                                    block
                                                                    text-sm
                                                                    font-medium
                                                                    text-gray-700
                                                                "
                                                            >
                                                                Operator
                                                            </label>
                                                            <div class="mt-1">
                                                                <select v-model="condition.operator" class="shadow-sm
                                                                        focus:ring-indigo-500
                                                                        focus:border-indigo-500
                                                                        block
                                                                        w-full
                                                                        sm:text-sm
                                                                        border-gray-300
                                                                        rounded-md">
                                                                        <option value="">Choose</option>
                                                                        <option value="&&">AND</option>
                                                                        <option value="||">OR</option>
                                                                        </select>
                                                            </div>
                                                        </div>
                                                        <div
                                                        v-if="condition.operation != 'notEmpty'"
                                                            class="
                                                                sm:col-span-2
                                                            "
                                                        >
                                                            <label
                                                                for="zip"
                                                                class="
                                                                    block
                                                                    text-sm
                                                                    font-medium
                                                                    text-gray-700
                                                                "
                                                            >
                                                                Value
                                                            </label>
                                                            <div class="mt-1">
                                                                <input type="text" v-model="condition.value" class="shadow-sm
                                                                        focus:ring-indigo-500
                                                                        focus:border-indigo-500
                                                                        block
                                                                        w-full
                                                                        sm:text-sm
                                                                        border-gray-300
                                                                        rounded-md" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button type="button" class="sm:col-span-6 my-4 text-indigo-500" @click="addCondition(question)">Add Condition</button>
                                                    </div>
                                                    <!-- This example requires Tailwind CSS v2.0+ -->
<button v-else @click="addCondition(question)" type="button" class="relative block w-full border-2 border-gray-300 border-dashed rounded-lg p-12 text-center hover:border-gray-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
  <svg class="mx-auto h-12 w-12 text-gray-400" xmlns="http://www.w3.org/2000/svg" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14v20c0 4.418 7.163 8 16 8 1.381 0 2.721-.087 4-.252M8 14c0 4.418 7.163 8 16 8s16-3.582 16-8M8 14c0-4.418 7.163-8 16-8s16 3.582 16 8m0 0v14m0-4c0 4.418-7.163 8-16 8S8 28.418 8 24m32 10v6m0 0v6m0-6h6m-6 0h-6" />
  </svg>
  <span class="mt-2 block text-sm font-medium text-gray-900">
    Create a new database
  </span>
</button>
                                                </DisclosurePanel>
                                            </Disclosure>
                                        </div>
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
                                    {{ $t("add a question")}}
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
                                            @click="newQuestion('file')"
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
                                {{ $t("Cancel")}}
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
                                {{  $t("Save") }}
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
import { Switch, SwitchGroup, SwitchLabel } from "@headlessui/vue";
import { Disclosure, DisclosureButton, DisclosurePanel } from "@headlessui/vue";
import { ChevronUpIcon } from "@heroicons/vue/solid";

export default defineComponent({
    props: {
        errors: Object,
    },
    components: {
        AppLayout,
        Disclosure,
        Switch,
        SwitchGroup,
        SwitchLabel,
        Disclosure,
        DisclosureButton,
        DisclosurePanel,
        ChevronUpIcon,
    },
    data() {
        return {
            formSuccess: false,
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
                        conditions: [],
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
                hasConditions: false,
                answers:
                    qType === "multiple" || qType === "checkbox"
                        ? [{ text: "", description: "" }]
                        : null,
            });
        },
        addPotentialAnswer: function (question) {
            question.answers.push({ text: "", description: "" });
        },
        questionIsRequired: function (question) {
            question.required = !question.required;
        },
        addCondition: function (question) {
            question.hasConditions = true;
            question.conditions.push({
                operation: "notEmpty",
                foreignQuestion: "",
                operator: "",
                value: ""
            });
        },
        priorQuestionsTo: function (question) {
            var priorQuestions = [];
            this.form.questions.some((q, index) => {
                priorQuestions.push(q);
                return this.form.questions[index + 1].text === question.text;
            });

            return priorQuestions;
        },
        submitForm: function () {
            this.form.post(route("forms.store"), {
                preserveScroll: true,
                onSuccess: () => {
                    this.form.reset();
                    this.formSuccess = true;
                },
            });
        },
    },
});
</script>

<style></style>
