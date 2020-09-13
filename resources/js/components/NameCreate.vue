<template>
    <div>
        <div class="card">
            <div class="card-header">
                Create new Name
                <div class="float-right">
                    <router-link to="/" class="btn btn-warning">Back</router-link>
                </div>
            </div>
            <div class="card-body">
                <form @submit.prevent="saveForm()">
                    <div class="form-group">
                        <label class="control-label">Name</label>
                        <input type="text" v-model="name.name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Family</label>
                        <input type="text" v-model="name.family" class="form-control">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "NameCreate",
    data() {
        return {
            name: {
                name: '',
                family: ''
            }
        };
    },
    methods: {
        saveForm() {
            event.preventDefault();//prevent to submit
            var newName = this.name;
            //Send new information to DB
            axios.post('/api/v1/names', newName)
                .then(response => {//The response is new name,etc
                    this.$router.push({path: '/'});//Goes To indexPage
                }).catch(error => {
                console.log(error);
            });
        }
    }
}
</script>

<style scoped>

</style>
