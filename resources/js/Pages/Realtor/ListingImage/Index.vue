<template>
    <div>
        <h1>Images for Listing #{{ listing.id }}</h1>

        <!-- Upload form -->
        <form method="POST" :action="route('realtor.listing.image.store', { listing: listing.id })"
            enctype="multipart/form-data">
            <input type="hidden" name="_token" :value="$page.props.csrf_token">
            <input type="file" multiple name="images" />
            <button type="submit">Upload Images</button>
        </form>

        <!-- Display existing images -->
        <div v-if="listing.images.length" class="image-grid">
            <div v-for="image in listing.images" :key="image.id" class="image-item">
                <img :src="'/storage/' + image.filename" alt="Listing image" />
            </div>
        </div>
        <p v-else>No images uploaded yet.</p>
    </div>
</template>

<script setup>
defineProps({ listing: Object });
</script>

<style>
.image-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
    gap: 16px;
    margin-top: 20px;
}

.image-item img {
    max-width: 100%;
    height: auto;
}
</style>
