<template>
    <div class="container">
        <h3>Adicione um todo</h3>
        <todo-input @update='update'/>
        <todo-list @update='update' :todoList='todoList'/>
    </div>
</template>

<script>
import TodoInput from './TodoInput.vue'
import TodoList from './TodoList.vue'
    export default {
        beforeMount: function () {
            axios.get('/api/todos').then(data => this.todoList = data.data)
        },
        components: { TodoInput, TodoList },
        data: function () {
            return {
                todoList: []
            }
        },
        methods: {
            update(){
                axios.get('/api/todos').then(data => this.todoList = data.data)
            }
        }
    }
</script>
