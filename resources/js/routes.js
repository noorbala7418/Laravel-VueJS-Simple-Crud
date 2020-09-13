import VueRouter from 'vue-router';

import NameIndex from "./components/NameIndex";
import NameCreate from "./components/NameCreate";
import NameEdit from "./components/NameEdit";

let router = [
    {
        path: '/',
        component: NameIndex
    },
    {
        name:'NameEdit',
        path: '/names/edit/:id',
        component: NameEdit
    },
    {
        name:'NameCreate',
        path: '/names/create',
        component: NameCreate
    }
];
export default new VueRouter({
    mode: 'history',
    routes: router
});
