<template>
    <main class="text-center">
        <div class="form-signin">
            <img class="mb-4" src="../assets/logo.svg" alt="" width="72" height="57">
            <h1 class="h5 mb-3 fw-normal">Faça o login para entrar no sistema!</h1>

            <div class="form-floating">
                <input type="email" class="form-control" id="email" placeholder="name@example.com">
                <label for="email">Email</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="password" placeholder="Password">
                <label for="password">Password</label>
            </div>

            <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" value="remember-me"> Remember me
                </label>
            </div>
            <Button label="Entrar" icon="pi pi-lock" class="form-control" @click="login()" />
        </div>
    </main>
</template>

<script setup>
import { useRouter } from 'vue-router'
import Button from 'primevue/button';

const rauter = useRouter();

function login(){
    rauter.push({name: 'home'})
} 
</script>
<style scoped>
body {
  display: flex;
  align-items: center;
  justify-content: center;
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #f5f5f5;
}

main{
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
}

.form-signin {
  width: 100%;
  max-width: 330px;
  padding: 15px;
  margin: auto;
}

.form-signin .checkbox {
  font-weight: 400;
}

.form-signin .form-floating:focus-within {
  z-index: 2;
}

.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}

.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
</style>