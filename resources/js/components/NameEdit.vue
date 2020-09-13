<template>
    <div>
        <div class="card">
            <div class="card-header">
                Edit company
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
                        <button class="btn btn-success">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "NameEdit",
    mounted() {
        let id = this.$route.params.id;
        this.nameId = id;
        //this function gets information from DB and writes in fields(name , family)
        axios.get('/api/v1/names/' + id)
            .then(response => {
                this.name = response.data;
            })
            .catch(error => {
                console.log(error);
                alert("Could not load your company");
            });
    },
    data() {
        return {
            nameId: null,
            name: {
                id: this.nameId,
                name: '',
                family: '',
                created_at: '',
                updated_at: '',
            }
        }
    },
    methods: {
        saveForm() {
            var newName = this.name;
            //this function updates info on DB
            axios.patch('/api/v1/names/' + this.nameId, newName)
                .then(response => {
                    this.$router.replace('/');
                })
                .catch(error => {
                    console.log(error);
                });
        }
    }
}
</script>

<style scoped>

</style>
