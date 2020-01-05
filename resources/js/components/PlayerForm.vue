<template>
    <div class="player_create">
        <Form ref="formValidate" :model="formValidate" :rules="ruleValidate" :label-width="150">
            
            <FormItem label="Name" prop="name">
                <Input v-model="formValidate.name" placeholder="Enter player's name"></Input>
            </FormItem>
            <FormItem label="Reputation" prop="reputation">
                <Input v-model="formValidate.reputation" placeholder="Enter player's reputation" number></Input>
            </FormItem>
            <FormItem label="Notes" prop="notes">
                <Input v-model="formValidate.notes" placeholder="Enter player's notes" type="textarea" :autosize="true"></Input>
            </FormItem>
            
            <FormItem>
                <Button type="primary" @click="handleSubmit('formValidate')">Submit</Button>
            </FormItem>
        </Form>
    </div>    
</template>
<script>
    const namespace = 'components/PlayerForm';
    export default {
        namespace: namespace,
        name: 'PlayerForm',
        props: {
            editPlayer: Object,
        },
        data () {
            return {
                formValidate: {
                    name: '',
                    notes: '',
                    reputation: 0,
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
                    notes: [
                        { 
                            required: false, 
                            type: 'string', 
                            trigger: 'blur',
                            message: 'The notes must be a string', 
                        }
                    ],
                    reputation: [
                        { 
                            required: true, 
                            type: 'integer', 
                            trigger: 'blur',
                            message: 'The player\'s reputation must be a number', 
                        }
                    ],
                },
            };
        },
        watch: {
            editPlayer: function (newValue, oldValue) {
                if(newValue !== oldValue) {
                    this.applyPropValues();
                }
            }
        },   
        methods: {
            applyPropValues(){
                if(this.editPlayer.id){
                    this.formValidate = {
                        name: this.editPlayer.name,
                        notes: this.editPlayer.notes,
                        reputation: this.editPlayer.reputation,
                    };
                } else {
                    this.formValidate = {
                        name: '',
                        notes: '',
                        reputation: 0,
                    };
                }
            },

            handleSubmit (name) {
                this.$refs[name].validate((valid) => {
                    if (valid) {                        
                        var player = this.formValidate;
                        if(this.editPlayer.id){
                            player.id = this.editPlayer.id;
                            this.$emit('onPlayerEdit', player);        
                        } else {
                            this.$emit('onPlayerCreate', player);
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