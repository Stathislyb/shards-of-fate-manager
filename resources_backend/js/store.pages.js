
// //vvv does not work in vanilla laravel
// require('fs').readdirSync(__dirname + '/').forEach(function(file) {
//     if (file.match(/\.vue$/) !== null) {
//         var name = file.replace('.vue', '');
//         exports[name] = require('./' + file);
//     }
// });
// //^^^

//pages
exports.index = require("./store/pages/Index.js").default;

exports.chapter_list_delete = require("./store/pages/chapter_list_delete.js").default;
exports.chapter_create = require("./store/pages/chapter_create.js").default;
exports.chapter_update = require("./store/pages/chapter_update.js").default;
exports.chapter_list_delete = require("./store/pages/chapter_list_delete.js").default;
exports.chapter_create = require("./store/pages/chapter_create.js").default;
exports.chapter_update = require("./store/pages/chapter_update.js").default;
exports.chapter_list_delete = require("./store/pages/chapter_list_delete.js").default;
exports.chapter_create = require("./store/pages/chapter_create.js").default;
exports.chapter_update = require("./store/pages/chapter_update.js").default;
exports.episode_list_delete = require("./store/pages/episode_list_delete.js").default;
exports.episode_create = require("./store/pages/episode_create.js").default;
exports.episode_update = require("./store/pages/episode_update.js").default;
exports.session_list_delete = require("./store/pages/session_list_delete.js").default;
exports.session_create = require("./store/pages/session_create.js").default;
exports.session_update = require("./store/pages/session_update.js").default;
exports.session_list_delete = require("./store/pages/session_list_delete.js").default;
exports.session_create = require("./store/pages/session_create.js").default;
exports.session_update = require("./store/pages/session_update.js").default;
exports.player_list_delete = require("./store/pages/player_list_delete.js").default;
exports.player_create = require("./store/pages/player_create.js").default;
exports.player_update = require("./store/pages/player_update.js").default;
exports.character_list_delete = require("./store/pages/character_list_delete.js").default;
exports.character_create = require("./store/pages/character_create.js").default;
exports.character_update = require("./store/pages/character_update.js").default;
exports.npc_list_delete = require("./store/pages/npc_list_delete.js").default;
exports.npc_create = require("./store/pages/npc_create.js").default;
exports.npc_update = require("./store/pages/npc_update.js").default;