<script setup>
import GuestLayout from "@/Layouts/GuestLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, useForm } from "@inertiajs/vue3";

defineProps({
  status: String,
});

const form = useForm({
  email: "",
  password: "",
  remember: false,
});

const submit = () => {
  form.post(route("login"), {
    onFinish: () => form.reset("password"),
  });
};
</script>

<template>
  <GuestLayout>
    <Head title="Login - Rafael Franchini" />

    <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
      {{ status }}
    </div>

    <form role="form" class="text-start" @submit.prevent="submit">
      <div>
        <InputLabel for="email" value="E-mail" />

        <TextInput
          id="email"
          type="email"
          class="mt-1 block w-full"
          v-model="form.email"
          required
          autofocus
          autocomplete="username"
        />

        <InputError class="mt-2" :message="form.errors.email" />
      </div>

      <div class="mt-3">
        <InputLabel for="password" value="Senha" />

        <TextInput
          id="password"
          type="password"
          class="mt-1 block w-full"
          v-model="form.password"
          required
          autocomplete="current-password"
        />

        <InputError class="mt-2" :message="form.errors.password" />
      </div>

      <div class="form-check form-switch d-flex align-items-center mb-3 mt-3">
        <input
          class="form-check-input"
          type="checkbox"
          id="rememberMe"
          name="remember"
          :v-model:checked="form.remember"
        />
        <label class="form-check-label mb-0 ms-3" for="rememberMe"
          >Lembrar</label
        >
      </div>

      <div class="text-center">
        <PrimaryButton
          :class="{ 'opacity-25': form.processing }"
          :disabled="form.processing"
        >
          Acessar
        </PrimaryButton>
      </div>
    </form>
  </GuestLayout>
</template>
