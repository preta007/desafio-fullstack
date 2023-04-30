
<template>
  <div class="container">
      <div class="d-flex align-items-center p-3 my-3 text-white-50 rounded shadow-sm bg-purple">
        <img src="../assets/logo.svg" alt="" width="48" height="48" style="margin-right: 10px;">
        <div class="lh-100">
          <h6 class="mb-0 text-white lh-100">Rafael Ferreira</h6>
          <small>Desafio fullstack sub100</small>
        </div>
    </div>

    <div class="my-3 p-3 bg-white rounded shadow-sm">
      <Button label="Adicionar" icon="pi pi-plus" />
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

<script>
import Button from 'primevue/button';
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';

export default{
  components: {
    Button,
    DataTable,
    Column
  },
  data() {
    return {
      products: [
        {
          "code": "1",
          "name": "Rafael",
          "category": "Teste",
          "category": "Outro"
        }
      ]
    }
  },
}
</script>