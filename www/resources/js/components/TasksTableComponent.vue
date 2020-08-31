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
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                tasks: []
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
            deleteTask(id) {
                return axios.post('/api/tasks/' + id, {_method: 'DELETE'})
                    .then(this.getTasks)
                    .catch(console.error);
            }
        }
    }
</script>
