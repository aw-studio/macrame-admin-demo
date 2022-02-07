<template>
    <Modal :open="true" v-bind="$attrs" md>
        <h2>New Site</h2>
        <div>
            <Input label="Name" v-model="form.name" />
            <Select
                label="Template"
                :options="templateOptions"
                v-model="form.template"
            />
            {{ templateOptions }}
        </div>
        <Button @click="submit"> Save </Button>
    </Modal>
</template>

<script lang="ts" setup>
import { defineEmits } from 'vue';
import { Modal, Input, Select, Button } from '@macramejs/admin-vue3';
import { useForm } from '@macramejs/macrame-vue3';
import { templateOptions } from './../templates';

const emit = defineEmits(['siteAdded', 'close']);

const form = useForm(
    `/admin/sites`,
    {
        name: '',
        template: '',
    },
    {
        method: 'post',
        onSuccess() {
            emit('siteAdded', this);
            emit('close');
        },
    }
);

const submit = function () {
    form.submit();
};
</script>
