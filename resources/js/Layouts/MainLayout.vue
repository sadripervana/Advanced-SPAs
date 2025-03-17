<template>
    <header class="border-b border-gray-200 dark:border-gray-600 dark:bg-gray-900 bg-white w-full">
        <div class="container mx-auto">
            <nav class=" flex items-center justify-between p-4">
                <div class="text-lg">
                    <Link :href="route('listing.index')" class="font-bold">Listings</Link>
                </div>
                <div class="text-xl text-indigo-600 dark:text-indigo-400">
                    <Link :href="route('listing.index')">LaraZillo</Link>
                </div>
                <div>
                    <Link :href="route('listing.create')"
                        class="btn-primary"> + New Listing
                    </Link>
                </div>
            </nav>
        </div>
    </header>
    <main class="container mx-auto p-4">
            <div v-if="flashSuccess" class="mb-4 border rounded-md p-4 bg-green-100 text-green-800 shadow-sm" >
                <p>{{ flashSuccess }}</p>
            </div>
        <slot >
            <p>Default content</p>
        </slot>
        <div>
            <p>{{ message }}</p>
        </div>
        </main>

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
