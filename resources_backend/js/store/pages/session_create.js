var state = {
    formValidate: {
        episode_id: '',
        user_id: '',
        hook: '',
        public_description: '',
        private_description: '',
        starts_at: '',
    },
};

export default {
    namespaced: true,
    state: state,
    mutations: {
        setFormValidate (state, data) 
        {
            state.formValidate = data;
        },
    },
    getters: {
        formValidate (state) 
        {
            return state.formValidate;
        }
    }
};
