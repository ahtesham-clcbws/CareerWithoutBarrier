<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

defineProps({
    // canResetPassword: {
    //     type: Boolean,
    // },
    status: {
        type: String,
    },
});

const form = useForm({
    rollno: '',
    remember: false,
});

const submit = () => {
    form.post(route('profile.searchresult'), {
        onFinish: () => form.reset('rollno'),
    });
};
</script>

<template>
        <Head title="Result" />
        <AuthenticatedLayout>
            <template #header>
        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>

        <form @submit.prevent="submit">
            <div>
                <InputLabel for="rollno" value="Roll No." />

                <TextInput
                    id="rollno"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.rollno"
                    required
                    autofocus
                    autocomplete="username"
                />

                <InputError class="mt-2" :message="form.errors.rollno" />
            </div>
            <div class="flex items-center justify-end mt-4">
        <PrimaryButton class="ms-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                   Search
                </PrimaryButton>
            </div>
        </form>
</template>
</AuthenticatedLayout>
</template>
