<script setup>
import { RouterView } from 'vue-router';

</script>

<template>
    <q-layout class="bg-grey-8">
        <q-page-container>
            <q-page class="flex items-center justify-center">
                <router-view />
            </q-page>
        </q-page-container>
    </q-layout>
</template>
