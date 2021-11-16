<template>
    <div class="row todo-item">
        <div class="col">
            <p @click="toggleTodo(todoItem.id)" :class='[todoItem.status === "ongoing" ? "" : "done"]'>{{todoItem.todo}}</p>
        </div>
        <div class="col-1">
            <button class="btn btn-danger btn-sm float-right" v-if="todoItem.status === 'done'" @click="deleteTodo(todoItem.id)">X</button>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['todoItem'],
        methods: {
            toggleTodo(value){
                axios.put('/api/todos/' + value, {
                    todo: this.todoItem.todo,
                    status: this.todoItem.status === 'ongoing' ? 'done' : 'ongoing'
                })
                this.$emit('update');
            },
            deleteTodo(value){
                axios.delete('/api/todos/' + value)
                this.$emit('update');
            }
        }
    }
</script>
