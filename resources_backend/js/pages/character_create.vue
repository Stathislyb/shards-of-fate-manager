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
    <div class="character_create">
        <Row type="flex" justify="center" align="middle">
            <Col span="24">
                <h1>
                    test
                </h1>


                <Form ref="formValidate" :model="formValidate" :rules="ruleValidate" :label-width="150">
                    

                    <FormItem label="player_id" prop="player_id">
                        <InputNumber v-model="formValidate.player_id" placeholder="Enter your player_id"></InputNumber>
                    </FormItem>
                    <FormItem label="name" prop="name">
                        <Input v-model="formValidate.name" placeholder="Enter your name"></Input>
                    </FormItem>
                    <FormItem label="race" prop="race">
                        <Input v-model="formValidate.race" placeholder="Enter your race"></Input>
                    </FormItem>
                    <FormItem label="class" prop="class">
                        <Input v-model="formValidate.class" placeholder="Enter your class"></Input>
                    </FormItem>
                    <FormItem label="level" prop="level">
                        <Input v-model="formValidate.level" placeholder="Enter your level"></Input>
                    </FormItem>
                    <FormItem label="unique_thing" prop="unique_thing">
                        <Input v-model="formValidate.unique_thing" placeholder="Enter your unique_thing"></Input>
                    </FormItem>
                    <FormItem label="focus" prop="focus">
                        <Input v-model="formValidate.focus" placeholder="Enter your focus"></Input>
                    </FormItem>
                    <FormItem label="start_date" prop="start_date">
                        <Input v-model="formValidate.start_date" placeholder="Enter your start_date"></Input>
                    </FormItem>
                    <FormItem label="death_date" prop="death_date">
                        <Input v-model="formValidate.death_date" placeholder="Enter your death_date"></Input>
                    </FormItem>
                    <FormItem label="notes" prop="notes">
                        <Input v-model="formValidate.notes" placeholder="Enter your notes"></Input>
                    </FormItem>
                    
                    
                    <FormItem>
                        <Button type="primary" @click="handleSubmit('formValidate')">Submit</Button>
                    </FormItem>
                </Form>


            </Col>
        </Row>
    </div>
</template>
<script>
    export default {
        data() {
            var state = {
                formValidate: {
                    player_id: '',
                    name: '',
                    race: '',
                    class: '',
                    level: '',
                    unique_thing: '',
                    focus: '',
                    start_date: '',
                    death_date: '',
                    notes: '',
                },
            };
            if (this.$store.state.pages.character_create) 
            {
                state = this.$store.state.pages.character_create;
            }

            //
            //component state registration
            return {
                ...state,
                ruleValidate: {

                    player_id: [
                        { 
                            required: true, 
                            type: 'number', 
                            trigger: 'blur',
                            message: 'The player_id cannot be empty', 
                        }
                    ],
                    name: [
                        { 
                            required: true, 
                            type: 'string', 
                            trigger: 'blur',
                            message: 'The name cannot be empty', 
                        }
                    ],
                    race: [
                        { 
                            required: true, 
                            type: 'string', 
                            trigger: 'blur',
                            message: 'The race cannot be empty', 
                        }
                    ],
                    class: [
                        { 
                            required: true, 
                            type: 'string', 
                            trigger: 'blur',
                            message: 'The class cannot be empty', 
                        }
                    ],
                    level: [
                        { 
                            required: true, 
                            type: 'string', 
                            trigger: 'blur',
                            message: 'The level cannot be empty', 
                        }
                    ],
                    unique_thing: [
                        { 
                            required: true, 
                            type: 'string', 
                            trigger: 'blur',
                            message: 'The unique_thing cannot be empty', 
                        }
                    ],
                    focus: [
                        { 
                            required: true, 
                            type: 'string', 
                            trigger: 'blur',
                            message: 'The focus cannot be empty', 
                        }
                    ],
                    start_date: [
                        { 
                            required: true, 
                            type: 'string', 
                            trigger: 'blur',
                            message: 'The start_date cannot be empty', 
                        }
                    ],
                    death_date: [
                        { 
                            required: true, 
                            type: 'string', 
                            trigger: 'blur',
                            message: 'The death_date cannot be empty', 
                        }
                    ],
                    notes: [
                        { 
                            required: true, 
                            type: 'string', 
                            trigger: 'blur',
                            message: 'The notes cannot be empty', 
                        }
                    ],

                },

            };
        },
        watch: {
            formValidate: {
                deep: true,
                handler(value) 
                {
                    this.$store.commit('pages/character_create/setFormValidate', value);
                }
            }
        },
        methods: {
            ajax() {
                var self = this;
                return {
                    create(data) {

                        var form_data = new FormData();
                        
                        for (const key in data) {
                            if (data.hasOwnProperty(key)) {
                                const element = data[key];
                                
                                if (key == 'file') {
                                    form_data.append(key, data[key], data[key].name);
                                } else {
                                    form_data.append(key, data[key]);
                                }
                            }
                        }

                        window.axios.post( process.env.MIX_BASE_RELATIVE_URL_BACKEND+'/trident/resource/Character',  form_data ).then((response) => {
                            // Once AJAX resolves we can update the Crud with the new color
                            self.$Message.success('Success!');
                        }).catch(error => {
                            console.log(error);
                        });
                    },
                }
            },
            handleUpload (file) {
                this.formValidate.file = file;
                return false;
            },
            handleSubmit (name) {
                this.$refs[name].validate((valid) => {
                    if (valid) {
                        
                        var formValidate = this.formValidate;

                        this.ajax().create(formValidate);
                        
                    } else {
                        this.$Message.error('Fail!');
                    }
                })
            },
        },
        mounted() {
            // console.log('test form mounted');
            // console.log({
            //     // 'this.$store': this.$store,
            //     // 'this.$store.state': this.$store.state,
            //     // 'this.$store.state.Index': this.$store.state.Index,
            //     'this.$route': this.$route,
            // });
        },
    }
</script>
