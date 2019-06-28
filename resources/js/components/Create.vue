<template>
    <div class="container mb-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header text-center">Создать сотрудника</div>

                    <div class="card-body">
                        <form @submit.prevent="createUser">
                            <div class="form-group">
                                <label for="exampleInputEmail1">ФИО</label>
                                <input v-model="form.fullname" type="text" class="form-control" placeholder="ФИО"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Загрузить фото</label>
                                <input @change="uploadPhoto" type="file" class="form-control-file">
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="inputEmail4">Коммуникация</label>
                                        <input v-model="form.communication" type="number" class="form-control" min="0"
                                            max="10" placeholder="Коммуникация от 0 до 10">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="inputEmail4">Инженерные навыки</label>
                                        <input v-model="form.engineer" type="number" class="form-control" min="0"
                                            max="10" placeholder="Инженерные навыки от 0 до 10">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="inputEmail4">Тайм менеджмент</label>
                                        <input v-model="form.time" type="number" class="form-control" min="0" max="10"
                                            placeholder="Тайм менеджмент от 0 до 10">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="inputEmail4">Знание языков</label>
                                        <input v-model="form.language" type="number" class="form-control" min="0"
                                            max="10" placeholder="Знание языков от 0 до 10">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail4">Добавить проект</label>
                                <select v-model="form.project_num" class="form-control">
                                    <option value="" selected="selected"> --- </option>
                                    <option v-for="project in projects" :key="project.id" value="1">
                                        {{project.project_name}}</option>

                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Добавить</button>
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
                projects: {},
                form: new Form({
                    fullname: '',
                    photo: '',
                    communication: '',
                    engineer: '',
                    time: '',
                    language: '',
                    project_num: ''
                })
            }
        },
        methods: {
            loadProjects() {
                axios.get("api/project").then(({
                    data
                }) => (this.projects = data.data));
            },
            uploadPhoto(e) {
                let file = e.target.files[0];
                let reader = new FileReader();
                if (file['size'] < 2111775) {
                    reader.onloadend = (file) => {
                        this.form.photo = reader.result;
                    }
                    reader.readAsDataURL(file);
                } else {

                }
            },

            createUser() {
                this.form.post('api/user');
                this.$router.push('/show');
                Fire.$emit('AfterCreate');
            }
        },
        created() {

            Fire.$on('AfterCreate', () => {
                console.log('Created new worker');
            });
            this.loadProjects();

        }
    }

</script>
