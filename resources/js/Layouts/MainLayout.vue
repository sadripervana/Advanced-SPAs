<template>
    <div>
        Hello!
        <Link rel="stylesheet" href="/">Home</Link>
        <br>
        <Link rel="stylesheet" href="/show">show</Link>
        <br>
        <Link rel="stylesheet" href="listing/create">create</Link>
        <br>
        <Link rel="stylesheet" href="listing">Listing</Link>
        <slot >
            <p>Default content</p>
        </slot>
        <div>
            <p>{{ message }}</p>
            <!-- <div>
                The page with the timer is here: {{ counter }}
            </div> -->
        </div>
    </div>
</template>
<script setup>
defineProps({
    message: String,
});
// import { ref } from 'vue';
// const counter = ref(0); // Fixed the typo here
// setInterval(() => counter.value++, 1000);

import { Link } from '@inertiajs/vue3';
</script>
