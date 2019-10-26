const main_menu = [
    {
        name: '1',
        icon_type: 'ios-navigate',
        text: 'chapters',
        redirect_url: process.env.MIX_BASE_RELATIVE_URL_BACKEND+'/chapter_list',
    },
    {
        name: '2',
        icon_type: 'ios-navigate',
        text: 'episodes',
        redirect_url: process.env.MIX_BASE_RELATIVE_URL_BACKEND+'/episode_list',
    },
    {
        name: '3',
        icon_type: 'ios-navigate',
        text: 'sessions',
        redirect_url: process.env.MIX_BASE_RELATIVE_URL_BACKEND+'/session_list',
    },
    {
        name: '4',
        icon_type: 'ios-navigate',
        text: 'players',
        redirect_url: process.env.MIX_BASE_RELATIVE_URL_BACKEND+'/player_list',
    },
    {
        name: '5',
        icon_type: 'ios-navigate',
        text: 'characters',
        redirect_url: process.env.MIX_BASE_RELATIVE_URL_BACKEND+'/character_list',
    },
    {
        name: '6',
        icon_type: 'ios-navigate',
        text: 'npcs',
        redirect_url: process.env.MIX_BASE_RELATIVE_URL_BACKEND+'/npc_list',
    },
];
export default main_menu;