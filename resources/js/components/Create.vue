<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Create Component</div>

                    <div class="card-body">
                        <form @submit.prevent="createUser" >
                            <div class="form-group">
                                <label for="exampleInputEmail1">Full name</label>
                                <input v-model="form.fullname" type="text" class="form-control" placeholder="Full name" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Upload photo</label>
                                <input type="file" class="form-control-file">
                            </div>
                            <div class="form-group">
                                <label for="inputEmail4">Communication</label>
                                <input v-model="form.communication" type="number" class="form-control" min="0" max="10" placeholder="Communication">
                            </div>
                            <div class="form-group">
                                <label for="inputEmail4">Engineer Skills</label>
                                <input v-model="form.engineer" type="number" class="form-control" min="0" max="10" placeholder="Engineer Skills">
                            </div>
                            <div class="form-group">
                                <label for="inputEmail4">Time Management</label>
                                <input v-model="form.time" type="number" class="form-control" min="0" max="10" placeholder="Time Management">
                            </div>
                            <div class="form-group">
                                <label for="inputEmail4">Languages</label>
                                <input v-model="form.language" type="number" class="form-control" min="0" max="10" placeholder="Languages">
                            </div>
                            <button type="submit" class="btn btn-primary">Add</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                form: new Form({
                    fullname: '',
                    photo: '',
                    communication: '',
                    engineer: '',
                    time: '',
                    language: ''
                })
            }
        },
        methods: {
            createUser(){
                this.form.post('api/user');
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }

</script>
