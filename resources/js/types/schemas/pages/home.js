import HelloType, { Dict, Enum, Tuple, List, Type, Rule, Self, IfExists } from 'hello-type'

const TestType = new Type({
    variable: String,
});


export default {
    namespace: 'pages/Home',
    assert(data) {
        TestType.assert(data);
    },
};