<template>
    <div class="w-full mt-10">Listen Ansicht</div>
</template>

<script lang="ts" setup>
const props = defineProps({
    files: {
        type: Array,
        required: true,
    },
});
</script>

<style scoped>
.tab-height {
    height: calc(100vh - 230px);
}
</style>
