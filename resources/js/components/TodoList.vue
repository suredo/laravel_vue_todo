<template>

    <div>
        <todo-item @update='update' v-for="(item, index) in todoList" :key='index' :todoItem='item' />
    </div>

</template>

<script>
import TodoItem from './TodoItem.vue';
    export default {
  components: { TodoItem },
        props: ['todoList'],
        methods: {
            update(){
                this.$emit('update')
            }
        }
    }
</script>
