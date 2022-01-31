<template>
    <div class="p-10">
        <h2>Checkboxes</h2>
        <div v-for="object in objects" class="mb-2">
            <Checkbox
                :value="object.id"
                :label="object.label"
                v-model="form.objects"
                :fieldId="object.id"
            />
        </div>
        <pre>
            {{ form }}
        </pre>
    </div>
</template>

<script lang="ts" setup>
import { Checkbox } from '@macramejs/admin-vue3';
import { reactive } from 'vue';

const objects = reactive([
    { id: 1, label: 'Eins' },
    { id: 2, label: 'Zwei' },
    { id: 3, label: 'Drei' },
]);

const form = reactive({
    objects: [],
});
</script>
