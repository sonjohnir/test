<template>
    <div>
        <div class="float-end">
            <button type="button" class="btn btn-success" @click="changeModalStatus('create')">Создать</button>
        </div>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Название</th>
                    <th scope="col">Описание</th>
                    <th scope="col">Цена</th>
                    <th scope="col">Количество</th>
                    <th scope="col">Состояние</th>
                    <th scope="col">Действия</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(todo, key) of todoList" :key="key">
                    <th scope="row">{{ todo.id }}</th>
                    <td>{{ todo.title }}</td>
                    <td>{{ todo.description }}</td>
                    <td>{{ todo.price }}</td>
                    <td>{{ todo.amount }}</td>
                    <td><div id="app">
                        <input type="checkbox" v-model="light" v-bind:true-value="on" v-bind:false-value="off" />
                        <span v-if="light===on"> </span>
                        <span v-else> </span>
                  </div></td>   
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-sm btn-primary" @click="changeModalStatus('edit', todo)"><i class="fas fa-edit"></i></button>
                            <button type="button" class="btn btn-sm btn-danger" @click="changeModalStatus('delete', todo)"><i class="fas fa-trash"></i></button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        <div v-if="isCreateModal">
            <transition name="modal">
                <div class="modal fade show" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true" style="display:block">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Создание задачи</h5>
                                <button type="button" class="btn btn-primary btn-sm" style="background-color: #455a64;"
                                    data-dismiss="modal" aria-label="Close" @click="changeModalStatus('create')">
                                    Закрыть
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label class="form-label" for="title">Название</label>
                                    <input type="text" class="form-control" id="title" v-model="newObject.title"
                                        placeholder="Введите название....">
                                    <div class="form-text">Введите название</div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="description">Описание</label>
                                    <input type="text" class="form-control" id="description"
                                        v-model="newObject.description" placeholder="Введите oписание....">
                                    <div class="form-text">Введите oписание</div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="price">Цена</label>
                                    <input type="text" class="form-control" id="price" v-model="newObject.price"
                                        placeholder="Введите цена....">
                                    <div class="form-text">Введите цена</div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="amount">Количество</label>
                                    <input type="text" class="form-control" id="amount" v-model="newObject.amount"
                                        placeholder="Введите количество....">
                                    <div class="form-text">Введите количество</div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal" aria-label="Close"
                                    @click="changeModalStatus('create')">Отмена</button>
                                <button type="button" class="btn btn-success" @click="save('create')">Сохранить</button>
                            </div>
                        </div>
                    </div>
                </div>
            </transition>
        </div>
        <div v-if="isDeleteModal">
            <transition name="modal">
                <div class="modal fade show" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true" style="display:block">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Подтвердить удаление записи</h5>
                                <button type="button" class="btn btn-primary btn-sm" style="background-color: #455a64;"
                                    data-dismiss="modal" aria-label="Close" @click="changeModalStatus('delete')">
                                    Закрыть
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label class="form-label" for="title">Название</label>
                                    <input type="text" class="form-control" id="title" v-model="updateObject.title"
                                        placeholder="Введите название....">
                                    <div class="form-text">Введите название</div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="description">Описание</label>
                                    <input type="text" class="form-control" id="description"
                                        v-model="updateObject.description" placeholder="Введите oписание....">
                                    <div class="form-text">Введите oписание</div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="price">Цена</label>
                                    <input type="text" class="form-control" id="price" v-model="updateObject.price"
                                        placeholder="Введите цена....">
                                    <div class="form-text">Введите цена</div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="amount">Количество</label>
                                    <input type="text" class="form-control" id="amount" v-model="updateObject.amount"
                                        placeholder="Введите количество....">
                                    <div class="form-text">Введите количество</div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal" aria-label="Close"
                                    @click="changeModalStatus('delete')">Отмена</button>
                                <button type="button" class="btn btn-danger" @click="save('delete')">Удалить</button>
                            </div>
                        </div>
                    </div>
                </div>
            </transition>
        </div>
        <div v-if="isEditModal">
            <transition name="modal">
                <div class="modal fade show" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true" style="display:block">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Создание задачи</h5>
                                <button type="button" class="btn btn-primary btn-sm" style="background-color: #455a64;"
                                    data-dismiss="modal" aria-label="Close" @click="changeModalStatus('edit')">
                                    Закрыть
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label class="form-label" for="title">Название</label>
                                    <input type="text" class="form-control" id="title" v-model="updateObject.title"
                                        placeholder="Введите название....">
                                    <div class="form-text">Введите название</div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="description">Описание</label>
                                    <input type="text" class="form-control" id="description"
                                        v-model="updateObject.description" placeholder="Введите oписание....">
                                    <div class="form-text">Введите oписание</div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="price">Цена</label>
                                    <input type="text" class="form-control" id="price" v-model="updateObject.price"
                                        placeholder="Введите цена....">
                                    <div class="form-text">Введите цена</div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="amount">Количество</label>
                                    <input type="text" class="form-control" id="amount" v-model="updateObject.amount"
                                        placeholder="Введите количество....">
                                    <div class="form-text">Введите количество</div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal" aria-label="Close"
                                    @click="changeModalStatus('edit')">Отмена</button>
                                <button type="button" class="btn btn-success" @click="save('edit')">Сохранить</button>
                            </div>
                        </div>
                    </div>
                </div>
            </transition>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                todoList: [],
                isCreateModal: false,
                isEditModal: false,
                isDeleteModal: false,
                newObject: {
                    title: '',
                    description: '',
                    price: 0,
                    amount: 0
                },
             updateObject: {}
            }
        },
        mounted() {
            let vue = this;
            axios.get('/api/get')
                .then(function (response) {
                    vue.todoList = response.data;
                    console.log(vue.todoList);
                });
        },
        

        methods: {
            changeModalStatus: function (modal, object = null) {
                if (modal == 'create') {
                    this.isCreateModal = !this.isCreateModal;
                } else if (modal == 'edit') {
                    this.updateObject = object;
                    this.isEditModal = !this.isEditModal;
                } else if (modal == 'delete') {
                    this.updateObject = object;
                    this.isDeleteModal = !this.isDeleteModal;
                }
            },

            save: function (modal) {
                let vue = this;
                if (modal == 'create') {
                    axios.post('/api/create', vue.newObject)
                        .then(function (response) {
                            vue.todoList = response.data.todoList;
                            vue.changeModalStatus('create');
                        });
                } else if (modal == 'edit') {
                    axios.post('/api/update', vue.updateObject)
                    .then(function(response) {
                        vue.todoList = response.data.todoList;
                        vue.changeModalStatus('edit');
                    })
                    // cons ole.log(this.updateObject);
                } else if (modal == 'delete') {
                    axios.post('/api/delete', vue.updateObject)
                    .then(function(response) {
                        vue.todoList = response.data.todoList;
                        vue.changeModalStatus('delete');
                    })
                    //console.log(this.updateObject);
                }}
        }
    }

</script>
