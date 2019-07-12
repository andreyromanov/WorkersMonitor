<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">В гостях у чат-бота</div>

                    <div class="card-body">
                        <div class="row p-3">
                            <div id="chatBox" class="col-md-12 border chat p-2">
                                chat fiel
                            </div>

                            <div class="col-md-12 p-0 mt-3">
                                <input id="userBox" onkeydown="if (event.keyCode == 13) {talk()}" type="text" class="form-control"
                                    placeholder="Введіть ваше повідомлення">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>