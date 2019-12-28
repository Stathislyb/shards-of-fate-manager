const serverApiClient = {

    requestChapter: function(id = '') {
        return window.axios.get( process.env.MIX_BASE_RELATIVE_URL_BACKEND + '/trident/resource/chapter' + id );
    },    
    submitChapterCreate: function(chapter = {}) {        
        return window.axios.post( process.env.MIX_BASE_RELATIVE_URL_BACKEND+'/trident/resource/chapter',  chapter );
    },
    submitChapterEdit: function(chapter = {}) {
        const payload = {
            ...chapter,
            _method: 'PATCH'
        }
        return window.axios.get( process.env.MIX_BASE_RELATIVE_URL_BACKEND + '/trident/resource/chapter' + chapter.id, payload );
    },
    
    requestFocus: function(id = '') {
        return window.axios.get( process.env.MIX_BASE_RELATIVE_URL_BACKEND + '/trident/resource/focus' + id );
    },    
    submitFocusCreate: function(focus = {}) {        
        return window.axios.post( process.env.MIX_BASE_RELATIVE_URL_BACKEND+'/trident/resource/focus',  focus );
    },
    submitFocusEdit: function(focus = {}) {
        const payload = {
            ...focus,
            _method: 'PATCH'
        }
        return window.axios.get( process.env.MIX_BASE_RELATIVE_URL_BACKEND + '/trident/resource/focus' + focus.id, payload );
    }
};

export default serverApiClient;
