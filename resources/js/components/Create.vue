<template>
    <div class="container">
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
                            <div class="form-group">
                                <label for="inputEmail4">Коммуникация</label>
                                <input v-model="form.communication" type="number" class="form-control" min="0" max="10"
                                    placeholder="Коммуникация">
                            </div>
                            <div class="form-group">
                                <label for="inputEmail4">Инженерные навыки</label>
                                <input v-model="form.engineer" type="number" class="form-control" min="0" max="10"
                                    placeholder="Инженерные навыки">
                            </div>
                            <div class="form-group">
                                <label for="inputEmail4">Тайм менеджмент</label>
                                <input v-model="form.time" type="number" class="form-control" min="0" max="10"
                                    placeholder="Тайм менеджмент">
                            </div>
                            <div class="form-group">
                                <label for="inputEmail4">Знание языков</label>
                                <input v-model="form.language" type="number" class="form-control" min="0" max="10"
                                    placeholder="Знание языков">
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
            uploadPhoto(e) {
                let file = e.target.files[0];
                let reader = new FileReader();
                if (file['size'] < 2111775) {
                    reader.onloadend = (file) => {
                        this.form.photo = reader.result;
                    }
                    reader.readAsDataURL(file);
                } else {
                    swal.fire(
                        'Failed to Upload!',
                        'More than 2MB.',
                        'warning'
                    )
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
        }
    }

</script>
