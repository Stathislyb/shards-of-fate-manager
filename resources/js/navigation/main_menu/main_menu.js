const main_menu = [
    {
        name: '1',
        icon_type: 'ios-navigate',
        text: 'Home',
        redirect_url: process.env.MIX_BASE_RELATIVE_URL_BACKEND+'/',
    },
    {
        name: '2',
        icon_type: 'ios-navigate',
        text: 'Focus',
        redirect_url: process.env.MIX_BASE_RELATIVE_URL_BACKEND+'/focus',
    },
    {
        name: '3',
        icon_type: 'ios-navigate',
        text: 'Players',
        redirect_url: process.env.MIX_BASE_RELATIVE_URL_BACKEND+'/players',
    },
];
export default main_menu;