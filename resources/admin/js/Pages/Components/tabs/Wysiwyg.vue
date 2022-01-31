<template>
    <div class="p-10">
        <h2 class="mb-10 text-xl">Wysiwyg</h2>
        <Wysiwyg hint="Tets" v-model="text" />
        <div class="mt-5" v-html="text"></div>
    </div>
    <div class="p-10">
        <h2 class="mb-10 text-xl">Textarea</h2>
        <Textarea placeholder="Test" hint="Eine Textarea" v-model="text2" />
        {{ text2 }}
    </div>
</template>

<script lang="ts" setup>
import { ref } from 'vue';
import { Wysiwyg, Textarea } from '@macramejs/admin-vue3';

const text = ref('');
const text2 = ref('');
</script>
