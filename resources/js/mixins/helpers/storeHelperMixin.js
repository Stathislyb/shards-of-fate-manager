export default {
    namespace: 'helpers/storeHelperMixin',
    methods: {
        getFromStore(getter, params = undefined)
        {
            if(typeof params === 'undefined') 
            {
                return this.$store.getters['global/' + getter]
            }
            return this.$store.getters['global/' + getter](params)
        },
        dispatchAction(action, params = {})
        {
            return this.$store.dispatch('global/' + action, params);
        },
    }
}