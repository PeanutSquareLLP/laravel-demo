<template>
    <div>
        <el-card class="box-card">
            <div slot="header" class="clearfix">
                <div>
                    Subjects Data
                    <el-button type="default" class="float-end" @click="create">Add Subject</el-button>
                </div>
            </div>
            <div>
                <el-table
                    :data="tableData"
                    :stripe="true"
                    :border="true"
                    height="400"
                    style="width: 100%">
                    <el-table-column
                    v-for="(column) in tableColumn"
                        :key="column.label"
                        :label="column.label"
                        :prop="column.prop"
                        :min-width="column.minWidth"
                        :sortable="column.sortable"
                        :align="column.align"
                        :header-align="column.align"
                        :fixed="column.fixed || null"
                        :formatter="column.formatter || null"
                    >

                    </el-table-column>
                    <el-table-column
                        align="right">
                        <template slot="header" slot-scope="scope">
                            <el-input
                                v-model="search"
                                size="mini"
                                placeholder="Type to search"/>
                        </template>
                        <template slot-scope="scope">
                            <el-button
                                size="mini"
                                @click="handleEdit(scope.$index, scope.row)">Edit</el-button>
                            <el-button
                                size="mini"
                                type="danger"
                                @click="handleDelete(scope.$index, scope.row)">Delete</el-button>
                        </template>
                    </el-table-column>
                </el-table>
            </div>
        </el-card>
    </div>
</template>
<script>
    import {mapGetters} from 'vuex'
    export default {
        name: "subject-table-component",
        mounted() {
            this.$store.dispatch('getSubjects');
        },
        computed:{
            ...mapGetters({
                tableData:"tableData"
            })
        },
        data() {
            return {
                tableColumn:[
                    {
                        prop:"id",
                        label:"Id",
                        minWidth:40,
                        sortable:false,
                        hidden:false,
                        align:"center",
                        fixed:true,
                    },
                    {
                        prop:"name",
                        label:"Name",
                        minWidth:40,
                        sortable:false,
                        hidden:false,
                        align:"center",
                        fixed:true,
                    }
                ]
            }
        },
        methods: {
            create() {
                window.location.href = "/add-subjects";
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
