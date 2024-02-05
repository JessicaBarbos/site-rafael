<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, useForm } from "@inertiajs/vue3";
import { onMounted } from "vue";

const { imovel } = defineProps(["imovel"]);

const form = useForm({
  id: imovel?.id,
  codigo: imovel?.codigo,
  nome: imovel?.nome,
  tipo: imovel?.tipo,
  descricao: imovel?.descricao,
  cep: imovel?.cep,
  estado: imovel?.estado,
  cidade: imovel?.cidade,
  bairro: imovel?.bairro,
  endereco: imovel?.endereco,
  numero: imovel?.numero,
  telefone: imovel?.telefone,
  excluido: imovel?.excluido,
  id_user_create: imovel?.id_user_create,
  id_user_update: imovel?.id_user_update,
  created_at: imovel?.created_at,
  updated_at: imovel?.updated_at,
});

onMounted(() => {
  resetForm();
  initFormValidation();
});

const resetForm = () => {
  form.reset();
};

const initFormValidation = () => {
  const forms = document.querySelectorAll(".needs-validation");

  Array.from(forms).forEach((form) => {
    form.addEventListener("submit", (event) => {
      validateForm(event, form);
    });
  });
};

const handlePreSubmit = (form) => {
  if (!form.checkValidity()) {
    event.preventDefault();
    event.stopPropagation();
  }

  form.classList.add("was-validated");
};

const validateForm = (event, form) => {
  handlePreSubmit(form);
};

const submit = () => {
  if (imovel) {
    form.patch(`/imoveis/${imovel.id}`),
      {
        onFinish: resetForm,
      };
  } else {
    form.post("/imoveis"),
      {
        onFinish: resetForm,
      };
  }
};
</script>

<template>
  <Head title="Novo Imóvel" />

  <AuthenticatedLayout>
    <template #header>
      <h2
        class="font-semibold text-xl text-gray-800 leading-tight"
        v-if="imovel"
      >
        Edição de Imóveis
      </h2>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight" v-else>
        Cadastro de Imóveis
      </h2>
    </template>

    <div class="py-1">
      <div class="card">
        <div class="container">
          <div class="row">
            <div class="col">
              <form
                class="row g-3 needs-validation"
                novalidate
                @submit.prevent="submit"
              >
                <div class="col-md-4">
                  <label for="codigo" class="form-label">Código</label>
                  <input
                    type="text"
                    class="form-control"
                    id="codigo"
                    value=""
                    required
                    v-model="form.codigo"
                    :class="form.errors.codigo ? 'is-invalid' : ''"
                  />
                  <div class="invalid-feedback" v-if="form.errors.codigo">
                    {{ form.errors.codigo ?? "O campo Código é obrigatório" }}
                  </div>
                </div>

                <div class="col-md-4">
                  <label for="nome" class="form-label">Nome</label>
                  <input
                    type="text"
                    class="form-control"
                    id="nome"
                    value="Mark"
                    required
                    v-model="form.nome"
                    :class="form.errors.nome ? 'is-invalid' : ''"
                  />
                  <div class="invalid-feedback" v-if="form.errors.nome">
                    {{ form.errors.nome ?? "O campo Nome é obrigatório" }}
                  </div>
                </div>

                <div class="col-md-3">
                  <label for="tipo" class="form-label">Tipo</label>
                  <select
                    class="form-select"
                    id="tipo"
                    required
                    v-model="form.tipo"
                    :class="form.errors.nome ? 'is-invalid' : ''"
                  >
                    <option selected disabled value="">Selecionar...</option>
                    <option value="AP">Apartamento</option>
                    <option value="C">Casa</option>
                    <option value="T">Terreno</option>
                  </select>
                  <div class="invalid-feedback">
                    Por favor selecione o tipo.
                  </div>
                </div>

                <div class="col-12">
                  <button
                    class="btn bg-success"
                    type="submit"
                    style="color: azure"
                    v-if="imovel"
                  >
                    Atualizar</button
                  ><button
                    class="btn bg-success"
                    type="submit"
                    style="color: azure"
                    v-else
                  >
                    Cadastrar
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
