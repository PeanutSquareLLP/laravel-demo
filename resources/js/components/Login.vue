<template>
    <div class="login">
            <div>
                <el-card>
                    <h2>Login</h2>
                    <el-form
                        class="login-form"
                        :model="model"
                        :rules="rules"
                        ref="loginForm"
                        @submit.native.prevent="login('loginForm')"
                    >
                        <el-form-item required prop="email">
                            <el-input v-model="model.email" placeholder="Email" prefix-icon="fas fa-user"></el-input>
                        </el-form-item>
                        <el-form-item required prop="password">
                            <el-input
                                v-model="model.password"
                                placeholder="Password"
                                type="password"
                                prefix-icon="fas fa-lock"
                            ></el-input>
                        </el-form-item>
                        <el-form-item>
                            <el-button
                                :loading="loading"
                                class="login-button"
                                type="primary"
                                native-type="submit"
                                block
                            >Login
                            </el-button>
                        </el-form-item>
                    </el-form>
                </el-card>
            </div>
    </div>
</template>

<script>
    export default {
        name: "login",
        mounted() {
            console.log('Component mounted.')
        },
        data() {
            return {
                model: {
                    email: "",
                    password: ""
                },
                loading: false,
                rules: {
                }
            };
        },
        methods: {
            simulateLogin() {
                // return new Promise(resolve => {
                //     setTimeout(resolve, 800);
                // });
            },
            async login(formname) {
              //console.log(formname)
                this.$refs[formname].validate((valid)=>{
                    if(valid){
                        this.$store.dispatch('loginForm',this.model);
                    }
                });
            }
        }
    }
</script>
<style scoped>
    .login {
        flex: 1;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .login-button {
        width: 100%;
        margin-top: 40px;
    }
    .login-form {
        width: 290px;
    }
    .forgot-password {
        margin-top: 10px;
    }
</style>
<style lang="scss">
    $teal: rgb(0, 124, 137);
    .el-button--primary {
        background: $teal;
        border-color: $teal;

        &:hover,
        &.active,
        &:focus {
            background: lighten($teal, 7);
            border-color: lighten($teal, 7);
        }
    }
    .login .el-input__inner:hover {
        border-color: $teal;
    }
    .login .el-input__prefix {
        background: rgb(238, 237, 234);
        left: 0;
        height: calc(100% - 2px);
        left: 1px;
        top: 1px;
        border-radius: 3px;
        .el-input__icon {
            width: 30px;
        }
    }
    .login .el-input input {
        padding-left: 35px;
    }
    .login .el-card {
        padding-top: 0;
        padding-bottom: 30px;
    }
    h2 {
        font-family: "Open Sans";
        letter-spacing: 1px;
        font-family: Roboto, sans-serif;
        padding-bottom: 20px;
    }
    a {
        color: $teal;
        text-decoration: none;
        &:hover,
        &:active,
        &:focus {
            color: lighten($teal, 7);
        }
    }
    .login .el-card {
        width: 340px;
        display: flex;
        justify-content: center;
    }
</style>
