
<template>
  <div class="container">
      <div class="d-flex align-items-center justify-content-between p-3 my-3 text-white-50 rounded shadow-sm bg-purple">
        <img src="../assets/logo.svg" alt="" width="48" height="48">
        <div class="d-flex flex-column align-items-center">
          <h6 class="mb-0 text-white lh-100">Rafael Ferreira</h6>
          <small>Desafio fullstack sub100</small>
        </div>
        <div class="d-flex flex-column">
          Bem-vindo: {{ user.name }}
          <Button label="Sair" severity="danger" icon="pi pi-power-off" @click="logout()" />
        </div>
    </div>

    <div class="my-3 p-3 bg-white rounded shadow-sm">
      <Button label="Adicionar" @click="newUser()" icon="pi pi-plus" />
    </div>

    <div class="my-3 p-3 bg-white rounded shadow-sm">
        <h6 class="border-bottom border-gray pb-2 mb-0">
          <i class="pi pi-list"></i>
          Lista de usuários
        </h6>
        <DataTable :value="users" stripedRows tableStyle="min-width: 50rem" :loading="isLoading">
          <Column field="id" header="ID"></Column>
          <Column field="name" header="Nome"></Column>
          <Column field="email" header="Email"></Column>
          <Column field="city" header="Cidade"></Column>
          <Column header="Opções" :exportable="false">
            <template #body="slotProps">
                <Button icon="pi pi-pencil" outlined rounded class="mr-2" @click="editProduct(slotProps.data)" />
                <Button icon="pi pi-trash" outlined rounded severity="danger" @click="confirmDeleteProduct(slotProps.data)" />
            </template>
        </Column>
        </DataTable>
    </div>
  </div>
  <Dialog v-model:visible="visible" modal header="Novo Usuario" :style="{ width: '50vw' }">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12 mb-2">
          <div class="form-floating">
                <input 
                  type="text" 
                  class="form-control" 
                  id="name"
                  placeholder="Nome"
                  v-model="form.neame">
                <label for="name">Nome</label>
          </div>
        </div>
        <div class="col-12 mb-2">
          <div class="form-floating">
                <input 
                  type="email" 
                  class="form-control" 
                  id="email" 
                  placeholder="name@example.com"
                  v-model="form.email">
                <label for="email">Email</label>
          </div>
        </div>
        <div class="col-12 mb-2">
          <div class="form-floating">
                <input 
                  type="password" 
                  class="form-control" 
                  id="password" 
                  placeholder="Password"
                  v-model="form.password">
                <label for="email">Password</label>
          </div>
        </div>
        <div class="col-10 mb-2">
          <div class="form-floating">
                <input 
                  type="number" 
                  class="form-control" 
                  id="cep" 
                  placeholder="CEP"
                  maxlength="8"
                  v-model="form.zip_code">
                <label for="cep">CEP</label>
          </div>
        </div>
        <div class="col-2 mb-2">
          <Button label="Buscar" icon="pi pi-search" @click="buscarCEP()" class="p-3" />
        </div>
        <div class="col-12 mb-2">
          <div class="form-floating">
                <input 
                  type="text" 
                  class="form-control" 
                  id="address" 
                  placeholder="Endereço"
                  v-model="form.address">
                <label for="address">Endereço</label>
          </div>
        </div>
        <div class="col-6 mb-2">
          <div class="form-floating">
                <input 
                  type="text" 
                  class="form-control" 
                  id="district" 
                  placeholder="Bairro"
                  v-model="form.district">
                <label for="district">Bairro</label>
          </div>
        </div>
        <div class="col-4 mb-2">
          <div class="form-floating">
                <input 
                  type="text" 
                  class="form-control" 
                  id="city" 
                  placeholder="Endereço"
                  v-model="form.city">
                <label for="city">Cidade</label>
          </div>
        </div>
        <div class="col-2 mb-2">
          <div class="form-floating">
                <input 
                  type="text" 
                  class="form-control" 
                  id="state" 
                  placeholder="Estado"
                  v-model="form.state">
                <label for="state">Estado</label>
          </div>
        </div>
      </div>
    </div>
    <template #footer>
        <Button label="Cancelar" icon="pi pi-times" @click="visible = false" text />
        <Button label="Salvar" icon="pi pi-check" @click="visible = false" autofocus />
    </template>
  </Dialog>
</template>

<script setup>
import { ref, reactive, inject, onMounted } from 'vue'
import { Auth } from '@/stores/auth.js'
import { getAll } from '@/services/users.js'

import http from '@/services/http.js'

import Button from 'primevue/button';
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import Dialog from 'primevue/dialog'

const auth = Auth();
const user = ref(auth.user);
const form = reactive({
  name: '',
  email: '',
  password: '',
  zip_code: '',
  address: '',
  district: '',
  city: '',
  state: ''
})

const isLoading = ref(true);
const users = ref([])
const visible = ref(false);

const swal = inject('$swal')

onMounted(async () => {
  const data = await getAll();
  if(data.success){
    users.value = data.users
    isLoading.value = false;
  }
})

async function buscarCEP(){
  try {

    if(form.zip_code == ''){
      return;
    }

    const { data } = await http.get('https://viacep.com.br/ws/' + form.zip_code + '/json/');
    
    form.address = data.logradouro
    form.district = data.bairro
    form.city = data.localidade
    form.state = data.uf

  } catch (error) {
    console.log(error.response)
  }
}

function newUser(){
  visible.value = true;
}

function logout(){
  auth.logout()
}

function limpaForm(){
  form.address = ''
  form.city = ''
  form.district = ''
  form.email = ''
  form.name = ''
  form.password = ''
  form.state = ''
  form.zip_code = ''
}

</script>