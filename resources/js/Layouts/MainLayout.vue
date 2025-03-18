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
                    <div v-if="user" class="flex items-center gap-4">
                        <div class="text-sm text-gray-500">{{ user.name }}</div>
                        <Link :href="route('listing.create')" class="btn-primary">+ New Listing</Link>
                        <div>
                            <Link :href="route('logout')" method="delete" as="button">Logout</Link>
                        </div>
                    </div>
                    <div v-else class="flex items-center gap-2">
                        <Link :href="route('user-account.create')">Register</Link>
                        <Link :href="route('login')">Sign-In</Link>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <main class="container mx-auto p-4  w-full">
        <div v-if="flashSuccess" class="mb-4 border rounded-md p-4 bg-green-100 text-green-800 shadow-sm">
            <p>{{ flashSuccess }}</p>
        </div>
        <div v-if="flashError" class="mb-4 border rounded-md p-4 bg-red-100 text-red-800 shadow-sm">
            <p>{{ flashError }}</p>
        </div>
        <slot>
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

const flashError = computed(() => {
    return page.props.flash.error;
});

const user = computed(() => {
    return page.props.user;
});
</script>
