<style scoped>
    .index {
        margin-top: 40px;
    }
</style>

<template>
    <div class="index">
        <Row type="flex" justify="center">
            <Col span="20">

                <chapter-tabs
                    :chapters="chapters"
                    @onMakeNewChapter="handleMakeNewChapter"
                />

                <Modal
                    title="Add Chapter"
                    v-model="chapter_modal"
                    footer-hide
                >
                    <chapter-form
                        :editChapter="edit_chapter"
                        @onChapterCreate="handleChapterCreate"
                        @onChapterEdit="handleChapterEdit"
                    />
                </Modal>

            </Col>
        </Row>
    </div>
</template>

<script>
    const namespace = 'pages/Home';
    export default {
        namespace: namespace,
        name: 'Home',
        mixins: ['helpers/storeHelperMixin', 'helpers/typecheckMixin'],
        types: {
            namespace: namespace,
        },
        data() {
            return {
                chapter_modal: false,
                edit_chapter: {},
            };
        },
        computed: {
            chapters () {
                return this.getFromStore(namespace + '/chapters');
            },
        },
        methods: {
            initPage () {
                this.loadChapters();
            },

            handleMakeNewChapter () {
                this.edit_chapter = {};
                this.chapter_modal = true;
            },
            closeModal () {
                this.edit_chapter = {};
                this.chapter_modal = false;
            },
            async loadChapters () {
                this.dispatchAction(namespace + '/requestChapters').then(response => {
                    this.dispatchAction(namespace + '/setChapters', response.data);
                });
            },
            async handleChapterCreate (chapter) {
                this.dispatchAction(namespace + '/submitChapterCreate', chapter).then(response => {
                    this.closeModal();
                    this.loadChapters();
                });
            },
            async handleChapterEdit (chapter) {
                this.dispatchAction(namespace + '/submitChapterEdit', chapter).then(response => {
                    this.closeModal();
                    this.loadChapters();
                });
            },
        },
        mounted() {
            this.initPage();
        },
    }
</script>
