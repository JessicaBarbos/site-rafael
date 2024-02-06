<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, useForm } from "@inertiajs/vue3";
import { onMounted, defineProps } from "vue";

const props = defineProps({
  imagePreview: { type: String, default: null },
  imageUrl: { type: String, default: null },
  imovel: String, // Define imovel prop here
});
const form = useForm({
  id: props.imovel?.id,
  codigo: props.imovel?.codigo,
  nome: props.imovel?.nome,
  tipo: props.imovel?.tipo,
  descricao: props.imovel?.descricao,
  cep: props.imovel?.cep,
  estado: props.imovel?.estado,
  cidade: props.imovel?.cidade,
  bairro: props.imovel?.bairro,
  endereco: props.imovel?.endereco,
  numero: props.imovel?.numero,
  telefone: props.imovel?.telefone,
  excluido: props.imovel?.excluido,
  id_user_create: props.imovel?.id_user_create,
  id_user_update: props.imovel?.id_user_update,
  created_at: props.imovel?.created_at,
  updated_at: props.imovel?.updated_at,
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

const openFileInput = () => {
  this.$refs.fileInput.click();
};

const handleFileChange = (event) => {
  const file = event.target.files[0];
  this.formFuncionario.foto = event.target.files[0];
  if (file) {
    const reader = new FileReader();
    reader.onload = (e) => {
      this.imagePreview = e.target.result;
    };
    reader.readAsDataURL(file);
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
                <div class="col-md-12">
                  <div class="media mb-2">
                    <img
                      v-if="fotoPerfil"
                      :src="`data:image/jpeg;base64,${fotoPerfil}`"
                      class="users-avatar-shadow rounded notranslate"
                      alt="Imagem Perfil"
                      height="90"
                      width="90"
                      style="cursor: pointer"
                      @click="openFileInput"
                    />
                    <img
                      v-else
                      :src="imagePreview || imageUrl"
                      class="users-avatar-shadow rounded notranslate"
                      alt="Imagem Perfil"
                      height="90"
                      width="90"
                      @click="openFileInput"
                      style="cursor: pointer"
                    />
                    <input
                      ref="fileInput"
                      type="file"
                      class="form-control"
                      style="display: none"
                      @change="handleFileChange"
                      accept=".jpg, .jpeg, .png"
                    />
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
