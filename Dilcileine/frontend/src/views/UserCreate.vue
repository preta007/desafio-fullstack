<template>
    <div class="ui header item right">
        <router-link class="ui button " :to="{name:'user'}">
        Voltar
        </router-link>
    </div>
    <h1 class="ui header">Cadastro de Usuário</h1>

    <form class="ui form" @submit.prevent="create">
        <div class="field">
                <div class="two fields">
                    <div class="field">
                        <label>Nome</label>
                        <input  type="text" name='nome' placeholder="Nome" v-model="customer.nome">
                    </div>
                    <div class="field">
                        <label>E-mail</label>
                        <input  type="email" name='email' placeholder="E-mail" v-model="customer.email">
                    </div>
                    <div class="field">
                        <label>Telefone</label>
                        <input  type="text" name='telefone' placeholder="Telefone" v-model="customer.telefone">
                    </div>
                </div>
            </div>
            
            <div class="field">
                <div class="fields">
                    <div class="four wide field">
                        <label>Cep</label>
                        <input  type="text" name='cep' placeholder="Cep" v-model="customer.cep" @blur="buscaCep()">
                    </div>
                    <div class="twelve wide field">
                        <label>Rua</label>
                        <input  type="text" name='rua' placeholder="Rua" v-model="customer.rua">
                    </div>
                </div>
            </div>
            <div class="field">
                <div class="two fields">
                    <div class="field">
                        <label>Complemento</label>
                        <input  type="text" name='complemento' placeholder="Complemento" v-model="customer.complemento">
                    </div>
                    <div class="field">
                        <label>Bairro</label>
                        <input  type="text" name='bairro' placeholder="Bairro" v-model="customer.bairro">
                    </div>
                    <div class="field">
                        <label>Cidade</label>
                        <input  type="text" name='cidade' placeholder="Cidade" v-model="customer.cidade">
                    </div>
                </div>
            </div>

      <button class="ui primary button" type="submit">Salvar</button>
    </form>

  </template>

<script setup>
import http from '@/services/http.js';
import {reactive} from 'vue';
import {useRouter} from 'vue-router';


const router = useRouter();

const customer = reactive({
  email:'',
  nome:'', 
  rua: '',
  telefone: '',
  complemento: '',
  bairro: '',
  cidade: '',
})

async function create(){
  try {
    const {data} = await http.post('/customer',customer);
    router.push({name:'user'});
  } catch (error) {
    console.log(error?.response?.data);
  }
}

async function buscaCep(){
    var valor = document.getElementById('cep').value;
    var cep = valor.replace(/\D/g, '');

    axios.get(`https://viacep.com.br/ws/${cep}/json/`).then(function(data) {
        customer.rua = data.data.logradouro
        customer.complemento = data.data.complemento
        customer.bairro = data.data.bairro
        customer.cidade = data.data.localidade
        console.log(data.data);
    });
    
}

</script>