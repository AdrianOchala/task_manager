<script setup>
import { ref } from 'vue';

const menuList = ref([
    {
        icon: 'home',
        label: 'Home',
        to: {
            name: 'dashboard',
        },
        separator: false,
    },
    {
        icon: 'task',
        label: 'Tasks',
        to: {
            name: 'tasks',
        },
        separator: false,
    }
])
</script>

<template>
    <q-scroll-area class="fit">
       <q-list>
            <template v-for="(menuItem, index) in menuList" :key="index">
                <q-item
                    :id="menuItem.label"
                    v-ripple
                    clickable
                    :to="menuItem.to"
                >
                    <q-item-section avatar>
                        <q-icon :name="menuItem.icon" />
                    </q-item-section>
                    <q-item-section>
                        {{ menuItem.label }}
                    </q-item-section>
                </q-item>
                <q-separator v-if="menuItem.separator" :key="'sep' + index" />
          </template>
       </q-list>
    </q-scroll-area>
 </template>
