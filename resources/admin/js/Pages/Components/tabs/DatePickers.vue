<template>
    <div class="p-10">
        <DatePicker :min-date="new Date()" v-model="date" label="Abreise" />
        <br />
        <DatePicker
            :min-date="new Date()"
            v-model="date"
            :errors="['Error 1', 'Error 2 Lorem Ipsum']"
        />
        <br />
        <DateRange :min-date="new Date()" v-model="range" />
    </div>
</template>

<script lang="ts" setup>
import { DatePicker, DateRange } from '@macramejs/admin-vue3';
import { ref } from 'vue';

const date = ref(null);

const range = ref({
    start: null,
    end: null,
});
</script>
