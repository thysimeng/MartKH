let actions = {
    fetchPosts({commit}) {
        axios.get('/usersTest')
            .then(res => {
                commit('FETCH_POSTS', res.data)
            }).catch(err => {
            console.log(err)
        })
    }
}

export default actions
