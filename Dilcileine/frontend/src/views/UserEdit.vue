<template>
    <div class="ui header item right">
        <router-link class="ui button " :to="{name:'user'}">
        Voltar
        </router-link>
    </div>
    <h1 class="ui header">Editar Usuário</h1>

    <form class="ui form" @submit.prevent="update">
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
                        <input  type="text" name='cep' id='cep' placeholder="Cep" v-model="customer.cep" @blur="buscaCep()">
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
import {useRouter, useRoute} from 'vue-router';
import axios from 'axios';


const router = useRouter();
const route = useRoute();
const id = route.params.id;
 

const customer = reactive({
  email:'',
  nome:'', 
  rua: '',
  telefone: '',
  complemento: '',
  bairro: '',
  cidade: '',
})

async function update(){
  try {
    const {data} = await http.post(`/customer/update/${id}`,customer);
    router.push({name:'user'});
  } catch (error) {
    console.log(error?.response?.data);
  }
} 


const {data} = http.get(`/customer/get/${id}`).then(data => {
    customer.nome = data.data.nome
    customer.email = data.data.email
    customer.rua = data.data.rua
    customer.complemento = data.data.complemento
    customer.telefone = data.data.telefone
    customer.bairro = data.data.bairro
    customer.cidade = data.data.cidade
    customer.cep = data.data.cep

});

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


