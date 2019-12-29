<template>
    <List item-layout="vertical">
        <ListItem v-for="focusItem in this.focus" :key="focusItem.id" >
            <ListItemMeta :title="calculateFocusFocusName(focusItem.name, focusItem.spend_weeks)" :description="focusItem.description" /> 
            <Button shape="circle" @click="triggerIncreaseFocus(focusItem)" type="success" icon="ios-arrow-up">Add Week</Button>
            <Button shape="circle" @click="triggerDecreaseFocus(focusItem)" type="warning" icon="ios-arrow-down">Subtract Week</Button>
            <Button shape="circle" @click="triggerEditFocus(focusItem)" icon="ios-create-outline">Edit Focus</Button>
            <Button shape="circle" @click="triggerAddFocusGoal(focusItem)" icon="ios-cog-outline">Add Focus Goal</Button>
            <List item-layout="vertical">
                <ListItem v-for="focusGoal in focusItem.focus_goals" :key="focusGoal.id" >
                <Row>
                    <Col span="6">                        
                        <Button type="text" class="inline-edit-btn" @click="triggerEditFocusGoal(focusGoal)" icon="ios-create-outline" />
                        {{focusGoal.name}}
                    </Col>
                    <Col span="18">
                        <Tooltip :content="calculateFocusTooltip(focusGoal.goal_weeks, focusItem.spend_weeks)">
                            <Progress style="width:250px" :percent="calculateFocusPercentage(focusGoal.goal_weeks, focusItem.spend_weeks)" />
                        </Tooltip>
                    </Col>
                </Row>
                    <i>{{focusGoal.description}}</i>
                </ListItem>
            </List>
            
        </ListItem>

        <ListItem>
            <Button @click="triggerMakeNewFocus" shape="circle" icon="md-add">Add New Focus</Button>
        </ListItem>
    </List>
</template>

<script>
    const namespace = 'components/FocusList';
    export default {
        namespace: namespace,
        name: 'FocusList',
        props: {
            focus: Array,
        },
        data () {
            return {};
        },
        methods: {
            triggerMakeNewFocus() {
                this.$emit('onMakeNewFocus');
            },
            triggerEditFocus(focus) {
                this.$emit('onEditFocus', focus);
            },
            triggerAddFocusGoal(focus) {
                this.$emit('onAddFocusGoal', {focus_id: focus.id});
            },
            triggerEditFocusGoal(focusGoal) {
                this.$emit('onEditFocusGoal', focusGoal);
            },
            triggerIncreaseFocus(focus) {
                this.$emit('onIncreaseFocus', focus);
            },
            triggerDecreaseFocus(focus) {
                this.$emit('onDecreaseFocus', focus);
            },
            calculateFocusFocusName(name, spendWeeks) {
                return name + " (" + spendWeeks + ")";
            },
            calculateFocusTooltip(maximum, current) {
                let tooltip = current + ' / ' + maximum;
                if(current >= maximum){
                    tooltip = maximum + ' / ' + maximum;
                }
                return tooltip;
            },
            calculateFocusPercentage(maximum, current) {
                let progress = 0;
                if( maximum > 0){
                    progress = Math.round((current / maximum) * 100);
                }
                if(current >= maximum){
                    progress = 100;
                }
                return progress;
            },
        },
    }
</script>