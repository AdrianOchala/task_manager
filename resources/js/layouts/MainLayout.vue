<script setup>
import { ref } from 'vue';
import Header from '@Components/form/layout/Header.vue';
import DrawerContent from '@Components/form/layout/DrawerContent.vue';

const showMenu = ref(true)
const miniState = ref(true)

const toggleMenu = () => {
    showMenu.value = !showMenu.value
}
</script>

<template>
    <q-layout view="hHh LpR fff">
        <Header :toggle-menu="toggleMenu" />

        <q-drawer
            v-model="showMenu"
            show-if-above
            :mini="miniState"
            mini-to-overlay
            side="left"
            bordered
            @mouseover="miniState = false"
            @mouseout="miniState = true"
        >
            <DrawerContent />
        </q-drawer>
        <q-page-container>
            <router-view />
        </q-page-container>
    </q-layout>
</template>
