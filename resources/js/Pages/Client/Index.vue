<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
import DataTable from "primevue/datatable";
import Column from "primevue/column";
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
      <div class="card card-frame">
        <div class="card-body">
          <DataTable
            :value="clientes"
            paginator
            :rows="5"
            :rowsPerPageOptions="[5, 10, 20, 50]"
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
  </AuthenticatedLayout>
</template>
