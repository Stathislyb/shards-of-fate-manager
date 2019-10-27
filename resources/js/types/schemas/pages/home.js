import HelloType, { Dict, Enum, Tuple, List, Type, Rule, Self, IfExists } from 'hello-type'

const TestType = new Type({
    chapter_modal: Boolean,
    edit_chapter: Object
});


export default {
    namespace: 'pages/Home',
    assert(data) {
        TestType.assert(data);
    },
};