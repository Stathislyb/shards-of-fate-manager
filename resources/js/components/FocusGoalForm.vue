<template>
    <div class="focus_goal_create">
        <Form ref="formValidate" :model="formValidate" :rules="ruleValidate" :label-width="150">
            <FormItem label="Name" prop="name">
                <Input v-model="formValidate.name" placeholder="Enter focus goal's name"></Input>
            </FormItem>
            <FormItem label="Description" prop="description">
                <Input v-model="formValidate.description" placeholder="Enter focus goal's description/reward"></Input>
            </FormItem>
            <FormItem label="Goal weeks" prop="goal_weeks">
                <Input v-model="formValidate.goal_weeks" placeholder="Enter focus goal's weeks to be complete" number></Input>
            </FormItem>
            
            <FormItem>
                <Button type="primary" @click="handleSubmit('formValidate')">Submit</Button>
            </FormItem>
        </Form>
    </div>    
</template>
<script>
    const namespace = 'components/FocusGoalForm';
    export default {
        namespace: namespace,
        name: 'FocusGoalForm',
        props: {
            editFocusGoal: Object,
        },
        data () {
            return {
                formValidate: {
                    name: '',
                    description: '',
                    goal_weeks: 0,
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
                    goal_weeks: [
                        { 
                            required: true, 
                            type: 'integer', 
                            trigger: 'blur',
                            message: 'The focus goal\'s weeks must be a number', 
                        }
                    ],

                },
            };
        },
        watch: {
            editFocusGoal: function (newValue, oldValue) {
                if(newValue !== oldValue) {
                    this.applyPropValues();
                }
            }
        },   
        methods: {
            applyPropValues(){
                if(this.editFocusGoal.id){
                    this.formValidate = {
                        name: this.editFocusGoal.name,
                        description: this.editFocusGoal.description,
                        goal_weeks: this.editFocusGoal.goal_weeks,
                    };
                } else {
                    this.formValidate = {
                        name: '',
                        description: '',
                        goal_weeks: 0,
                    };
                }
            },

            handleSubmit (name) {
                this.$refs[name].validate((valid) => {
                    if (valid && this.editFocusGoal.focus_id > 0) {                        
                        var focus_goal = this.formValidate;
                        focus_goal.focus_id = this.editFocusGoal.focus_id;
                        if(this.editFocusGoal.id){
                            focus_goal.id = this.editFocusGoal.id;
                            this.$emit('onFocusGoalEdit', focus_goal);        
                        } else {
                            this.$emit('onFocusGoalCreate', focus_goal);
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