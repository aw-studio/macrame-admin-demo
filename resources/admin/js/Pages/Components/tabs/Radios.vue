<template>
    <div class="p-24">
        <h2>RadioGroup</h2>
        <RadioGroup v-model="simple" :options="['foo', 'bar', 'baz']" />

        {{ simple }}
        <RadioGroup
            v-model="selection"
            :options="options"
            label-key="text"
            value-key="id"
            disabled-key="disabled"
        />

        {{ selection }}
    </div>
</template>

<script lang="ts" setup>
import { RadioGroup } from '@macramejs/admin-vue3';
import { ref } from 'vue';
const simple = ref();
const selection = ref(4);
const options = ref([
    {
        id: 1,
        text: 'Foo',
    },
    {
        id: 2,
        text: 'Bar',
    },
    {
        id: 3,
        text: 'Baz',
    },
    {
        id: 4,
        text: 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet enim dolore minima, facere dicta optio sunt ex suscipit nam impedit consectetur placeat aliquam reiciendis sequi dolor rem at neque. Culpa!',
    },
]);
</script>
