<template>
    <List item-layout="vertical">
        <ListItem v-for="player in this.players" :key="player.id" >
            <Row>
                <Col span="24" class="player-name-row">
                    <Button type="text" class="inline-edit-btn" @click="triggerEditPlayer(player)" icon="ios-create-outline" /> 
                    {{player.name}}
                </Col>
                <Col span="24">
                    <Collapse simple>
                        <Panel name="player_notes">
                            Player Notes
                            <p slot="content">
                                <pre style="white-space: pre-line;">{{player.notes}}</pre>
                            </p>
                        </Panel>
                    </Collapse> 
                </Col>
                <Col span="24">
                    <Collapse simple>
                        <Panel name="reputation">
                            Reputation: {{calculatePlayerRemainingReputation(player)}}/{{player.reputation}} 
                            <Button type="text" @click="triggerAddReputationItem(player)" icon="md-add">Add Reputation Item</Button>
                            <p slot="content">
                                <List item-layout="vertical">
                                    <ListItem v-for="reputation_item in player.reputation_items" :key="reputation_item.id" >
                                        <Row>
                                            <Col span="24">                        
                                                <Button type="text" class="inline-edit-btn" @click="triggerEditReputationItem(reputation_item)" icon="ios-create-outline" />
                                                {{reputation_item.name}} (cost: {{reputation_item.reputation_cost}} Reputation)                       
                                            </Col>
                                        </Row>
                                        <i>{{reputation_item.description}}</i>
                                    </ListItem>
                                </List>
                            </p>
                        </Panel>
                    </Collapse>                    
                </Col>
            </Row>            
        </ListItem>

        <ListItem>
            <Button @click="triggerMakeNewPlayer" shape="circle" icon="md-add">Add Player</Button>
        </ListItem>
    </List>
</template>

<script>
    const namespace = 'components/PlayersList';
    export default {
        namespace: namespace,
        name: 'PlayersList',
        props: {
            players: Array,
        },
        data () {
            return {};
        },
        methods: {
            triggerMakeNewPlayer() {
                this.$emit('onMakeNewPlayer');
            },
            triggerEditPlayer(player) {
                this.$emit('onEditPlayer', player);
            },
            triggerAddReputationItem(player) {
                this.$emit('onAddReputationItem', {player_id: player.id});
            },
            triggerEditReputationItem(reputation_item) {
                this.$emit('onEditReputationItem', reputation_item);
            },
            calculatePlayerRemainingReputation(player) {
                let remaining_reputation = player.reputation;

                if(player.reputation_items && player.reputation_items.length > 0){
                    player.reputation_items.forEach(reputation_item => {
                        remaining_reputation -= reputation_item.reputation_cost;
                    })
                }

                return remaining_reputation;
            },
        },
    }
</script>