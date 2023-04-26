<template>
 
  <template v-if="!auth.isAuth">
    <form class="ui form" @submit.prevent="login">
      <div class="field">
          <label>E-mail</label>
          <input
          v-model="user.email"
          type="text"
          placeholder="Seu email"
          >
      </div>
      <div class="field">
          <label>Senha</label>
          <input
          v-model="user.password"
          type="password"
          placeholder="Sua senha"
          >
      </div>
      <button class="ui button" type="submit">Login</button>
    </form>
  </template>
  <template v-else>
    Logen id
  </template>
</template>

<script setup>
import http from '@/services/http.js';
import {reactive} from 'vue';
import {useAuth} from '@/stores/auth.js';
import {useRouter} from 'vue-router';

const auth = useAuth();
const router = useRouter();

const user = reactive({
  email:'admin@admin.com',
  password:'1234'
})

async function login(){
  try {
    const {data} = await http.post('/auth',user);
    console.log(data.user);
    auth.setToken(data.token);
    auth.setUser(data.user);
    auth.setIsAuth(true);
    router.push({name:'login'});
  } catch (error) {
    console.log(error?.response?.data);
  }
}

</script>
