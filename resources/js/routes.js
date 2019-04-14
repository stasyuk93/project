import VueRouter from 'vue-router';
import CompaniesIndex from './components/CompaniesIndex.vue';
import CompaniesCreate from './components/CompaniesCreate.vue';
import CompaniesEdit from './components/CompaniesEdit.vue';

export default new VueRouter({
    mode:'history',
    routes:[
        {
            path: '/api/v1',
            components: {
                companiesIndex: CompaniesIndex
            }
        },
        {path: '/api/v1/companies/create', component: CompaniesCreate, name: 'createCompany'},
        {path: '/api/v1/companies/edit/:id', component: CompaniesEdit, name: 'editCompany'},
    ]
});