<template>
    <div class="row">
        <div class="col">
        <input class="form-control" v-model="value">
        </div>
        <div class="col-2">
        <button :disabled='!value' class="btn btn-primary float-right" @click="addTodo(value)">ADD TODO</button>
        </div>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
               value: '',
            }
        },
        methods: {
            addTodo(value){
                axios.post('/api/todos', {
                    todo: this.value,
                    status: 'ongoing'
                })
                this.$emit('update');
            }
        }
    }
</script>
