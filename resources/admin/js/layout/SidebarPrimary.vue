<template>
    <SidebarPrimary>
        <template v-slot:logo>
            <Logo class="pl-0.5" />
        </template>
        <template v-slot="{ expanded }">
            <SidebarSection :expanded="expanded" title="Website">
                <SidebarLink
                    title="Seiten"
                    :expanded="expanded"
                    href="/admin/pages"
                >
                    <svg
                        width="24"
                        height="24"
                        stroke-width="1.5"
                        viewBox="0 0 24 24"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                        class="w-5 h-5"
                    >
                        <path
                            d="M7 2L16.5 2L21 6.5V19"
                            stroke="currentColor"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        />
                        <path
                            d="M3 20.5V6.5C3 5.67157 3.67157 5 4.5 5H14.2515C14.4106 5 14.5632 5.06321 14.6757 5.17574L17.8243 8.32426C17.9368 8.43679 18 8.5894 18 8.74853V20.5C18 21.3284 17.3284 22 16.5 22H4.5C3.67157 22 3 21.3284 3 20.5Z"
                            stroke="currentColor"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        />
                        <path
                            d="M14 8.4V5.35355C14 5.15829 14.1583 5 14.3536 5C14.4473 5 14.5372 5.03725 14.6036 5.10355L17.8964 8.39645C17.9628 8.46275 18 8.55268 18 8.64645C18 8.84171 17.8417 9 17.6464 9H14.6C14.2686 9 14 8.73137 14 8.4Z"
                            fill="currentColor"
                            stroke="currentColor"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        />
                    </svg>
                </SidebarLink>
                <SidebarLink
                    title="Files"
                    :expanded="expanded"
                    href="/admin/files"
                >
                    <svg
                        width="24"
                        height="24"
                        stroke-width="1"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            d="M22 12.6v7.8a.6.6 0 0 1-.6.6h-7.8a.6.6 0 0 1-.6-.6v-7.8a.6.6 0 0 1 .6-.6h7.8a.6.6 0 0 1 .6.6ZM19.5 14.51l.01-.011"
                            class="stroke-current"
                            :class="{
                                '!stroke-red-500':
                                    page.includes('/admin/files'),
                            }"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        />
                        <path
                            d="m13 18.2 3.5-1.2 5.5 2M2 10V3.6a.6.6 0 0 1 .6-.6h6.178a.6.6 0 0 1 .39.144l3.164 2.712a.6.6 0 0 0 .39.144H21.4a.6.6 0 0 1 .6.6V9M2 10v8.4a.6.6 0 0 0 .6.6H10m-8-9h8"
                            class="stroke-current"
                            :class="{
                                '!stroke-red-500':
                                    page.includes('/admin/files'),
                            }"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        />
                    </svg>
                </SidebarLink>
                <SidebarLink
                    title="Komponenten"
                    :expanded="expanded"
                    href="/admin/components"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="-5 -5 24 24"
                        width="24"
                        class="w-5 h-5 fill-gray-800"
                        :class="{
                            'fill-red-500': page.includes('/admin/components'),
                        }"
                    >
                        <path
                            d="M2,6 L6,6 L6,2 L2,2 L2,6 Z M2,8 L2,12 L6,12 L6,8 L2,8 Z M12,6 L12,2 L8,2 L8,6 L12,6 Z M12,8 L8,8 L8,12 L12,12 L12,8 Z M2,0 L12,0 C13.1045695,0 14,0.8954305 14,2 L14,12 C14,13.1045695 13.1045695,14 12,14 L2,14 C0.8954305,14 0,13.1045695 0,12 L0,2 C0,0.8954305 0.8954305,0 2,0 Z"
                        ></path>
                    </svg>
                </SidebarLink>
            </SidebarSection>
            <SidebarSection :expanded="expanded" title="Anderes">
                <SidebarLink title="Seiten" :expanded="expanded" href="#">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="-2 -4 24 24"
                        class="w-5 h-5 fill-black"
                    >
                        <path
                            d="M2,4 L2,14 L18,14 L18,4 L2,4 Z M3,3 C3.55228475,3 4,2.55228475 4,2 C4,1.44771525 3.55228475,1 3,1 C2.44771525,1 2,1.44771525 2,2 C2,2.55228475 2.44771525,3 3,3 Z M6,3 C6.55228475,3 7,2.55228475 7,2 C7,1.44771525 6.55228475,1 6,1 C5.44771525,1 5,1.44771525 5,2 C5,2.55228475 5.44771525,3 6,3 Z M2,0 L18,0 C19.1045695,0 20,0.8954305 20,2 L20,14 C20,15.1045695 19.1045695,16 18,16 L2,16 C0.8954305,16 0,15.1045695 0,14 L0,2 C0,0.8954305 0.8954305,0 2,0 Z"
                        ></path>
                    </svg>
                </SidebarLink>
            </SidebarSection>
        </template>
    </SidebarPrimary>
</template>

<script lang="ts" setup>
import { usePage } from '@inertiajs/inertia-vue3';
import {
    SidebarSection,
    SidebarLink,
    SidebarPrimary,
} from '@macramejs/admin-vue3';
import { computed } from 'vue';
import Logo from './Logo.vue';

defineProps({
    expanded: {
        type: Boolean,
        default: false,
    },
});

const page = computed(() => {
    return usePage().url.value;
});
</script>
