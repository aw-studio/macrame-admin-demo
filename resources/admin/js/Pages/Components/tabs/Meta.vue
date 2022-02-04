<template>
    <TabPanel>
        <div class="p-10">
            <span class="inline-block pb-8 text-xl font-medium">
                Meta Informationen
            </span>
            <div class="grid grid-cols-12 gap-6">
                <div class="col-span-full md:col-span-9">
                    <Card class="flex flex-col gap-5">
                        <FormField no-label>
                            <Input
                                class="w-full"
                                label="Title"
                                v-model="meta.title"
                            />
                        </FormField>
                        <FormField>
                            <FormFieldLabel>Beschreibung</FormFieldLabel>
                            <Textarea
                                placeholder="Description"
                                v-model="meta.description"
                            />
                        </FormField>
                        <FormField>
                            <FormFieldLabel>Keywords</FormFieldLabel>
                            <Textarea
                                placeholder="Keywords"
                                v-model="meta.keywords"
                            />
                        </FormField>
                        <div class="mt-4 max-w-[600px]">
                            <span class="inline-block pb-4 text-lg">
                                Vorschau:
                            </span>
                            <div class="text-base flex text-[#202124] gap-1">
                                <span class="inline-block">
                                    {{ location }}
                                </span>
                                <span class="inline-block">› ...</span>
                            </div>
                            <div class="text-[20px] text-[#1a0dab]">
                                {{ meta.title }}
                            </div>
                            <div class="text-base text-[#4d5156]">
                                {{ descriptionPreview }}
                            </div>
                        </div>
                    </Card>
                </div>
                <div class="col-span-full md:col-span-9">
                    <Card class="flex flex-col gap-5">
                        <!--<FormField hint="Open Graph Image">
                            <FormFieldLabel>OG Image</FormFieldLabel>
                            <input
                                type="file"
                                accept="image/*"
                                class="w-full"
                                @input="setImage"
                            />
                            <FileUpload
                                accept="image/*"
                                v-model="meta.og.image"
                            />
                        </FormField>-->
                        <FormField hint="Open Graph Title" no-label>
                            <Input
                                class="w-full"
                                label="OG Title"
                                v-model="meta.og.title"
                            />
                        </FormField>
                        <FormField hint="Open Graph Description">
                            <FormFieldLabel>OG Beschreibung</FormFieldLabel>
                            <Textarea
                                placeholder="Description"
                                v-model="meta.og.description"
                            />
                        </FormField>
                        <FormField hint="Open Graph Type" no-label>
                            <Input
                                class="w-full"
                                label="OG Type"
                                v-model="meta.og.type"
                            />
                        </FormField>
                        <FormField hint="Open Graph URL" no-label>
                            <Input
                                class="w-full"
                                label="OG URL"
                                v-model="meta.og.url"
                            />
                        </FormField>
                        <FormField hint="Open Graph Site Name" no-label>
                            <Input
                                class="w-full"
                                label="OG Site Name"
                                v-model="meta.og.site_name"
                            />
                        </FormField>
                    </Card>
                </div>
            </div>
        </div>
    </TabPanel>
</template>

<script lang="ts" setup>
import { computed, reactive } from 'vue';
import {
    TabPanel,
    DrawerSection,
    Card,
    FormField,
    FormFieldLabel,
    Drawer,
    Input,
    Textarea,
} from '@macramejs/admin-vue3';

const location = window.location.origin;

const setImage = event => {
    console.log(event.target.files[0]);

    meta.og.image = event.target.files[0].name;
};

const descriptionPreview = computed(() => {
    if (meta.description?.length > 160) {
        let trimmedString = meta.description?.substr(0, 160).substr(0, 160);
        //re-trim if we are in the middle of a word
        trimmedString = trimmedString.substr(
            0,
            Math.min(trimmedString.length, trimmedString.lastIndexOf(' '))
        );
        return `${trimmedString} \u2026`;
    }
    return meta.description;
});

const meta = reactive({
    title: null,
    description: null,
    keywords: null,
    og: {
        title: null,
        description: null,
        image: null,
        type: null,
        url: null,
        site_name: null,
    },
});
</script>
