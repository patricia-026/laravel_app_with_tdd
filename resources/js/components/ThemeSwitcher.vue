<template>
  <div class="flex items-center mr-8">
    <button v-for="(color, theme) in themes"
    class="rounded-full w-4 h-4 border mr-2 focus:outline-none"
    :class="{ 'border-accent': selectedTheme == theme}"
    :style="{ backgroundColor: color}"
    @click="selectedTheme = theme"
    ></button>

  </div>
</template>

<script setup>
import { ref, watch } from 'vue'

let selectedTheme = ref('theme-light');
const themes = {
  'theme-light': '#f5f6f9',
  'theme-dark' : '#222'
};

const savedTheme = localStorage.getItem('theme');
if(savedTheme) {
  selectedTheme.value = savedTheme;
}

watch(
    selectedTheme,
    (selectedTheme) => {
        document.body.className = document.body.className.replace(
            /theme-\w+/,
            selectedTheme,
        );

        localStorage.setItem('theme', selectedTheme);
        
    },
    { immediate: true },
);
</script> 
