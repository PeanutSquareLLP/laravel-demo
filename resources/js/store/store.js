 import Vue from 'vue';
import Vuex from 'vuex';

import getters from './getters';
import * as actions from './actions';
import mutations from './mutations';

 Vue.use(Vuex);
export const store=new Vuex.Store({
   modules:{

   },
    state:{
        tableData:[],
    },
    mutations,
    actions,
    getters,
 });
