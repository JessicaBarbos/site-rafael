<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
import DataTable from "primevue/datatable";
import Column from "primevue/column";
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
                type="button"
                class="btn bg-gradient-info d-flex justify-content-end"
                data-bs-toggle="modal"
                data-bs-target="#ModalCliente"
              >
                <i class="material-icons opacity-10">person_add</i>
              </button>
            </div>
          </div>
          <DataTable
            :value="clientes"
            paginator
            :rows="5"
            :rowsPerPageOptions="[10, 20, 50]"
            tableStyle="min-width: 50rem"
            paginatorTemplate="RowsPerPageDropdown FirstPageLink PrevPageLink CurrentPageReport NextPageLink LastPageLink"
            currentPageReportTemplate="{first} de {last} até {totalRecords}"
            :sortOrder="-1"
            removableSort
          >
            <Column
              v-for="col of columns"
              :key="col.field"
              :field="col.field"
              :header="col.header"
              sortable
            ></Column>
          </DataTable>
        </div>
      </div>
    </div>

    <ModalUser @onSubmitForm="onStore($event)" />
  </AuthenticatedLayout>
</template>
