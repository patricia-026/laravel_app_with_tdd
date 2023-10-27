import './bootstrap';
import 'flowbite';
import { createApp } from 'vue';
import ThemeSwitcher from './components/ThemeSwitcher.vue';

createApp({})
    .component('ThemeSwitcher', ThemeSwitcher)
    .mount('#app')