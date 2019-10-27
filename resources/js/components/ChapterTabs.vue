<template>
    <Tabs type="card" v-model:value="selected_chatper_index">
        <TabPane v-for="chapter in this.chapters" :key="chapter.id" :label="chapter.name">
            Tab {{ chapter.description }}
        </TabPane>
        <Button @click="triggerMakeNewChapter" size="small" shape="circle" icon="md-add" slot="extra" />
    </Tabs>
</template>
<script>
    const namespace = 'components/ChapterTabs';
    export default {
        namespace: namespace,
        name: 'ChapterTabs',
        props: {
            chapters: Array,
        },
        data () {
            return {
                selected_chatper_index: 0,
            };
        },
        methods: {
            triggerMakeNewChapter() {
                this.$emit('onMakeNewChapter');
            },
        },
    }
</script>