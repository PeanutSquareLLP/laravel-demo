<template>
    <div>
        <el-card class="box-card">
            <div slot="header" class="clearfix">
                <el-page-header @back="goBack" :content="'Subject-${scope}'">
                </el-page-header>
            </div>
            <div>
                <el-form :model="model" :rules="rules" ref="subjectForm">
                    <el-row :guuter="10">
                        <el-form-item label="Name" required prop="name">
                            <el-input v-model="model.name" area-placeholder="Subject name">
                            </el-input>
                        </el-form-item>
                    </el-row>
                    <el-row :guuter="10">
                        <el-form-item>
                            <el-button type="success" @click="SaveForm('subjectForm')">Save Subject</el-button>
                        </el-form-item>
                    </el-row>
                </el-form>
            </div>
        </el-card>
    </div>
</template>

<script>
    export default {
        name: "subject-component",
        props:{
            scope:String,
        },
        mounted() {
            console.log('Component mounted.')
        },
        data() {
            return {
                model: {
                    name: null
                },
                rules: {}
            }
        },
        methods: {
            goBack() {
                //window.location.href = "/Subject";
            },
            SaveForm(formname) {
                console.log(formname);
                this.$refs[formname].validate((valid)=>{
                    if(valid){
                        this.$store.dispatch('saveSubject',this.model);
                    }
                });
            }
        }
    }
</script>
