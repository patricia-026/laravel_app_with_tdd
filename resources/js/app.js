import './bootstrap';
import 'flowbite';
import { createApp } from 'vue';
import ThemeSwitcher from './components/ThemeSwitcher.vue';
import NewProjectModal from './components/NewProjectModal.vue';

createApp({})
    .component('ThemeSwitcher', ThemeSwitcher)
    .component('NewProjectModal', NewProjectModal)
    .mount('#app')