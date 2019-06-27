<template>
    <div class="container mb-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header text-center">Список сотрудников
                       
                    </div>

                    <div class="card-body">

                        <div class="container mb-4" v-for="user in users" :key="user.id">
                            <div class="row border"
                                style="box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23)">
                                <div class="col-md-3">
                                    <div class="text-center pt-3 pb-3">
                                        <img :src="user.photo" class="border" alt="..."
                                            style="border-radius: 50%;width: 150px;">
                                    </div>
                                </div>
                                <div class="col-md-7 border-left">
                                    <h3 class="text-center pt-3 pb-3">{{user.fullname}}</h3>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <ul>
                                                <li>Коммуникабельность - {{user.communication }}</li>
                                                <li>Инженерные навыки - {{user.engineer_skills}}</li>
                                            </ul>
                                        </div>
                                        <div class="col-md-6">
                                            <ul>
                                                <li>Тайм менеджмент - {{user.time_management}}</li>
                                                <li>Знание языков - {{user.languages}}</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <h5 class="text-center pt-3">Текущих проектов - 1</h5>
                                </div>
                                <div class="col-md-2 text-center border-left">
                                    <h1 class="pt-5">
                                        {{(user.communication + user.engineer_skills + user.time_management + user.languages)/4 }}
                                    </h1>
                                    <small>Средняя оценка</small>
                                </div>
                            </div>
                        </div>

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
                
                users: {},

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
            
            loadUser() {
                axios.get("api/user").then(({
                    data
                }) => (this.users = data.data));
            }
        },
        created() {
            Fire.$on('searching', () => {
                let query = this.$parent.search;
                axios.get('api/findUser?q=' + query)
                .then(({data}) => {
                    this.users = data.data;
                    
                })
                .catch(() => {
                })
            });
            this.loadUser();
            
        }
    }

</script>
