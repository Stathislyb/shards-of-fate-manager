import mixin_modules from '../modulesCollectors/mixinModules';
import component_modules from '../modulesCollectors/componentModules';

var register_components = {};
register_components.install = function (Vue) {
    Object.values(component_modules).forEach(component => {
        if(typeof component.mixins !== 'undefined') {
            const mixin_namespaces = component.mixins;
            component.mixins = [];
            mixin_namespaces.forEach(mixin_namespace => {
                component.mixins.push( mixin_modules[mixin_namespace] )
            });
        }else{
            component.mixins = [];
        }

        if(mixin_modules[component.namespace]) {
            const component_mixins = mixin_modules[component.namespace];            
            component.mixins.push( component_mixins );
        }
        
        Vue.component(component.name, component);
    });
};

export default register_components;