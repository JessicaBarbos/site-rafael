<template>
  <aside
    class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-gradient-dark"
    id="sidenav-main"
  >
    <div class="sidenav-header">
      <i
        class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
        aria-hidden="true"
        id="iconSidenav"
      ></i>
      <a
        class="navbar-brand m-0"
        href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard "
        target="_blank"
      >
        <!-- <img
              src="../assets/img/logo-ct.png"
              class="navbar-brand-img h-100"
              alt="main_logo"
            /> -->
        <span class="ms-1 font-weight-bold text-white">Rafael Franchini</span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2" />
    <div class="navbar-collapse w-auto" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a
            class="nav-link text-white"
            href="/dashboard"
            @click="this.$emit('visible')"
            :class="
              $page.url === '/dashboard' ? 'active bg-gradient-primary' : ''
            "
          >
            <div
              class="text-white text-center me-2 d-flex align-items-center justify-content-center"
            >
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a
            class="nav-link text-white"
            href="/clientes"
            @click="this.$emit('visible')"
            :class="
              $page.url === '/clientes' ? 'active bg-gradient-primary' : ''
            "
          >
            <div
              class="text-white text-center me-2 d-flex align-items-center justify-content-center"
            >
              <i class="material-icons opacity-10">group</i>
            </div>
            <span class="nav-link-text ms-1">Clientes</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="#">
            <div
              class="text-white text-center me-2 d-flex align-items-center justify-content-center"
            >
              <i class="material-icons opacity-10">real_estate_agent</i>
            </div>
            <span class="nav-link-text ms-1">Imóveis</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-white" href="#">
            <div
              class="text-white text-center me-2 d-flex align-items-center justify-content-center"
            >
              <i class="material-icons opacity-10">notifications</i>
            </div>
            <span class="nav-link-text ms-1">Notificações</span>
          </a>
        </li>
        <li class="nav-item mt-3">
          <h6
            class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8"
          >
            Conta
          </h6>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="../pages/profile.html">
            <div
              class="text-white text-center me-2 d-flex align-items-center justify-content-center"
            >
              <i class="material-icons opacity-10">person</i>
            </div>
            <span class="nav-link-text ms-1">Perfil</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="../pages/sign-up.html">
            <div
              class="text-white text-center me-2 d-flex align-items-center justify-content-center"
            >
              <i class="material-icons opacity-10">assignment</i>
            </div>
            <span class="nav-link-text ms-1">Inscrever</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" :href="route('logout')">
            <div
              class="text-white text-center me-2 d-flex align-items-center justify-content-center"
            >
              <i class="material-icons opacity-10">logout</i>
            </div>
            <span class="nav-link-text ms-1">Sair</span>
          </a>
        </li>
      </ul>
    </div>
  </aside>
</template>

<script>
export default {
  data() {
    return {
      url: "",
    };
  },
};
</script>

<style>
</style>