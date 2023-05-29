import axio from 'axios'

const http = axio.create({
    baseURL: 'http://localhost:8000/api',
    headers: {
        'Content-type': 'application/json'
    }
})

export default http;