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
                                            max="10" placeholder="Коммуникация от 0 до 10" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="inputEmail4">Инженерные навыки</label>
                                        <input v-model="form.engineer" type="number" class="form-control" min="0"
                                            max="10" placeholder="Инженерные навыки от 0 до 10" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="inputEmail4">Тайм менеджмент</label>
                                        <input v-model="form.time" type="number" class="form-control" min="0" max="10"
                                            placeholder="Тайм менеджмент от 0 до 10" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="inputEmail4">Знание языков</label>
                                        <input v-model="form.language" type="number" class="form-control" min="0"
                                            max="10" placeholder="Знание языков от 0 до 10" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail4">Добавить проект</label>
                                <select v-model="form.project_num" @change="check" class="form-control">
                                    <option value="" selected="selected"> --- </option>
                                    <option v-for="project in projects" :key="project.id"
                                        v-bind:value="project.project_name">
                                        {{project.project_name}}</option>

                                </select>
                            </div>
                            <div v-if="this.addedProjects.length != 0">Проекты - <span v-for="prj in addedProjects"
                                    class="badge badge-success mr-2 mb-2" style="font-size: 1.2em;">{{ prj }}</span>
                            </div>
                            <div v-if="this.addedProject != ''">Выбран - <span class="badge badge-success"
                                    style="font-size: 1.2em;">{{ addedProject }}</span></div>
                            <br>
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
                a: 0,
                addedProjects: [],
                addedProject: '',
                projects: {},
                form: new Form({
                    fullname: '',
                    photo: '',
                    communication: '',
                    engineer: '',
                    time: '',
                    language: '',
                    project_num: 0
                })
            }
        },
        methods: {
            check() {
                if (this.form.time == 10) {
                    this.addedProject = 0;
                    this.addedProjects.indexOf(this.form.project_num) === -1 ? (this.addedProjects.push(this.form
                        .project_num), this.a++) : alert('Такой проект уже добавлен');
                    this.form.project_num = this.a;
                } else if (this.form.time != 10) {
                    this.addedProjects = [];
                    this.addedProject = this.form.project_num;
                    this.form.project_num = 1;
                }
            },
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
