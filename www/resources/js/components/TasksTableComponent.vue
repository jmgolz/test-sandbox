<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        I'm an example component.
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
            // console.log('Component mounted.')
            this.getTasks();
        },
        methods: {
            getTasks() {
                return axios.get('/api/tasks')
                    .then(response => {
                        console.log(response);
                    }).catch(console.error)
            }
        }
    }
</script>
