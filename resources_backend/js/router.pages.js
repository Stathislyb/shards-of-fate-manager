
// //vvv does not work in vanilla laravel
// require('fs').readdirSync(__dirname + '/').forEach(function(file) {
//     if (file.match(/\.vue$/) !== null) {
//         var name = file.replace('.vue', '');
//         exports[name] = require('./' + file);
//     }
// });
// //^^^

//pages
exports.index = require("./pages/index.vue").default;

exports.chapter_list_delete = require("./pages/chapter_list_delete.vue").default;
exports.chapter_create = require("./pages/chapter_create.vue").default;
exports.chapter_update = require("./pages/chapter_update.vue").default;
exports.chapter_list_delete = require("./pages/chapter_list_delete.vue").default;
exports.chapter_create = require("./pages/chapter_create.vue").default;
exports.chapter_update = require("./pages/chapter_update.vue").default;
exports.chapter_list_delete = require("./pages/chapter_list_delete.vue").default;
exports.chapter_create = require("./pages/chapter_create.vue").default;
exports.chapter_update = require("./pages/chapter_update.vue").default;
exports.episode_list_delete = require("./pages/episode_list_delete.vue").default;
exports.episode_create = require("./pages/episode_create.vue").default;
exports.episode_update = require("./pages/episode_update.vue").default;
exports.session_list_delete = require("./pages/session_list_delete.vue").default;
exports.session_create = require("./pages/session_create.vue").default;
exports.session_update = require("./pages/session_update.vue").default;
exports.session_list_delete = require("./pages/session_list_delete.vue").default;
exports.session_create = require("./pages/session_create.vue").default;
exports.session_update = require("./pages/session_update.vue").default;
exports.player_list_delete = require("./pages/player_list_delete.vue").default;
exports.player_create = require("./pages/player_create.vue").default;
exports.player_update = require("./pages/player_update.vue").default;
exports.character_list_delete = require("./pages/character_list_delete.vue").default;
exports.character_create = require("./pages/character_create.vue").default;
exports.character_update = require("./pages/character_update.vue").default;
exports.npc_list_delete = require("./pages/npc_list_delete.vue").default;
exports.npc_create = require("./pages/npc_create.vue").default;
exports.npc_update = require("./pages/npc_update.vue").default;