const serverApiClient = {

    requestChapter: function(id = '')
    {
        return window.axios.get( process.env.MIX_BASE_RELATIVE_URL_BACKEND + '/trident/resource/Chapter' + id );
    }
    
};

export default serverApiClient;
