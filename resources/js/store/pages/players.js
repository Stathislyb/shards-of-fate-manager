import MUTATION_TYPES from '../../constants/mutationTypes';
import serverApiClient from '../../clients/serverApiClient';

var state = {
    players: [],
};

export default {
    namespaced: true,
    state: state,
    mutations: {
        [MUTATION_TYPES.SET_PLAYERS] (state, payload) {
            if(!Array.isArray(payload.players)){
                payload.players = [];
            }
            state.players = payload.players;
        },
    },
    getters: {
        players: (state) => {
            return state.players;
        },
    },
    actions: {
        requestPlayers () 
        {
            return serverApiClient.requestPlayer();
        },
        submitPlayerCreate ({}, players) 
        {
            return serverApiClient.submitPlayerCreate(players);
        },
        submitPlayerEdit ({}, players) 
        {
            return serverApiClient.submitPlayerEdit(players);
        },
        submitReputationItemCreate ({}, reputation_item) 
        {
            return serverApiClient.submitReputationItemCreate(reputation_item);
        },
        submitReputationItemEdit ({}, reputation_item) 
        {
            return serverApiClient.submitReputationItemEdit(reputation_item);
        },

        updatePlayersState ({ commit, state }, {player, new_item}) 
        {
            let updatedPlayers = state.players;

            if(new_item){
                updatedPlayers.push(player);
            }else{
                updatedPlayers = updatedPlayers.map(playerState => {
                    if(playerState.id == player.id){
                        playerState = player;
                        new_item = false;
                    }
                    return playerState;
                });
            }
            
            commit({
                type: MUTATION_TYPES.SET_PLAYERS,
                players: updatedPlayers
            });
        },

        setPlayers ({ commit }, players) 
        {
            commit({
                type: MUTATION_TYPES.SET_PLAYERS,
                players: players
            });
        },
    }
};