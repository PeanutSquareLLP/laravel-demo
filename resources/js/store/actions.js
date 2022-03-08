import Vue from 'vue';

export const getSubjects=({commit},payload)=>{
    let url='/get-subjectsdata';
    axios.post(url,payload).then(res=>{
        commit('setTableData',res.data);
    });
}
export const saveSubject=({commit},payload)=>{
    console.log(payload);
    let url='/save-subject';
    axios.post(url,payload).then(res=>{
        Vue.prototype.$notify({
           title:"Success",
            message:"Subject create successfully",
            type:"success",
        });
        window.location.href='/subjects';
    });
}
export const loginForm=({commit},payload)=>{
    //console.log(payload);
    let url='/login-form';
    axios.post(url,payload).then(res=>{

        window.location.href='/dashboard';
    });
}
