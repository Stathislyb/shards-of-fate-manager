const serverApiClient = {

    requestChapter: function(id = '') {
        return window.axios.get( process.env.MIX_BASE_RELATIVE_URL_BACKEND + '/trident/resource/chapter/' + id );
    },    
    submitChapterCreate: function(chapter = {}) {        
        return window.axios.post( process.env.MIX_BASE_RELATIVE_URL_BACKEND+'/trident/resource/chapter',  chapter );
    },
    submitChapterEdit: function(chapter = {}) {
        return window.axios.put( process.env.MIX_BASE_RELATIVE_URL_BACKEND + '/trident/resource/chapter/' + chapter.id, chapter );
    },
    
    requestFocus: function(id = '') {
        return window.axios.get( process.env.MIX_BASE_RELATIVE_URL_BACKEND + '/trident/resource/focus/' + id );
    },    
    submitFocusCreate: function(focus = {}) {        
        return window.axios.post( process.env.MIX_BASE_RELATIVE_URL_BACKEND+'/trident/resource/focus',  focus );
    },
    submitFocusEdit: function(focus = {}) {
        return window.axios.put( process.env.MIX_BASE_RELATIVE_URL_BACKEND + '/trident/resource/focus/' + focus.id, focus );
    },
    submitFocusGoalCreate: function(focusGoal = {}) {        
        return window.axios.post( process.env.MIX_BASE_RELATIVE_URL_BACKEND+'/trident/resource/focusgoal',  focusGoal );
    },
    submitFocusGoalEdit: function(focusGoal = {}) {
        return window.axios.put( process.env.MIX_BASE_RELATIVE_URL_BACKEND + '/trident/resource/focusgoal/' + focusGoal.id, focusGoal );
    },

    requestPlayer: function(id = '') {
        return window.axios.get( process.env.MIX_BASE_RELATIVE_URL_BACKEND + '/trident/resource/player/' + id );
    }, 
    submitPlayerCreate: function(player = {}) {        
        return window.axios.post( process.env.MIX_BASE_RELATIVE_URL_BACKEND+'/trident/resource/player',  player );
    },
    submitPlayerEdit: function(player = {}) {
        return window.axios.put( process.env.MIX_BASE_RELATIVE_URL_BACKEND + '/trident/resource/player/' + player.id, player );
    },
    submitReputationItemCreate: function(reputation_item = {}) {        
        return window.axios.post( process.env.MIX_BASE_RELATIVE_URL_BACKEND+'/trident/resource/reputationItem',  reputation_item );
    },
    submitReputationItemEdit: function(reputation_item = {}) {
        return window.axios.put( process.env.MIX_BASE_RELATIVE_URL_BACKEND + '/trident/resource/reputationItem/' + reputation_item.id, reputation_item );
    },
};

export default serverApiClient;
