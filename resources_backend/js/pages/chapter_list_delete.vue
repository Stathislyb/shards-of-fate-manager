<style scoped>
    .index {
        width: 100%;
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        text-align: center;
    }
        .index h1 {
            height: 150px;
        }
            .index h1 img {
                height: 100%;
            }
        .index h2 {
            color: #666;
            margin-bottom: 200px;
        }
            .index h2 p {
                margin: 0 0 50px;
            }
    .ivu-row-flex {
        height: 100%;
    }
</style>
<template>
    <div class="chapter_list_delete">
        <Row type="flex" justify="center" align="middle">
            <Col span="24">

                <Row type="flex" justify="end" style="margin-bottom: 20px;">
                    <Col>
                        <Button type="primary" @click="on_create_button_clicked">Create</Button>
                    </Col>
                </Row>

                <Row>
                    <Col>
                        <Table border :columns="columns" :data="data"></Table>
                     </Col>
                </Row>

            </Col>
        </Row>
    </div>
</template>
<script>
    export default {
        data() {
            var state = {
                formValidate: {
                },
            };
            if (this.$store.state.pages.chapter_list_delete) 
            {
                state = this.$store.state.pages.chapter_list_delete;
            }


            //
            //component state registration
            return {
                ...state,
                columns: [
                    {
                        title: 'name',
                        key: 'name',
                        minWidth: 100,
                    },
                    {
                        title: 'description',
                        key: 'description',
                        minWidth: 100,
                    },
                    {
                        title: 'Action',
                        key: 'action',
                        width: 150,
                        align: 'center',
                        render: (h, params) => {
                            var row = params.row;

                            return h('div', [
                                h('Button', {
                                    props: {
                                        type: 'primary',
                                        size: 'small'
                                    },
                                    style: {
                                        marginRight: '5px'
                                    },
                                    on: {
                                        click: () => {
                                            this.$router.push({ name: 'chapter_update', params: { id: row.id } });
                                        }
                                    }
                                }, 'Edit'),
                                h('Button', {
                                    props: {
                                        type: 'error',
                                        size: 'small'
                                    },
                                    on: {
                                        click: () => {
                                            this.ajax().delete(row.id);
                                        }
                                    }
                                }, 'Delete')
                            ]);
                        }
                    }
                ],
                data: []


            };
        },
        watch: {
            formValidate: {
                deep: true,
                handler(value) 
                {
                    this.$store.commit('pages/chapter_list_delete/setFormValidate', value);
                }
            }
        },
        methods: {
            ajax() {
                var self = this;
                return {
                    get(id='') {
                        window.axios.get( process.env.MIX_BASE_RELATIVE_URL_BACKEND+'/trident/resource/Chapter'+id ).then(({ data }) => {
                            // console.log(data);
                            self.data = data;
                        }).catch(error => {
                            console.log(error);
                        });
                    },
                    delete(id) {
                        window.axios.delete( process.env.MIX_BASE_RELATIVE_URL_BACKEND+'/trident/resource/Chapter/'+id ).then(({ data }) => {
                            // console.log(data);
                            window.location.reload();
                        }).catch(error => {
                            console.log(error);
                        });
                    }
                }
            },
            on_create_button_clicked() {
                this.$router.push({ name: 'chapter_create' });
            },
        },
        mounted() {
            // console.log('test list mounted');
            // console.log({
            //     // 'this.$store': this.$store,
            //     // 'this.$store.state': this.$store.state,
            //     // 'this.$store.state.Index': this.$store.state.Index,
            //     'this.$route': this.$route,
            // });

            this.ajax().get();

        },
    }
</script>
