
<template>
  <router-link class="ui primary button" :to="{name:'addUser'}">
    Adicionar
  </router-link>
    <div class="customer-list">
    <div class="data">
      <table class="ui celled table">
        <thead>
          <tr>
            <th style="width: 50px; text-align: center;">ID</th>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Endereço</th>
            <th>Telefone</th>
            <th style="width: 160px;">Action</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="customer in customers" v-bind:key="customer.id">
            <td>{{ customer.id }}</td>
            <td>{{ customer.nome }}</td>
            <td>{{ customer.email }}</td>
            <td>{{ customer.telefone }}</td>
            <td>{{ customer.rua }} - {{ customer.bairro }} -{{ customer.cidade }}</td>
            <td>
              <router-link class="mini ui blue button" :to="{name:'editUser', params:{id:customer.id}}">
                Edit
              </router-link>
              <button class="mini ui red button" @click="onDelete(customer.id)">Delete</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
import http from '@/services/http.js';


export default {
  name: "App",
  components: {
    http
  },

  data() {
    return {
      customers: []
    };
  },
  methods: {
    async getCustomers() {
      await http.get('/customer/list').then(data => {
        this.customers = data.data;
        //console.log(data.data);
      });
    },
    async onDelete(id) {
      if(confirm("Voce deseja realmente deletar esse registro?")){
        try{
          const {data} = await http.delete(`/customer/del/${id}`);
          this.getCustomers();
        }
        catch(error){
            console.log(error);
        }
      }
    },

  },
  created() {
    this.getCustomers();
  }
};
</script>