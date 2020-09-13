<template>
    <div>
        <div class="card">
            <div class="card-header">
                Names list
                <div class="form-group float-right">
                    <router-link :to="{name: 'NameCreate'}" class="btn btn-success">Create new Name</router-link>
                </div>
            </div>
            <div class="card-body" style="text-align: center">
                <table class="table table-hover table-striped">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Family</th>
                        <th>Orders</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="(name,index) in names">
                        <td>{{ name.name }}</td>
                        <td>{{ name.family }}</td>
                        <td>
                            <router-link :to="{name: 'NameEdit', params: {id: name.id}}"
                                         class="btn btn-warning">
                                Edit
                            </router-link>
                            <a href="#"
                               class="btn btn-xs btn-danger"
                               @click="deleteEntry(name.id, index)">
                                Delete
                            </a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "NameIndex",
    data() {
        return {
            names: []
        };
    },
    mounted() {
        axios.get('/api/v1/names')//gets all record from DB
            .then(response => {
                this.names = response.data;
            }).catch(error => {
            console.log(error);
        });
    },
    methods: {
        deleteEntry(id, index) {
            if (confirm('Do You Sure Delete This Item?')) {

                //this function deletes record on DB
                axios.delete('/api/v1/names/' + id)
                    .then(response => {
                        this.names.splice(index, 1);
                    }).catch(error => {
                    console.log(error);
                });
            }
        }
    }
}
</script>

<style scoped>

</style>
