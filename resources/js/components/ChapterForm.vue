<template>
    <div class="chapter_create">
        <Form ref="formValidate" :model="formValidate" :rules="ruleValidate" :label-width="150">
            
            <FormItem label="Name" prop="name">
                <Input v-model="formValidate.name" placeholder="Enter chapter's name"></Input>
            </FormItem>
            <FormItem label="Description" prop="description">
                <Input v-model="formValidate.description" placeholder="Enter chapter's description" type="textarea" :autosize="true"></Input>
            </FormItem>
            
            <FormItem>
                <Button type="primary" @click="handleSubmit('formValidate')">Submit</Button>
            </FormItem>
        </Form>
    </div>    
</template>
<script>
    const namespace = 'components/ChapterForm';
    export default {
        namespace: namespace,
        name: 'ChapterForm',
        props: {
            editChapter: Object,
        },
        data () {
            return {
                formValidate: {
                    name: '',
                    description: '',
                },
                ruleValidate: {
                    name: [
                        { 
                            required: true, 
                            type: 'string', 
                            trigger: 'blur',
                            message: 'The name cannot be empty', 
                        }
                    ],
                    description: [
                        { 
                            required: false, 
                            type: 'string', 
                            trigger: 'blur',
                            message: 'The description must be a string', 
                        }
                    ],

                },
            };
        },
        watch: {
            editChapter: function (newValue, oldValue) {
                if(newValue !== oldValue) {
                    this.applyPropValues();
                }
            }
        },   
        methods: {
            applyPropValues(){
                if(this.editChapter.id){
                    this.formValidate = {
                        name: this.editChapter.name,
                        description: this.editChapter.description,
                    };
                } else {
                    this.formValidate = {
                        name: '',
                        description: '',
                    };
                }
            },

            handleSubmit (name) {
                this.$refs[name].validate((valid) => {
                    if (valid) {                        
                        var chapter = this.formValidate;
                        if(this.editChapter.id){
                            chapter.id = this.editChapter.id;
                            this.$emit('onChapterEdit', chapter);        
                        } else {
                            this.$emit('onChapterCreate', chapter);
                        }                    
                    }
                })
            },
        },
        mounted() {
            this.applyPropValues();
        },
    }
</script>