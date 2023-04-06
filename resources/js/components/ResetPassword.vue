<template>
    <div class="container w-75 mt-5">
        <div class="card">

            <form @submit.prevent="submitForm" class="px-5">
                <div class="form-group m-4">
                    <label for="name">Current Password:</label>
                    <input v-model="formData.currentPassword" type="password" id="currentPassword" class="form-control"
                           placeholder="password" required>
                </div>

                <div class="form-group m-4">
                    <label for="name">New Password</label>
                    <input v-model="formData.newPassword1" type="password" id="newPassword1" class="form-control"
                           placeholder="password" required>
                </div>

                <div class="form-group m-4">
                    <label for="email">New Password</label>
                    <input v-model="formData.newPassword2" type="password" id="newPassword2" class="form-control"
                           placeholder="password" required>
                </div>
            </form>

            <button @click="submitForm" class="btn btn-primary m-4 px-5">Submit</button>
        </div>

        <div v-if="success" class="alert alert-success mt-4" role="alert">
            <h4 class="alert-heading">Well done!</h4>
            <hr>
            <p v-if="response">{{response.data.message}}.</p>
        </div>

        <div v-if="error" class="alert alert-danger mt-4" role="alert">
            <h4 class="alert-heading">Error!</h4>
            <p v-if="response.errors.currentPassword">{{ response.errors.currentPassword.join('')}}</p>
            <hr>
            <p v-if="response.message">{{response.message}}</p>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            formData: {
                currentPassword: '',
                newPassword1: '',
                newPassword2: '',
            },
            success: false,
            error: false,
            response: "",

        };
    },

    computed: {
        passwordsMatch() {
            return this.formData.newPassword1 === this.formData.newPassword2;
        },
    },

    methods: {
        submitForm() {
            axios.post('/api/save-data', this.formData)
                .then(response => {
                    this.response = response
                    this.success = true
                    setTimeout(() => {
                        this.success = false;
                        window.location.reload()
                    }, 4000)
                })
                .catch(error => {
                    console.log(error.response.data.errors.currentPassword);
                    this.response = error.response.data
                    this.error = true
                    setTimeout(() => {
                        this.error = false
                    }, 5500);
                });
        },
    },
};
</script>
