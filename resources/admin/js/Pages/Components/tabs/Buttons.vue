<template>
    <div class="p-10">
        <h2>Buttons</h2>
        <div>
            <Button primary class="m-2" href="#">Foo</Button>
            <br />
            <Button primary disabled class="m-2" href="#">Foo</Button>
            <br />
            <Button secondary class="m-2" href="#">Foo</Button>
            <br />
            <Button secondary disabled class="m-2" href="#">Foo</Button>
            <br />
            <Button small class="m-2" href="#">Foo</Button>
            <br />
            <Button small disabled class="m-2" href="#">Foo</Button>
            <br />
            <Button text class="m-2" href="#">Foo</Button>
            <br />
            <Button text disabled class="m-2" href="#">Foo</Button>
            <br />
            <Button primary square class="m-2">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24"
                    class="w-5 h-5 fill-current"
                >
                    <path fill="none" d="M0 0h24v24H0z" />
                    <path
                        d="M12 13.172l4.95-4.95 1.414 1.414L12 16 5.636 9.636 7.05 8.222z"
                    />
                </svg>
            </Button>
            <br />
            <Button size="sm" secondary square class="m-2">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24"
                    class="w-3 h-3 fill-current"
                >
                    <path fill="none" d="M0 0h24v24H0z" />
                    <path
                        d="M12 13.172l4.95-4.95 1.414 1.414L12 16 5.636 9.636 7.05 8.222z"
                    />
                </svg>
            </Button>
            <br />
        </div>
    </div>
</template>

<script lang="ts" setup>
import { Button } from '@macramejs/admin-vue3';
</script>
