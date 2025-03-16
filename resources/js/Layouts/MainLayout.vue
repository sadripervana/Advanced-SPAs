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
        <div v-if="flashSuccess" class="success">
            <p>{{ flashSuccess }}</p>
        </div>
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
import { computed } from 'vue';
import { Link, usePage } from '@inertiajs/vue3';
const page = usePage();

const flashSuccess = computed(() => {
    return page.props.flash.success;
});
</script>
<style>
.success {
    background-color: green;
    color: white;
    padding: 10px;
    margin-top: 10px;
}
</style>
