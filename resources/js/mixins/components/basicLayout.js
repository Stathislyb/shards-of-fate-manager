export default {
    namespace: 'components/BasicLayout',
    methods: {
        getFromStore(getter, params = undefined)
        {
            if(typeof params === 'undefined') 
            {
                return this.$store.getters['components/BasicLayout/' + getter]
            }
            return this.$store.getters['components/BasicLayout/' + getter](params)
        },
        dispatchAction(action, params = {})
        {
            return this.$store.dispatch('components/BasicLayout/' + action, params);
        },
    }
}