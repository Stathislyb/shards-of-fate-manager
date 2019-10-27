export default {
    namespace: 'helpers/storeHelperMixin',
    methods: {
        getFromStore(getter, params = undefined)
        {
            if(typeof params === 'undefined') 
            {
                return this.$store.getters[getter]
            }
            return this.$store.getters[getter](params)
        },
        dispatchAction(action, params = {})
        {
            return this.$store.dispatch(action, params);
        },
    }
}