import {createRouter, createWebHistory} from "vue-router"

import List from './components/List'
import Save from './components/Save'


const routes = [
    {
        name: 'list',
        path: '/vue',
        component: List
    },
    {
        name: 'save',
        // USING /:slug? FOR REUSING THE Save component WHEN UPDATING WITH THE SLUG BEING OPTIONAL
        path: '/vue/save/:slug?',
        component: Save
    },
]

const router = createRouter({
    history: createWebHistory(),
    routes: routes
})

export default router