<template>
  
     <div class="ui fixed inverted menu vue-color">
        <div class="ui container">
            <router-link class="header item" :to="{name:'home'}">
              Desafio Vue+Laravel Sub100
            </router-link>
            <router-link class="header item" :to="{name:'login'}">
              Login
            </router-link>
            <router-link class="header item" :to="{name:'dashboard'}">
              Dashboard
            </router-link>
            <router-link class="header item" :to="{name:'user'}">
              Usuários
            </router-link>
            <div class="header item right" >
              <template  v-if="auth.isAuth">
              Olá {{ auth.fullName }} 
              <button class="ui button " @click="logout">
                Logout
              </button>
              </template>
              <template v-else>
                  Olá visitante
              </template>
            </div>
            
        </div> 
    </div>
    <div class="ui container">
      <router-view />
    </div>

</template>

<script setup>
import {useAuth} from '@/stores/auth.js';
import {useRouter} from 'vue-router';

const auth = useAuth();
const router = useRouter();

function logout(){
  auth.clear();
  router.push({name:'login'});
}
</script>

<style>
.vue-color {
  background: #5f9ea0 !important;
}

.main.container {
  margin-top: 60px;
}

.submit-button {
  margin-top: 24px !important;
  float: right;
}

.data {
  margin-top: 15px;
}

thead tr th {
  background: #e0e0e0 !important;
}

.ui.inverted.dimmer {
  background-color: rgba(255, 255, 255, 0) !important;
}
</style>
