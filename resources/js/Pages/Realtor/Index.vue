<template>
    <h1 class="text-3xl mb-4">Your Listings</h1>
    <section>
        <RealtorFilters :filters="filters" />
    </section>
    <section class="grid grid-cols-1 lg:grid-cols-2 gap-2">
        <Box v-for="listing in listings.data" :key="listing.id" :listing="listing"
            :class="{ 'border-dashed': listing.deleted_at }">
            <div class="flex flex-col md:flex-row gap-2 md:items-center justify-between">
                <div :class="{ 'opacity-25': listing.deleted_at }">
                    <div class="xl:flex items-center gap-2">
                        <Price :price="listing.price" class="text-2xl font-medium" />
                        <ListingSpace :listing="listing" />
                    </div>
                    <ListingAddress :listing="listing" class=" text-gray-500" />
                </div>
                <div>
                    <section>
                        <div class="flex items-center gap-1 text-gray-600 dark:text-gray-300">
                            <a class="btn-outline text-xs font-medium"
                                :href="route('listing.show', { listing: listing.id })" target="_blank">Preview</a>
                            <Link class="btn-outline text-xs font-medium"
                                :href="route('realtor.listing.edit', { listing: listing.id })">Edit</Link>
                            <Link v-if="!listing.deleted_at" class="btn-outline text-xs font-medium"
                                :href="route('realtor.listing.destroy', { listing: listing.id })" as="button"
                                method="delete">
                            Delete</Link>

                            <Link v-else class="btn-outline text-xs font-medium" as="button" method="put"
                                :href="route('realtor.listing.restore', { listing: listing.id })">
                            Restore
                            </Link>
                        </div>
                        <div class="mt-2">
                            <Link :href="route('realtor.listing.image.create',
                                { listing: listing.id })" class="btn-outline block w-full btn-outline text-xs
                                font-medium text-center">
                            Images ({{ listing.images_count }})
                            </Link>
                        </div>
                    </section>
                </div>
            </div>
        </Box>
    </section>

    <section v-if="listings.data.length > 1" class="w-full flex justify-center mb-4 mt-4">
        <div class="flex justify-center">
            <Pagination :links="listings.links" />
        </div>

    </section>
</template>
<script setup>
import Box from '@/Components/UI/Box.vue';
import Price from '@/Components/Price.vue';
import ListingSpace from '@/Components/ListingSpace.vue';
import ListingAddress from '@/Components/ListingAddress.vue';
import { Link } from '@inertiajs/vue3';

import { defineProps } from 'vue';
import RealtorFilters from '@/Pages/Realtor/Index/Components/RealtorFilters.vue';
import Pagination from '@/Components/UI/Pagination.vue';
defineProps({
    listings: Object,
    filters: Object,
})
</script>
