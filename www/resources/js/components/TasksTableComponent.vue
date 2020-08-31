<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Tasks - TODOs</div>

                    <div class="card-body">
                         <table class="table table-striped table-bordered">
                            <thead class="thead-dark">
                                <th>Name</th>
                                <th></th>
                            </thead>
                            <tbody>
                                <tr v-for="task in tasks" :key="task.id">
                                    <td>{{ task.task }}</td>
                                    <td align="center"><button class="btn btn-danger btn-sm" @click.prevent="deleteTask(task.id)"><i class="fa fa-times" /> Delete</button></td>
                                </tr>                
                            </tbody>
                        </table>
                    </div>

                <div class="card-footer">
                        <form @submit.prevent="createTask">
                            <div class="row">
                                <div class="col col-md-8">
                                    <div class="form-group">
                                        <input 
                                            class="form-control" 
                                            id="task-name"
                                            v-model="taskName"
                                            placeholder="Add new todo"
                                            required
                                        >
                                    </div>
                                </div>
                                <div class="col col-md-4">
                                    <button class="btn btn-success btn-sm">Add To-Do</button>                                        
                                </div>
                            </div>                                    
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                tasks: [],
                taskName: ''
            };
        },
        mounted() {
            this.getTasks();
        },
        methods: {
            getTasks() {
                return axios.get('/api/tasks')
                    .then(response => {
                        this.tasks = response.data;
                    }).catch(console.error)
            },
            createTask() {
                return axios.post('api/tasks', {task: this.taskName})
                    .then(response => {
                        this.tasks.push(response.data);
                        this.taskName = '';
                    })
                    .catch(console.error);
            },
            deleteTask(id) {
                return axios.post('/api/tasks/' + id, {_method: 'DELETE'})
                    .then(this.getTasks)
                    .catch(console.error);
            }
        }
    }
</script>
