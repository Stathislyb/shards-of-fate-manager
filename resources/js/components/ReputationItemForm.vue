<template>
    <div class="reputation_item_create">
        <Form ref="formValidate" :model="formValidate" :rules="ruleValidate" :label-width="150">
            <FormItem label="Name" prop="name">
                <Input v-model="formValidate.name" placeholder="Enter item's name"></Input>
            </FormItem>
            <FormItem label="Description" prop="description">
                <Input v-model="formValidate.description" placeholder="Enter item's description"></Input>
            </FormItem>
            <FormItem label="Reputation cost" prop="reputation_cost">
                <Input v-model="formValidate.reputation_cost" placeholder="Enter item's reputation cost" number></Input>
            </FormItem>
            
            <FormItem>
                <Button type="primary" @click="handleSubmit('formValidate')">Submit</Button>
            </FormItem>
        </Form>
    </div>    
</template>
<script>
    const namespace = 'components/ReputationItemForm';
    export default {
        namespace: namespace,
        name: 'ReputationItemForm',
        props: {
            editReputationItem: Object,
        },
        data () {
            return {
                formValidate: {
                    name: '',
                    description: '',
                    reputation_cost: 0,
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
                    reputation_cost: [
                        { 
                            required: true, 
                            type: 'integer', 
                            trigger: 'blur',
                            message: 'The item\'s reputation cost must be a number', 
                        }
                    ],

                },
            };
        },
        watch: {
            editReputationItem: function (newValue, oldValue) {
                if(newValue !== oldValue) {
                    this.applyPropValues();
                }
            }
        },   
        methods: {
            applyPropValues(){
                if(this.editReputationItem.id){
                    this.formValidate = {
                        name: this.editReputationItem.name,
                        description: this.editReputationItem.description,
                        reputation_cost: this.editReputationItem.reputation_cost,
                    };
                } else {
                    this.formValidate = {
                        name: '',
                        description: '',
                        reputation_cost: 0,
                    };
                }
            },

            handleSubmit (name) {
                this.$refs[name].validate((valid) => {
                    if (valid && this.editReputationItem.player_id > 0) {                        
                        var reputation_item = this.formValidate;
                        reputation_item.player_id = this.editReputationItem.player_id;
                        if(this.editReputationItem.id){
                            reputation_item.id = this.editReputationItem.id;
                            this.$emit('onReputationItemEdit', reputation_item);        
                        } else {
                            this.$emit('onReputationItemCreate', reputation_item);
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