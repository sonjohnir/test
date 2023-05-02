import Home from './components/Home.vue';
import welcome from './components/welcome.vue';
import TodoList from './components/TodoList.vue';
export const routes = [
    {
        name: 'home',
        path: '/',
        component: Home
    },
    {
        name: 'welcome',
        path: '/welcome',
        component: welcome
    },
    {
        name: 'TodoList',
        path: '/TodoList',
        component: TodoList
    }
];