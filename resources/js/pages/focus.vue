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
                    :chapters="focus"
                    @onMakeNewChapter="handleMakeNewFocus"
                />

                <Modal
                    title="Add Focus"
                    v-model="focus_modal"
                    footer-hide
                >
                    <chapter-form
                        :editChapter="edit_focus"
                        @onChapterCreate="handleFocusCreate"
                        @onChapterEdit="handleFocusEdit"
                    />
                </Modal>

            </Col>
        </Row>
    </div>
</template>

<script>
    const namespace = 'pages/Focus';
    export default {
        namespace: namespace,
        name: 'Focus',
        mixins: ['helpers/storeHelperMixin', 'helpers/typecheckMixin'],
        types: {
            namespace: namespace,
        },
        data() {
            return {
                focus_modal: false,
                edit_focus: {},
            };
        },
        computed: {
            focus () {
                return this.getFromStore(namespace + '/focus');
            },
        },
        methods: {
            initPage () {
                this.loadFocus();
            },

            handleMakeNewFocus () {
                this.edit_focus = {};
                this.focus_modal = true;
            },
            closeModal () {
                this.edit_focus = {};
                this.focus_modal = false;
            },
            async loadFocus () {
                this.dispatchAction(namespace + '/requestFocus').then(response => {
                    this.dispatchAction(namespace + '/setFocus', response.data);
                });
            },
            async handleFocusCreate (focus) {
                this.dispatchAction(namespace + '/submitFocusCreate', focus).then(response => {
                    this.closeModal();
                    this.loadFocus();
                });
            },
            async handleFocusEdit (focus) {
                this.dispatchAction(namespace + '/submitFocusEdit', focus).then(response => {
                    this.closeModal();
                    this.loadFocus();
                });
            },
        },
        mounted() {
            this.initPage();
        },
    }
</script>
