<template>
    <p>This is Home Page</p>
    <p>{{ counter }}</p>
</template>

<script setup>
import { ref } from 'vue';

// Creating a reactive counter variable
const counter = ref(0);
setInterval(() => counter.value++, 1000); // No cleanup for interval, could be a memory leak

// Define prop but it's never used in the template
defineProps({
  message: String, // `message` is unused and should trigger a warning
});

// An unused variable that should trigger a warning from ESLint
const unused = ref(0);

// Concatenation of strings but in a non-optimal way (should use template literals)
const someText = `Counter: ${counter.value}`; // String concatenation instead of template literals
</script>
