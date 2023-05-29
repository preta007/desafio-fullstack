import http from "./http";
import { Auth } from "@/stores/auth.js";

async function getAll(){
    try {
        const auth = Auth();
        const token = 'Bearer ' + auth.token
        
        const { data } = await http.get("/user/get/all", {
            headers: {
                Authorization: token,
            }
        });

        return data

    } catch (error) {
        return {status: false, data: error }
    }
}

async function create(userValue){
    try {
        
        const auth = Auth();
        const token = 'Bearer ' + auth.token

        const { data } = await http.post("/user/create", userValue, {
            headers: {
                Authorization: token,
            }
        })

        return data

    } catch (error) {
        return {status: false, data: error?.response?.data }
    }
}

async function update(userValue, id){
    try {
        
        const auth = Auth();
        const token = 'Bearer ' + auth.token

        const { data } = await http.put("/user/update/" + id, userValue, {
            headers: {
                Authorization: token,
            }
        })

        return data

    } catch (error) {
        return {status: false, data: error?.response?.data }
    }
}

async function remove(id){
    try {
        
        const auth = Auth();
        const token = 'Bearer ' + auth.token

        const { data } = await http.delete("/user/delete/" + id, {
            headers: {
                Authorization: token,
            }
        })

        return data

    } catch (error) {
        return {status: false, data: error?.response?.data }
    }
}

export {
    getAll,
    create,
    update,
    remove
}