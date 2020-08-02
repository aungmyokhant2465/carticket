import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import PercaleList from '../Views/PercaleList.vue';
import DetailList from '../Views/DetailPercale';

export default new VueRouter({
    //mode: "history",
    routes: [
        {
            path: '/',
            component: PercaleList,
            name: 'percale.list',
            props: true
        },
        {
            path:'/detail',
            component: DetailList,
            name: 'detail.percale',
            props: true
        }
    ]
})