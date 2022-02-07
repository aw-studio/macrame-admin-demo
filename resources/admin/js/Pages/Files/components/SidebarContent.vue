<template>
    <div class="flex flex-col gap-1 p-2 border-b border-gray-400">
        <Link
            class="px-4 py-2 rounded-[8px] transition-colors duration-300 hover:bg-gray-100"
            href="#"
        >
            Images
        </Link>
        <Link
            class="px-4 py-2 rounded-[8px] transition-colors duration-300 hover:bg-gray-100"
            href="#"
        >
            Documents
        </Link>
        <Link
            class="px-4 py-2 rounded-[8px] transition-colors duration-300 hover:bg-gray-100"
            href="#"
        >
            Videos
        </Link>
    </div>
    <div class="flex flex-col gap-1 p-2 border-b border-gray-400">
        <div class="flex items-center gap-3 px-5 pt-16 pb-6 -mx-2">
            <svg
                width="24"
                height="24"
                stroke-width="1"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
            >
                <path
                    d="M21 7.6v12.8a.6.6 0 0 1-.6.6H7.6a.6.6 0 0 1-.6-.6V7.6a.6.6 0 0 1 .6-.6h12.8a.6.6 0 0 1 .6.6Z"
                    stroke="currentColor"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                />
                <path
                    d="M18 4H4.6a.6.6 0 0 0-.6.6V18M7 16.8l5.444-1.8L21 18M16.5 13a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3Z"
                    stroke="currentColor"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                />
            </svg>
            <span class="inline-block text-xl"> Galleries </span>
            <button
                class="inline-flex items-center justify-center ml-auto text-white rounded-full h-9 w-9 bg-gradient-to-r from-indigo-900 focus:outline-none focus:ring-4 focus:ring-orange-100 active:from-indigo-500 active:to-indigo-500 to-indigo-900 hover:from-gradient-red-500 hover:to-gradient-orange-500"
            >
                <svg
                    width="24"
                    height="24"
                    stroke-width="1"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                >
                    <path
                        d="M6 12h6m6 0h-6m0 0V6m0 6v6"
                        stroke="currentColor"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    />
                </svg>
            </button>
        </div>
    </div>
    <div class="flex flex-col gap-1 p-2 border-b border-gray-400">
        <Link
            class="px-4 py-2 rounded-[8px] transition-colors duration-300 hover:bg-gray-100"
            href="#"
        >
            Product Images
        </Link>
        <Link
            class="px-4 py-2 rounded-[8px] transition-colors duration-300 hover:bg-gray-100"
            href="#"
        >
            Mood Images
        </Link>
    </div>
    <div class="flex flex-col gap-1 p-2 border-b border-gray-400">
        <div class="flex items-center gap-3 px-5 pt-16 pb-6 -mx-2">
            <svg
                width="24"
                stroke-width="1"
                height="24"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
            >
                <path
                    d="M5 19.5V5a2 2 0 0 1 2-2h11.4a.6.6 0 0 1 .6.6V21M9 7h6M6.5 15H19M6.5 18H19M6.5 21H19"
                    stroke="currentColor"
                    stroke-linecap="round"
                />
                <path
                    d="M6.5 18c-1 0-1.5-.672-1.5-1.5S5.5 15 6.5 15M6.5 21c-1 0-1.5-.672-1.5-1.5S5.5 18 6.5 18"
                    stroke="currentColor"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                />
            </svg>
            <span class="inline-block text-xl"> Collections </span>
            <button
                class="inline-flex items-center justify-center ml-auto text-white rounded-full h-9 w-9 bg-gradient-to-r from-indigo-900 focus:outline-none focus:ring-4 focus:ring-orange-100 active:from-indigo-500 active:to-indigo-500 to-indigo-900 hover:from-gradient-red-500 hover:to-gradient-orange-500"
            >
                <svg
                    width="24"
                    height="24"
                    stroke-width="1"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                >
                    <path
                        d="M6 12h6m6 0h-6m0 0V6m0 6v6"
                        stroke="currentColor"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    />
                </svg>
            </button>
        </div>
    </div>
    <div class="flex flex-col gap-1 p-2 border-b border-gray-400">
        <Link
            class="px-4 py-2 rounded-[8px] transition-colors duration-300 hover:bg-gray-100"
            href="#"
        >
            Starter Kit
        </Link>
        <Link
            class="px-4 py-2 rounded-[8px] transition-colors duration-300 hover:bg-gray-100"
            href="#"
        >
            Event Files
        </Link>
    </div>
</template>

<script lang="ts" setup>
import { Link } from '@inertiajs/inertia-vue3';
</script>
