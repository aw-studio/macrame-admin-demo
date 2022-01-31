<template>
    <div class="p-10">
        <h2>Toggle</h2>
        <div class="flex mb-5 space-x-5">
            <Toggle v-model="toggle" size="sm" label="Foo" />
            <Toggle v-model="toggle" size="md" label="Bar" />
            <Toggle v-model="toggle" size="lg" label="Baz" />
            <CheckboxSwitch v-model="toggle" label="Baz" />
        </div>
        {{ toggle }}
    </div>
</template>

<script lang="ts" setup>
import { Toggle, CheckboxSwitch } from '@macramejs/admin-vue3';
import { ref } from 'vue';
const toggle = ref(false);
</script>
