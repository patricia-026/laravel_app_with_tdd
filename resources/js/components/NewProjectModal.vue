<template>
    <!-- Main modal -->
<div id="new-project" tabindex="-1" aria-hidden="true"
    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative p-10 bg-card rounded-lg">
            <!-- Modal body -->

            <h1 class="text-default font-normal mb-16 text-center text-2xl">
                Let's Start Something New
            </h1>

            <form @submit.prevent="submit()">
            <div class="flex">
                <div class="flex-1 mr-4">
                    <div class="mb-4">
                        <label for="title" class="text-sm block mb-2">Title</label>
                        <input 
                            :key="form.errors.title"
                            type="text" 
                            id="title"
                            class="border-muted-light p-2 text-xs block w-full rounded bg-card text-default"
                            :class="form.errors.title ? 'border-error' : 'border-muted-light'"
                            v-model="form.title">

                            <span class="text-xs italic text-error" v-if="form.errors.title" v-text="form.errors.title[0]"></span>
                    </div>

                    <div class="mb-4">
                        <label for="description" class="text-sm block mb-2">Description</label>
                        <textarea id="description" class="border-muted-light p-2 text-xs block w-full rounded bg-card text-default"
                            rows="7" v-model="form.description"></textarea>

                            <span class="text-xs italic text-error" v-if="form.errors.description" v-text="form.errors.description[0]"></span>
                    </div>


                </div>

                <div class="flex-1 ml-4">
                    <div class="mb-4">
                        <label class="text-sm block mb-2">Need Some Tasks?</label>
                        <input
                        type="text"
                        class="border-muted-light mb-2 p-2 text-xs block w-full rounded bg-card text-default"
                        placeholder="New Task"
                        v-for="task in form.tasks"
                        v-model="task.body">
                    </div>

                    <button type="button" class="inline-flex items-center text-xs" @click="addTask()">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18"
                            class="mr-2">
                            <g fill="none" fill-rule="evenodd" opacity=".607">
                                <path stroke="#47cdff" stroke-opacity=".012" stroke-width="0" d="M-3-3h24v24H-3z"></path>
                                <path fill="#47cdff"
                                    d="M9 0a9 9 0 0 0-9 9c0 4.97 4.02 9 9 9A9 9 0 0 0 9 0zm0 16c-3.87 0-7-3.13-7-7s3.13-7 7-7 7 3.13 7 7-3.13 7-7 7zm1-11H8v3H5v2h3v3h2v-3h3V8h-3V5z">
                                </path>
                            </g>
                        </svg>

                        <span>Add New Task Field</span>
                    </button>

                </div>
            </div>
            

            <footer class="flex justify-end">
                <button type="button" data-modal-hide="new-project" class="button mr-4 is-outlined">Cancel</button>
                <button class="button">Create Project</button>
            </footer>
            </form>

        </div>
    </div>
</div>

</template>

<script setup>
import BirdboardForm from './BirdboardForm';
import { ref } from 'vue';

const form = ref(new BirdboardForm({
  title: '',
  description: '',
  tasks: [{ body: '' }],
}));

function addTask() {
  form.value.tasks.push({ body: '' });
}

async function submit() {
  if (!form.value.tasks[0].body) {
    delete form.value.originalData.tasks;
  }

  try {
    const response = await form.value.submit('/projects');
    location = response.data.message;
  } catch (error) {
    //console.error(error);
  }
}
</script>