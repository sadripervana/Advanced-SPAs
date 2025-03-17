<template>
    <span>
        {{ listing.street }} {{ listing.stree_nr }}, {{ listing.city }}
    </span>
</template>

<script setup>
defineProps({
    listing: Object,
})
</script>
