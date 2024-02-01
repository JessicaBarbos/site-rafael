<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
import ModalUser from "./modal/CreateUser.vue";

defineProps({
  clientes: Object,
});

const columns = [
  { field: "codigo", header: "Código" },
  { field: "nome", header: "Nome" },
];
</script>

<template>
  <Head title="Clientes" />

  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Clientes
      </h2>
    </template>

    <div class="py-1">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-10"></div>
            <div class="col-2">
              <button
                class="btn bg-gradient-dark mb-0"
                data-bs-toggle="modal"
                data-bs-target="#ModalCliente"
              >
                <i class="material-icons text-sm opacity-10">add</i
                >&nbsp;&nbsp;Novo Cliente
              </button>
            </div>
          </div>
          <div class="row mt-5">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th
                      class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                    >
                      Código
                    </th>
                    <th
                      class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"
                    >
                      Nome
                    </th>
                    <!-- <th
                      class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                    >
                      Ações
                    </th> -->

                    <th class="text-secondary opacity-7"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="cliente in clientes" :key="cliente.id">
                    <td>
                      <!-- <p class="text-xs font-weight-bold mb-0">Manager</p> -->
                      <p class="text-xs text-secondary mb-0">
                        {{ cliente.codigo }}
                      </p>
                    </td>
                    <td>
                      <div class="d-flex px-2 py-1">
                        <div></div>
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm">{{ cliente.nome }}</h6>
                          <p class="text-xs text-secondary mb-0">
                            john@creative-tim.com
                          </p>
                        </div>
                      </div>
                    </td>
                    <!-- <td class="align-middle">
                      <a
                        href="javascript:;"
                        class="text-secondary font-weight-bold text-xs"
                        data-toggle="tooltip"
                        data-original-title="Edit user"
                      >
                        Edit
                      </a>
                    </td> -->
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

    <ModalUser @onSubmitForm="onStore($event)" />
  </AuthenticatedLayout>
</template>
