const serverApiClient = {

    requestChapter: function(id = '') {
        return window.axios.get( process.env.MIX_BASE_RELATIVE_URL_BACKEND + '/trident/resource/Chapter' + id );
    },    
    submitChapterCreate: function(chapter = {}) {        
        return window.axios.post( process.env.MIX_BASE_RELATIVE_URL_BACKEND+'/trident/resource/Chapter',  chapter );
    },
    submitChapterEdit: function(chapter = {}) {
        const payload = {
            ...chapter,
            _method: 'PATCH'
        }
        return window.axios.get( process.env.MIX_BASE_RELATIVE_URL_BACKEND + '/trident/resource/Chapter' + chapter.id, payload );
    }
    
};

export default serverApiClient;
