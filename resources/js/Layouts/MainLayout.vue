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
                <div v-if="user" class="flex items-center gap-4">
                    <Link class="text-gray-500 relative pr-2 py-2 text-lg" :href="route('notification.index')">
                    🔔
                    <div v-if="notificationCount"
                        class="absolute right-0 top-0 w-5 h-5 bg-red-700 dark:bg-red-400 text-white font-medium border border-white dark:border-gray-900 rounded-full text-xs text-center">
                        {{ notificationCount }}
                    </div>
                    </Link>
                    <Link :href="route('realtor.listing.index')" class="text-sm text-gray-500">{{ user.name }}
                    </Link>
                    <Link :href="route('realtor.listing.create')" class="btn-primary">+ New Listing</Link>
                    <div>
                        <Link :href="route('logout')" method="delete" as="button">Logout</Link>
                    </div>
                </div>
                <div v-else class="flex items-center gap-2">
                    <Link :href="route('user-account.create')">Register</Link>
                    <Link :href="route('login')">Sign-In</Link>
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

const notificationCount = computed(
    () => Math.min(page.props.user?.notificationCount || 0, 9),
)
</script>
