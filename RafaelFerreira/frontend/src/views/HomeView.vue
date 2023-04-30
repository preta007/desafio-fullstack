
<template>
  <div class="container">
      <div class="d-flex align-items-center justify-content-between p-3 my-3 text-white-50 rounded shadow-sm bg-purple">
        <img src="../assets/logo.svg" alt="" width="48" height="48">
        <div class="d-flex flex-column align-items-center">
          <h6 class="mb-0 text-white lh-100">Rafael Ferreira</h6>
          <small>Desafio fullstack sub100</small>
        </div>
        <div class="d-flex flex-column">
          Bem-vindo: Rafael Ferreira
          <Button label="Sair" severity="danger" icon="pi pi-power-off" @click="logout()" />
        </div>
    </div>

    <div class="my-3 p-3 bg-white rounded shadow-sm">
      <Button label="Adicionar" @click="addProduto()" icon="pi pi-plus" />
    </div>

    <div class="my-3 p-3 bg-white rounded shadow-sm">
        <h6 class="border-bottom border-gray pb-2 mb-0">
          <i class="pi pi-list"></i>
          Lista de usuários
        </h6>
        <DataTable :value="products" stripedRows tableStyle="min-width: 50rem">
          <Column field="code" header="Code"></Column>
          <Column field="name" header="Name"></Column>
          <Column field="category" header="Category"></Column>
          <Column field="category" header="Quantity"></Column>
        </DataTable>

    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import { useRouter } from 'vue-router'

import Button from 'primevue/button';
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';

const router = useRouter();

const products = ref([
        {
          "code": "1",
          "name": "Rafael",
          "category": "Teste",
          "category": "Outro"
        }
      ])

function logout(){
  router.push({name: 'login'})
}

</script>