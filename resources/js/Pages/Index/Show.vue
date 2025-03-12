<template>
        <p>show</p>
</template>
<script setup>
import { ref } from 'vue';
const counter = ref(0); // Fixed the typo here
setInterval(() => counter.value++, 1000);
</script>
