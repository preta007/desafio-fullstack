import { computed, ref } from 'vue';
import { defineStore } from "pinia";
import http from '@/services/http.js'
import router from '@/router'

export const Auth = defineStore('auth', () => {

    const token = ref(localStorage.getItem('token'))
    const user = ref(JSON.parse(localStorage.getItem('user')))
    const isAuth = ref(false)

    function setToken(tokenValue){
        localStorage.setItem('token', tokenValue)
        token.value = tokenValue
    }

    function setUser(userValue){
        localStorage.setItem('user', JSON.stringify(userValue))
        user.value = userValue
    }

    function setIsAuth(auth){
        isAuth.value = auth
    }

    const isAuthenticated = computed(() => {
        return token.value && user.value;
    })

    async function login(userValue) {
        try {
            const { data } = await http.post("/auth/login", userValue);

            setToken(data.access_token)
            setUser(data.user)
            setIsAuth(true)
    
            return {status: true, message: 'Login efetuado com sucesso!', data }
        } catch (error) {
            clear();
            return {status: false, message: 'Não foi possivel realizar o login!', data: error.response }
        }
    }

    async function logout(){
        try {
            const tokenAuth = 'Bearer ' + token.value;
            const { data } = await http.get("/auth/me", {
                headers: {
                Authorization: tokenAuth,
                },
            });
            clear();
            return router.push('/login');
        } catch (error) {
            console.log('error',error);
        }
    }

    async function checkToken() {
        try {
          const tokenAuth = 'Bearer ' + token.value;
          const { data } = await http.get("/auth/me", {
            headers: {
              Authorization: tokenAuth,
            },
          });
          return data;
        } catch (error) {
          clear();
          router.push('/login');
          console.log('error',error.response.data);
        }
    }

    function clear() {
        localStorage.removeItem('token');
        localStorage.removeItem('user');
        isAuth.value = false;
        token.value = '';
        user.value = '';
    }

    return {
        token,
        user,
        setToken,
        setUser,
        login,
        logout,
        checkToken,
        isAuthenticated,
        clear,
        setIsAuth,
        isAuth
    }

})