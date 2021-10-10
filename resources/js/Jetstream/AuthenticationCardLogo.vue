<template>
    <Link :href="'/'">
        <img class="w-24 h-24" :src="`/images/seu_logo.png`" alt="">
    </Link>
</template>

<script>
    import { defineComponent } from 'vue'
    import { Link } from '@inertiajs/inertia-vue3';

    export default defineComponent({
        components: {
            Link,
        },
    })
</script>
