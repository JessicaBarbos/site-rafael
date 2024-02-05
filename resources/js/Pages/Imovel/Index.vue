<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
import Swal from "sweetalert2";

defineProps({
  imoveis: Object,
});

const columns = [
  { field: "codigo", header: "Código" },
  { field: "nome", header: "Nome" },
  { field: "tipo", header: "Tipo" },
];

const deleteImovel = (id) => {
  if (id) {
    axios
      .delete("/imoveis/" + id)
      .then((response) => {
        // Handle success
        if (response.data.status == true) {
          console.log("net");
          Swal.fire({
            title: "Uhul!",
            text: response.data.message,
            icon: "success",
          });
        } else {
          Swal.fire({
            title: "Ops!",
            text: response.data.message,
            icon: "error",
          });
        }
      })
      .catch((error) => {
        Swal.fire({
          title: "Ops!",
          text: "Contate o Administrador",
          icon: "error",
        });
      });
  }
};
</script>

<template>
  <Head title="Imóveis" />

  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Imóveis</h2>
    </template>

    <div class="py-1">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-10"></div>
            <div class="col-2">
              <a href="/imoveis/novo" class="btn bg-gradient-dark mb-0">
                <i class="material-icons text-sm opacity-10">add</i
                >&nbsp;&nbsp;Novo Imóvel
              </a>
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
                    <th
                      class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"
                    >
                      Tipo
                    </th>
                    <th
                      class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                    >
                      Ações
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="imovel in imoveis" :key="imovel.id">
                    <td>
                      <p class="text-xs text-secondary mb-0">
                        {{ imovel.codigo }}
                      </p>
                    </td>
                    <td>
                      <div class="d-flex px-2 py-1">
                        <div></div>
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm">{{ imovel.nome }}</h6>
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-2 py-1">
                        <div></div>
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm">
                            {{
                              imovel.tipo === "C"
                                ? "Casa"
                                : imovel.tipo === "AP"
                                ? "Apartamento"
                                : "Terreno"
                            }}
                          </h6>
                        </div>
                      </div>
                    </td>
                    <td class="align-middle">
                      <a
                        class="btn btn-link text-secondary mb-0"
                        :href="'/imoveis/edit/' + imovel.id"
                      >
                        <i class="material-icons opacity-10">edit</i>
                      </a>
                      <a
                        class="btn btn-link text-secondary mb-0"
                        @click="deleteImovel(imovel.id)"
                      >
                        <i class="material-icons opacity-10">delete</i>
                      </a>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
