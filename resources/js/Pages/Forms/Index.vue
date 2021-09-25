<template>
    <div>
        <!-- This example requires Tailwind CSS v2.0+ -->
        <div>
            <h3 class="text-lg leading-6 font-medium text-gray-900">
                Last 30 days
            </h3>

            <dl
                class="
                    mt-5
                    grid grid-cols-1
                    gap-5
                    sm:grid-cols-2
                    lg:grid-cols-3
                "
            >
                <div
                    class="
                        relative
                        bg-white
                        pt-5
                        px-4
                        pb-12
                        sm:pt-6 sm:px-6
                        shadow
                        rounded-lg
                        overflow-hidden
                    "
                >
                    <dt>
                        <div class="absolute bg-indigo-500 rounded-md p-3">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-6 w-6 text-white"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"
                                />
                            </svg>
                        </div>
                        <p
                            class="
                                ml-16
                                text-sm
                                font-medium
                                text-gray-500
                                truncate
                            "
                        >
                            Total Forms
                        </p>
                    </dt>
                    <dd class="ml-16 pb-6 flex items-baseline sm:pb-7">
                        <p class="text-2xl font-semibold text-gray-900">
                            {{ forms.data.length }}
                        </p>
                        <div
                            class="
                                absolute
                                bottom-0
                                inset-x-0
                                bg-gray-50
                                px-4
                                py-4
                                sm:px-6
                            "
                        >
                            <div class="text-sm">
                                <a
                                    href="#"
                                    class="
                                        font-medium
                                        text-indigo-600
                                        hover:text-indigo-500
                                    "
                                >
                                    View all<span class="sr-only">
                                        Total Subscribers stats</span
                                    ></a
                                >
                            </div>
                        </div>
                    </dd>
                </div>

                <div
                    class="
                        relative
                        bg-white
                        pt-5
                        px-4
                        pb-12
                        sm:pt-6 sm:px-6
                        shadow
                        rounded-lg
                        overflow-hidden
                    "
                >
                    <dt>
                        <div class="absolute bg-indigo-500 rounded-md p-3">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-6 w-6 text-white"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6"
                                />
                            </svg>
                        </div>
                        <p
                            class="
                                ml-16
                                text-sm
                                font-medium
                                text-gray-500
                                truncate
                            "
                        >
                            All Responses
                        </p>
                    </dt>
                    <dd class="ml-16 pb-6 flex items-baseline sm:pb-7">
                        <p class="text-2xl font-semibold text-gray-900">
                            {{ responses }}
                        </p>
                        <div
                            class="
                                absolute
                                bottom-0
                                inset-x-0
                                bg-gray-50
                                px-4
                                py-4
                                sm:px-6
                            "
                        >
                            <div class="text-sm">
                                <a
                                    href="#"
                                    class="
                                        font-medium
                                        text-indigo-600
                                        hover:text-indigo-500
                                    "
                                >
                                    View all<span class="sr-only">
                                        Avg. Open Rate stats</span
                                    ></a
                                >
                            </div>
                        </div>
                    </dd>
                </div>

                <div
                    class="
                        relative
                        bg-white
                        pt-5
                        px-4
                        pb-12
                        sm:pt-6 sm:px-6
                        shadow
                        rounded-lg
                        overflow-hidden
                    "
                >
                    <dt>
                        <div class="absolute bg-indigo-500 rounded-md p-3">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-6 w-6 text-white"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"
                                />
                            </svg>
                        </div>
                        <p
                            class="
                                ml-16
                                text-sm
                                font-medium
                                text-gray-500
                                truncate
                            "
                        >
                            All Users
                        </p>
                    </dt>
                    <dd class="ml-16 pb-6 flex items-baseline sm:pb-7">
                        <p class="text-2xl font-semibold text-gray-900">
                            {{ users }}
                        </p>
                        <div
                            class="
                                absolute
                                bottom-0
                                inset-x-0
                                bg-gray-50
                                px-4
                                py-4
                                sm:px-6
                            "
                        >
                            <div class="text-sm">
                                <a
                                    href="#"
                                    class="
                                        font-medium
                                        text-indigo-600
                                        hover:text-indigo-500
                                    "
                                >
                                    View all<span class="sr-only">
                                        Avg. Click Rate stats</span
                                    ></a
                                >
                            </div>
                        </div>
                    </dd>
                </div>
            </dl>
        </div>
        <div class="bg-white rounded-lg shadow my-5">
            <!-- This example requires Tailwind CSS v2.0+ -->
            <div class="bg-white px-4 py-5 border-b border-gray-200 sm:px-6">
                <div
                    class="
                        -ml-4
                        -mt-2
                        flex
                        items-center
                        justify-between
                        flex-wrap
                        sm:flex-nowrap
                    "
                >
                    <div class="ml-4 mt-2">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                            Forms
                        </h3>
                    </div>
                    <div class="ml-4 mt-2 flex-shrink-0">
                        <a
                            :href="route('forms.create')"
                            class="
                                relative
                                inline-flex
                                items-center
                                px-4
                                py-2
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
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
</svg>
                        </a>
                    </div>
                </div>
            </div>
            <!-- This example requires Tailwind CSS v2.0+ -->
            <div class="bg-white shadow overflow-hidden sm:rounded-md">
                <ul role="list" class="divide-y divide-gray-200">
                    <li v-for="form in forms.data" :key="form.id">
                        <a href="#" class="block hover:bg-gray-50">
                            <div class="px-4 py-4 sm:px-6">
                                <div class="flex items-center justify-between">
                                    <p
                                        class="
                                            text-sm
                                            font-medium
                                            text-indigo-600
                                            truncate
                                        "
                                    >
                                        {{ form.title }}
                                    </p>
                                    <div class="ml-2 flex-shrink-0 flex">
                                        <p
                                            :class="{'px-2 inline-flex text-xs leading-5 font-semibold rounded-full':true,
                                                'bg-green-100 text-green-800': form.published,
                                                'bg-red-100 text-red-800': !form.published
                                            }"
                                        >
                                           {{ form.published ? 'published' : 'not published'}}
                                        </p>
                                    </div>
                                </div>
                                <div class="mt-2 sm:flex sm:justify-between">
                                    <div class="sm:flex">
                                        <p
                                            class="
                                                flex
                                                items-center
                                                text-sm text-gray-500
                                            "
                                        >
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6" />
</svg>
                                            {{ form.responses }}
                                        </p>
                                        <p
                                            class="
                                                mt-2
                                                flex
                                                items-center
                                                text-sm text-gray-500
                                                sm:mt-0 sm:ml-6
                                            "
                                        >
                                            <!-- Heroicon name: solid/location-marker -->
                                            <svg
                                                class="
                                                    flex-shrink-0
                                                    mr-1.5
                                                    h-5
                                                    w-5
                                                    text-gray-400
                                                "
                                                xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20"
                                                fill="currentColor"
                                                aria-hidden="true"
                                            >
                                                <path
                                                    fill-rule="evenodd"
                                                    d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                                    clip-rule="evenodd"
                                                />
                                            </svg>
                                            Remote
                                        </p>
                                    </div>
                                    <div
                                        class="
                                            mt-2
                                            flex
                                            items-center
                                            text-sm text-gray-500
                                            sm:mt-0
                                        "
                                    >
                                        <!-- Heroicon name: solid/calendar -->
                                        <svg
                                            class="
                                                flex-shrink-0
                                                mr-1.5
                                                h-5
                                                w-5
                                                text-gray-400
                                            "
                                            xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20"
                                            fill="currentColor"
                                            aria-hidden="true"
                                        >
                                            <path
                                                fill-rule="evenodd"
                                                d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                                clip-rule="evenodd"
                                            />
                                        </svg>
                                        <p>
                                            {{ form.createdAt }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
import { defineComponent } from "vue";

export default defineComponent({
    props: ["forms", "responses", "users"],
});
</script>

<style></style>
