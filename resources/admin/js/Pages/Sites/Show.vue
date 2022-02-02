<template>
    <BaseLayout>
        <TabGroup>
            <TabList>
                <Tab> Content </Tab>
                <Tab> Meta </Tab>
                <Tab> Settings </Tab>
            </TabList>
            <TabPanels>
                <TabPanel has-sidebar sidebar-top-position="118">
                    <template v-slot:sidebar>
                        <DrawerSection title="Text Komponenten">
                            <Cabinet>
                                <TextDrawer :draws="TextSection" />
                            </Cabinet>
                        </DrawerSection>
                        <DrawerSection title="Other">
                            <Cabinet>
                                <CardsDrawer :draws="CardsSection" />
                            </Cabinet>
                        </DrawerSection>
                    </template>
                    <div class="flex py-4">
                        <div class="container">
                            <Sections
                                v-model="form.content"
                                :sections="sections"
                            />
                        </div>
                    </div>
                </TabPanel>
            </TabPanels>
        </TabGroup>
    </BaseLayout>
</template>

<script setup lang="ts">
import { defineProps } from 'vue';
import { Admin } from '@admin/layout';
import Layout from './package/Layout.vue';
import { useForm } from '@macramejs/macrame-vue3';
import {
    Button,
    TabGroup,
    TabList,
    Tab,
    TabPanel,
    DrawerSection,
    Sections,
} from '@macramejs/admin-vue3';
import { TabPanels } from '@headlessui/vue';
import { TextSection, CardsSection, UploadSection } from './sections';
import { TextDrawer, CardsDrawer } from './drawers';
import { Cabinet } from '@macramejs/page-builder-vue3';
import BaseLayout from './Index.vue';

const props = defineProps({
    site: {
        type: Object,
        required: true,
    },
});

const form = useForm(
    `/admin/sites/${props.site.id}`,
    {
        content: props.site.content,
    },
    { method: 'post' }
);

const sections = {
    text: TextSection,
    cards: CardsSection,
    // upload: UploadSection,
};
</script>
