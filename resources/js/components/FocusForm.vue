<template>
    <div class="focus_create">
        <Form ref="formValidate" :model="formValidate" :rules="ruleValidate" :label-width="150">
            <FormItem label="Name" prop="name">
                <Input v-model="formValidate.name" placeholder="Enter focus's name"></Input>
            </FormItem>
            <FormItem label="Description" prop="description">
                <Input v-model="formValidate.description" placeholder="Enter focus's description"></Input>
            </FormItem>
            
            <FormItem>
                <Button type="primary" @click="handleSubmit('formValidate')">Submit</Button>
            </FormItem>
        </Form>
    </div>    
</template>
<script>
    const namespace = 'components/FocusForm';
    export default {
        namespace: namespace,
        name: 'FocusForm',
        props: {
            editFocus: Object,
            selectedChapter: Number,
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
            editFocus: function (newValue, oldValue) {
                if(newValue !== oldValue) {
                    this.applyPropValues();
                }
            }
        },   
        methods: {
            applyPropValues(){
                if(this.editFocus.id){
                    this.formValidate = {
                        name: this.editFocus.name,
                        description: this.editFocus.description,
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
                    if (valid && this.selectedChapter > 0) {                        
                        var focus = this.formValidate;
                        focus.chapter_id = this.selectedChapter;
                        if(this.editFocus.id){
                            focus.id = this.editFocus.id;
                            this.$emit('onFocusEdit', focus);        
                        } else {
                            this.$emit('onFocusCreate', focus);
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