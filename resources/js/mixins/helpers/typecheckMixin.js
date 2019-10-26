import TypeChecker from '../../types/TypeChecker.js';

export default {
    namespace: 'helpers/typecheckMixin',
    created() {
        const options = this.$options;
        const types = options.types;
        
        if (types) {
            if (types.namespace) {
                TypeChecker.checkNamespace(types.namespace, this._data);
            } else if (types.schema) {
                TypeChecker.check(types.schema(), this._data);
            }
        }
    },
}