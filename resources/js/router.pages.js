
// //vvv does not work in vanilla laravel
// require('fs').readdirSync(__dirname + '/').forEach(function(file) {
//     if (file.match(/\.vue$/) !== null) {
//         var name = file.replace('.vue', '');
//         exports[name] = require('./' + file);
//     }
// });
// //^^^

//pages
exports.home = require("./pages/home.vue").default;
exports.focus = require("./pages/focus.vue").default;
exports.players = require("./pages/players.vue").default;
