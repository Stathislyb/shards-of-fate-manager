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
];
export default main_menu;