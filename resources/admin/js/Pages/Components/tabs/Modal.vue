<template>
    <div class="p-10">
        <h2>Modal</h2>
        <Button primary @click="openModal()">Open Modal</Button>
        <Modal lg v-model:open="isOpen">
            <h3 class="mb-4 text-xl font-semibold">Modal title</h3>
            <p class="mb-2">
                Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed
                diam nonumy eirmod tempor invidunt ut labore et dolore magna
                aliquyam erat, sed diam voluptua. At vero eos et accusam et
                justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea
                takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum
                dolor sit amet, consetetur sadipscing elitr, sed diam nonumy
                eirmod tempor invidunt ut labore et dolore magna aliquyam erat,
                sed diam voluptua. At vero eos et accusam et justo duo dolores
                et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus
                est Lorem ipsum dolor sit amet.
            </p>
            <Button primary @click="closeModal">Close Modal</Button>
        </Modal>
    </div>
</template>

<script lang="ts" setup>
import { Modal, Button } from '@macramejs/admin-vue3';
import { ref } from 'vue';
const isOpen = ref(false);

const openModal = () => {
    isOpen.value = true;
};

const closeModal = () => {
    isOpen.value = false;
};
</script>
