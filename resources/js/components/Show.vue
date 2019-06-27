<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Список сотрудников</div>
                    <div class="card-body">

                        <div class="container mb-4">
                            <div class="row border"
                                style="box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23)">
                                <div class="col-md-3">
                                    <div class="text-center pt-3 pb-3">
                                        <img src="img/default.jpg" class="border" alt="..." style="border-radius: 50%;width: 150px;">
                                    </div>
                                </div>
                                <div class="col-md-7 border-left">
                                    <h3 class="text-center pt-3 pb-3">Andrii Romanov</h3>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <ul>
                                                <li>Коммуникабельность - 10</li>
                                                <li>Инженерные навыки - 10</li>
                                            </ul>
                                        </div>
                                        <div class="col-md-6">
                                             <ul>
                                                <li>Тайм менеджмент - 10</li>
                                                <li>Знание языков - 10</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <h5 class="text-center pt-3">Текущих проектов - 1</h5>
                                </div>
                                <div class="col-md-2 text-center border-left">
                                    <h1 class="pt-5">10</h1>
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
        mounted() {
            console.log('Component mounted.')
        }
    }

</script>
