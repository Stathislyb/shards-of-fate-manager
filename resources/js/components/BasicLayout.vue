<style scoped>
    .layout-con{
        height: 100%;
        width: 100%;
    }
    .menu-item span{
        display: inline-block;
        overflow: hidden;
        width: 69px;
        text-overflow: ellipsis;
        white-space: nowrap;
        vertical-align: bottom;
        transition: width .2s ease .2s;
    }
    .menu-item i{
        transform: translateX(0px);
        transition: font-size .2s ease, transform .2s ease;
        vertical-align: middle;
        font-size: 16px;
    }
    .collapsed-menu span{
        width: 0px;
        transition: width .2s ease;
    }
    .collapsed-menu i{
        transform: translateX(5px);
        transition: font-size .2s ease .2s, transform .2s ease .2s;
        vertical-align: middle;
        font-size: 22px;
    }

    .router-link-exact-active {
        color: black;
    }
        .router-link-exact-active:hover {
            text-decoration: none;
        }
    .router-link-active {
        color: black;
    }
        .router-link-active:hover {
            text-decoration: none;
        }
    .link-style-black {
        color: black;
    }

    .ivu-menu.ivu-menu-horizontal{
        height: 65px;
    }

    .ivu-menu.menu-item .ivu-menu-item{
        padding: 0;
    }

    .ivu-menu-item .router-link:hover{
        text-decoration: none;
    }

    .ivu-menu-item .router-link{
        display: block;
        padding: 0px 24px;
    }
</style>
<template>
    <div class="layout">
        <Layout :style="{minHeight: '100vh'}">
            <Header :style="{background: '#fff', boxShadow: '0 2px 3px 2px rgba(0,0,0,.1)', padding: '0px 10px'}">
                <Row> 
                    <Col :xs="21" :sm="21" :md="22" :lg="22">
                        <Menu ref="main_menu" @on-select="on_main_menu_item_clicked" :active-name="active_menu_name" mode="horizontal" width="auto" :class="menuitemClasses">
                            <MenuItem v-for="menu_item in this.mainMenu" v-bind:data="menu_item" v-bind:key="menu_item.name" v-if="!menu_item.children" :name="menu_item.name">
                                <router-link :to="menu_item.redirect_url" class="router-link">
                                    <Icon :type="menu_item.icon_type"></Icon>
                                    <span>{{menu_item.text}}</span>
                                </router-link>
                            </MenuItem>
                        </Menu>
                    </Col>
                    <Col :xs="3" :sm="3" :md="2" :lg="2">
                        <Row type="flex" justify="end">
                            <Col span="12">
                                <Dropdown @on-click="onDropdownButtonClicked">
                                    <Avatar icon="ios-person" size="large" />
                                    <DropdownMenu slot="list">
                                        <DropdownItem name="logout">Logout</DropdownItem>
                                    </DropdownMenu>
                                </Dropdown>
                            </Col>
                        </Row>
                    </Col>
                </Row>
            </Header>
            <Content :style="{padding: '0 16px 16px'}">
                <Breadcrumb :style="{margin: '16px 0'}">
                    <BreadcrumbItem v-for="breadcrumb in this.breadcrumbs" v-bind:data="breadcrumb" v-bind:key="breadcrumb.text">{{breadcrumb.text}}</BreadcrumbItem>
                </Breadcrumb>

                <Card>
                    <div style="min-height: 600px">
                    
                        <slot></slot>
                        
                    </div>
                </Card>
            </Content>
        </Layout>
    </div>
</template>
<script>
    const namespace = 'components/BasicLayout';
    export default {
        namespace: namespace,
        name: 'BasicLayout',
        mixins: ['helpers/storeHelperMixin'],
        data () {
            return {
                active_menu_name: 1,
            };
        },
        computed: {
            breadcrumbs () {
                return this.getFromStore(namespace + '/breadcrumbs');
            },
            mainMenu () {
                return this.getFromStore(namespace + '/mainMenu');
            },
            menuitemClasses: function () {
                return [
                    'menu-item'
                ];
            },
        },
        methods: {
            on_main_menu_item_clicked(menu_name) {

                var indexes = menu_name.split('-');

                var main_menu = this.getFromStore(namespace + '/mainMenu');
                var current_menu_level = main_menu;

                let main_menu_breadcrumb = [];
                for (const i in indexes) {
                    main_menu_breadcrumb.push({
                        text: current_menu_level[ indexes[i]-1 ].text,
                    });
                    if (current_menu_level[ indexes[i]-1 ].children) {
                        current_menu_level = current_menu_level[ indexes[i]-1 ].children;
                    }
                }

                this.dispatchAction(namespace + '/setBreadcrumbs', main_menu_breadcrumb);
            },
            onDropdownButtonClicked(name) {
                if (name == 'logout') {
                    this.$router.push(process.env.MIX_BASE_RELATIVE_URL_BACKEND + '/logout');
                    window.location.reload();
                }
            },
        },
        mounted() {
            var navigation = this.getFromStore(namespace + '/navigation');

            var current_menu = navigation.main_menu[0];

            for (const i in navigation.main_menu) {
                if (navigation.main_menu.hasOwnProperty(i)) {
                    const element = navigation.main_menu[i];
                    
                    if (this.$route.matched[0] && this.$router.resolve(this.$route.matched[0].path).href === element.redirect_url) {
                        this.active_menu_name = element.name;
                        current_menu = element;
                    }
                }
            }

            const main_menu_breadcrumb = [{
                text: current_menu.text 
            }];

            this.dispatchAction(namespace + '/setBreadcrumbs', main_menu_breadcrumb);
        },
    }
</script>