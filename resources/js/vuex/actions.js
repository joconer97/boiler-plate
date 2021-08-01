import axios from "axios";



let actions = {
    LOGIN({ commit }, payload) {
        return new Promise((resolve, reject) => {
            axios
                .post('/api/login', payload)
                .then(response => {
                    localStorage.setItem('AUTH', response.data.user)
                    localStorage.setItem('NAME', response.data.user.name)
                    localStorage.setItem('USER_ID', response.data.user.id)
                    localStorage.setItem('TOKEN', response.data.token)

                    commit('SET_USER', response.data.user)
                    resolve(response.data)
                })
                .catch(err => reject(err))
        })
    },
    REGISTER({ commit }, payload) {
        return new Promise((resolve, reject) => {
            axios
                .post('/api/register', payload)
                .then(response => {
                    localStorage.setItem('AUTH', response.data.user)
                    localStorage.setItem('NAME', response.data.user.name)
                    localStorage.setItem('USER_ID', response.data.user.id)
                    localStorage.setItem('TOKEN', response.data.token)

                    commit('SET_USER', response.data.user)
                    resolve(response.data)
                })
                .catch(err => reject(err))
        })
    },
}

export default actions;