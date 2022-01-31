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
                    title="Schiffe"
                    :expanded="expanded"
                    href="/admin/ships"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="-2 -2 24 24"
                        width="24"
                        class="w-5 h-5 fill-gray-800"
                        :class="{
                            'fill-red-500': page.includes('/admin/ships'),
                        }"
                    >
                        <path
                            d="M16.93 11.998A1 1 0 0 1 17 10h2a1 1 0 0 1 0 2h-.055a9.001 9.001 0 0 1-17.89 0H1a1 1 0 0 1 0-2h2a1 1 0 0 1 .07 1.998A7.005 7.005 0 0 0 9 17.929V7.874A4.002 4.002 0 0 1 10 0a4 4 0 0 1 1 7.874v10.055a7.005 7.005 0 0 0 5.93-5.931zM10 6a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"
                        ></path>
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
