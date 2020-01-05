<style scoped>
    .index {
        margin-top: 40px;
    }
</style>

<template>
    <div class="index">
        <Row type="flex" justify="center">
            <Col span="20">

                <players-list
                    :players="players"
                    @onMakeNewPlayer="handleMakeNewPlayer"
                    @onEditPlayer="handleEditPlayer"
                    @onAddReputationItem="handleEditReputationItem"
                    @onEditReputationItem="handleEditReputationItem"
                />

                <Modal
                    title="Player"
                    v-model="player_modal"
                    width="50"
                    footer-hide
                >
                    <player-form
                        :editPlayer="edit_player"
                        @onPlayerCreate="handlePlayerCreate"
                        @onPlayerEdit="handlePlayerEdit"
                    />
                </Modal>

                <Modal
                    title="Reputation Item"
                    v-model="reputation_item_modal"
                    footer-hide
                >
                    <reputation-item-form
                        :editReputationItem="edit_reputation_item"
                        @onReputationItemCreate="handleReputationItemCreate"
                        @onReputationItemEdit="handleReputationItemEdit"
                    />
                </Modal>

            </Col>
        </Row>
    </div>
</template>

<script>
    const namespace = 'pages/Players';
    export default {
        namespace: namespace,
        name: 'Players',
        mixins: ['helpers/storeHelperMixin', 'helpers/typecheckMixin'],
        data() {
            return {
                player_modal: false,
                edit_player: {},
                reputation_item_modal: false,
                edit_reputation_item: {},
            };
        },
        computed: {
            players () {
                return this.getFromStore(namespace + '/players');
            },
        },
        methods: {
            initPage () {
                this.loadPlayers();
            },

            handleMakeNewPlayer () {
                this.edit_player = {};
                this.player_modal = true;
            },
            handleEditPlayer (player) {
                this.edit_player = player;
                this.player_modal = true;
            },
            handleEditReputationItem (reputation_item) {
                this.edit_reputation_item = reputation_item;
                this.reputation_item_modal = true;
            },

            closeModal () {
                this.edit_player = {};
                this.player_modal = false;
            },
            closeReputationItemModal () {
                this.edit_reputation_item = {};
                this.reputation_item_modal = false;
            },
            async loadPlayers () {
                this.dispatchAction(namespace + '/requestPlayers').then(response => {
                    this.dispatchAction(namespace + '/setPlayers', response.data);
                });
            },
            async handlePlayerCreate (player) {
                this.dispatchAction(namespace + '/submitPlayerCreate', player).then(response => {
                    this.dispatchAction(namespace + '/updatePlayersState', {
                        player: response.data, 
                        new_item: true
                    });
                    this.closeModal();
                });
            },
            async handlePlayerEdit (player) {
                this.dispatchAction(namespace + '/submitPlayerEdit', player).then(response => {
                    this.dispatchAction(namespace + '/updatePlayersState', {
                        player: response.data, 
                        new_item: false
                    });
                    this.closeModal();
                });
            },
            async handleReputationItemCreate (reputation_item) {
                this.dispatchAction(namespace + '/submitReputationItemCreate', reputation_item).then(response => {
                    this.closeReputationItemModal();
                    this.loadPlayers();
                });
            },
            async handleReputationItemEdit (reputation_item) {
                this.dispatchAction(namespace + '/submitReputationItemEdit', reputation_item).then(response => {
                    this.closeReputationItemModal();
                    this.loadPlayers();
                });
            },
        },
        mounted() {
            this.initPage();
        },
    }
</script>
