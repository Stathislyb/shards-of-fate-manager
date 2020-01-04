
// //vvv does not work in vanilla laravel
// require('fs').readdirSync(__dirname + '/').forEach(function(file) {
//     if (file.match(/\.vue$/) !== null) {
//         var name = file.replace('.vue', '');
//         exports[name] = require('./' + file);
//     }
// });
// //^^^

//pages
exports.home = require("./store/pages/home.js").default;
exports.focus = require("./store/pages/focus.js").default;
exports.players = require("./store/pages/players.js").default;