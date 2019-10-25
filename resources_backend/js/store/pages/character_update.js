var state = {
    formValidate: {
        player_id: '',
        name: '',
        race: '',
        class: '',
        level: '',
        unique_thing: '',
        focus: '',
        start_date: '',
        death_date: '',
        notes: '',
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
