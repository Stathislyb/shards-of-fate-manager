<style>
    .index {
        margin-top: 40px;
    }
    button.inline-edit-btn {
        font-size: 1.2em;
        padding: 0;
        margin: 0;
        vertical-align: inherit;
    }
</style>

<template>
    <div class="index">
        <Row type="flex" justify="center">
            <Col span="20">

                <Select v-model="selected_chapter" style="width:200px">
                    <Option v-for="chapter in chapters" :value="chapter.id" :key="chapter.id">{{ chapter.name }}</Option>
                </Select>

                <focus-list
                    :focus="chapterFocus"
                    @onMakeNewFocus="handleMakeNewFocus"
                    @onEditFocus="handleEditFocus"
                    @onAddFocusGoal="handleAddFocusGoal"
                    @onEditFocusGoal="handleEditFocusGoal"
                    @onIncreaseFocus="handleIncreaseFocus"
                    @onDecreaseFocus="handleDecreaseFocus"
                />

                <Modal
                    title="Focus"
                    v-model="focus_modal"
                    footer-hide
                >
                    <focus-form
                        :selectedChapter="selected_chapter"
                        :editFocus="edit_focus"
                        @onFocusCreate="handleFocusCreate"
                        @onFocusEdit="handleFocusEdit"
                    />
                </Modal>

                <Modal
                    title="Focus Goal"
                    v-model="focus_goal_modal"
                    footer-hide
                >
                    <focus-goal-form
                        :editFocusGoal="edit_focus_goal"
                        @onFocusGoalCreate="handleFocusGoalCreate"
                        @onFocusGoalEdit="handleFocusGoalEdit"
                    />
                </Modal>

            </Col>
        </Row>
    </div>
</template>

<script>
    const namespace = 'pages/Focus';
    const homeNamespace = 'pages/Home';
    export default {
        namespace: namespace,
        name: 'Focus',
        mixins: ['helpers/storeHelperMixin', 'helpers/typecheckMixin'],
        data() {
            return {
                focus_modal: false,
                edit_focus: {},
                focus_goal_modal: false,
                edit_focus_goal: {},
                selected_chapter: 0,
            };
        },
        computed: {
            focus () {
                return this.getFromStore(namespace + '/focus');
            },
            chapters () {
                return this.getFromStore(homeNamespace + '/chapters');
            },
            chapterFocus () {
                return this.focus.filter(focusItem => focusItem.chapter_id == this.selected_chapter);
            }
        },
        methods: {
            initPage () {
                this.loadFocus();
                this.loadChapters();
            },

            handleMakeNewFocus () {
                this.edit_focus = {};
                this.focus_modal = true;
            },
            handleEditFocus (focus) {
                this.edit_focus = focus;
                this.focus_modal = true;
            },
            handleAddFocusGoal (focusGoal) {
                this.edit_focus_goal = focusGoal;
                this.focus_goal_modal = true;
            },
            handleEditFocusGoal (focusGoal) {
                this.edit_focus_goal = focusGoal;
                this.focus_goal_modal = true;
            },

            closeModal () {
                this.edit_focus = {};
                this.focus_modal = false;
            },
            closeFocusGoalModal () {
                this.edit_focus_goal = {};
                this.focus_goal_modal = false;
            },
            setInitialSelectedChapter (chapters) {
                this.selected_chapter = chapters && chapters.length > 0? chapters[0].id : 0;
            },
            async loadFocus () {
                this.dispatchAction(namespace + '/requestFocus').then(response => {
                    this.dispatchAction(namespace + '/setFocus', response.data);
                });
            },
            async loadChapters () {
                this.dispatchAction(homeNamespace + '/requestChapters').then(response => {
                    this.dispatchAction(homeNamespace + '/setChapters', response.data);
                    this.setInitialSelectedChapter(response.data);
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
            async handleIncreaseFocus (focus) {
                this.dispatchAction(namespace + '/increaseFocus', focus).then(response => {
                    this.dispatchAction(namespace + '/updateFocusState', response.data);
                });
            },
            async handleDecreaseFocus (focus) {
                this.dispatchAction(namespace + '/decreaseFocus', focus).then(response => {
                    this.dispatchAction(namespace + '/updateFocusState', response.data);
                });
            },
            async handleFocusGoalCreate (focusGoal) {
                this.dispatchAction(namespace + '/submitFocusGoalCreate', focusGoal).then(response => {
                    this.closeFocusGoalModal();
                    this.loadFocus();
                });
            },
            async handleFocusGoalEdit (focusGoal) {
                this.dispatchAction(namespace + '/submitFocusGoalEdit', focusGoal).then(response => {
                    this.closeFocusGoalModal();
                    this.loadFocus();
                });
            },
        },
        mounted() {
            this.initPage();
        },
    }
</script>
