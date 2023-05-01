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

export {
    getAll
}