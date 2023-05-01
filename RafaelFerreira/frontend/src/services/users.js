import http from "./http";

const token = 'Bearer ' + localStorage.getItem('token')

async function getAll(){
    try {
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

export {
    getAll,
    create
}