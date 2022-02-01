<template>
    <Admin sidebar-secondary>
        <template v-slot:sidebar-secondary-header>
            <div class="flex items-center space-x-2">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="-5 -5 24 24"
                    width="24"
                    class="w-6 h-6 fill-gray-800"
                >
                    <path
                        d="M2,6 L6,6 L6,2 L2,2 L2,6 Z M2,8 L2,12 L6,12 L6,8 L2,8 Z M12,6 L12,2 L8,2 L8,6 L12,6 Z M12,8 L8,8 L8,12 L12,12 L12,8 Z M2,0 L12,0 C13.1045695,0 14,0.8954305 14,2 L14,12 C14,13.1045695 13.1045695,14 12,14 L2,14 C0.8954305,14 0,13.1045695 0,12 L0,2 C0,0.8954305 0.8954305,0 2,0 Z"
                    ></path>
                </svg>
                <span class="inline-block text-xl"> Komponenten </span>
            </div>
        </template>
        <template v-slot:sidebar-secondary> Sidebar Secondary </template>
        <template v-slot:topbar-left> Topbar Left </template>
        <template v-slot:topbar-right> Topbar Right </template>
        <TabGroup>
            <template v-slot:tab-list>
                <Tab>Buttons</Tab>
                <Tab>Badges</Tab>
                <Tab>Select</Tab>
                <Tab>Checkbox</Tab>
                <Tab>Modal</Tab>
                <Tab>Radio</Tab>
                <Tab>Toggle</Tab>
                <Tab>Chips</Tab>
                <Tab>Input</Tab>
                <Tab>Datepicker</Tab>
                <Tab>Slider</Tab>
                <Tab>Wysiwyg</Tab>
                <Tab>Text</Tab>
                <Tab>Meta</Tab>
            </template>
            <TabPanel>
                <Buttons />
            </TabPanel>
            <TabPanel>
                <Badges />
            </TabPanel>
            <TabPanel>
                <div class="p-24">
                    <Select v-model="selected" :options="options" />
                    <div class="mt-4">Selected Value: {{ selected }}</div>
                </div>
            </TabPanel>
            <TabPanel>
                <Checkboxes />
            </TabPanel>
            <TabPanel>
                <Modal />
            </TabPanel>
            <TabPanel>
                <Radios />
            </TabPanel>
            <TabPanel>
                <Toggles />
            </TabPanel>
            <TabPanel>
                <div class="p-24">
                    <h2>Chips</h2>
                    <div class="flex mb-5 space-x-5">
                        <Chip v-model="toggle" label="Foo" />
                    </div>
                    {{ toggle }}
                </div>
            </TabPanel>
            <TabPanel>
                <div class="p-10">
                    <Input label="Test" v-model="text" /> <br />
                    <br />
                    <Input disabled v-model="text" />
                    {{ text }}
                </div>
            </TabPanel>
            <TabPanel>
                <DatePickers />
            </TabPanel>
            <TabPanel>
                <div class="p-10">
                    <Slider v-model="number" min="0" max="100" />
                    {{ number }}
                </div>
            </TabPanel>
            <TabPanel>
                <Wysiwyg />
            </TabPanel>
            <TextTab />
            <MetaTab />
        </TabGroup>
    </Admin>
</template>

<script lang="ts" setup>
import { Admin } from '@admin/layout';
import {
    Slider,
    Chip,
    Tab,
    TabPanel,
    TabGroup,
    Select,
    Card,
    Input,
} from '@macramejs/admin-vue3';
import { ref } from 'vue';
import Buttons from './tabs/Buttons.vue';
import Badges from './tabs/Badges.vue';
import Checkboxes from './tabs/Checkboxes.vue';
import Modal from './tabs/Modal.vue';
import Radios from './tabs/Radios.vue';
import Toggles from './tabs/Toggles.vue';
import DatePickers from './tabs/DatePickers.vue';
import TextTab from './tabs/TextTab.vue';
import Wysiwyg from './tabs/Wysiwyg.vue';
import MetaTab from './tabs/Meta.vue';

const text = ref('');

const number = ref(0);

const toggle = ref(false);

const options = [
    { value: null, label: 'Wählen sie aus asdadadada' },
    { value: 1, label: 'Eins' },
    { value: 2, label: 'Zwei' },
    { value: 3, label: 'Drei' },
];

const selected = ref(options[0].value);
</script>
