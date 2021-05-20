<template>
    <div>
        <el-row>
            <el-col :span="24">
                <el-form ref="form" :model="form" :inline="true" size="small" label-width="120px">
                    <el-form-item label="Name">
                        <el-input v-model="form.name"></el-input>
                    </el-form-item>
                    <el-form-item label="Bedrooms">
                        <el-input v-model="form.bedrooms" type="number" step="1"></el-input>
                    </el-form-item>
                    <el-form-item label="Bathrooms">
                        <el-input v-model="form.bathrooms" type="number" step="1"></el-input>
                    </el-form-item>
                    <el-form-item label="Storeys">
                        <el-input v-model="form.storeys" type="number" step="1"></el-input>
                    </el-form-item>
                    <el-form-item label="Garages">
                        <el-input v-model="form.garages" type="number" step="1"></el-input>
                    </el-form-item>
                    <el-form-item label="Price from">
                        <el-input v-model="form.price.from" type="number" step="1"></el-input>
                    </el-form-item>
                    <el-form-item label="Price to">
                        <el-input v-model="form.price.to" type="number" step="1"></el-input>
                    </el-form-item>
                    <el-form-item>
                        <el-button type="primary" @click="getData">Search</el-button>
                        <el-button>Cancel</el-button>
                    </el-form-item>
                </el-form>
            </el-col>
        </el-row>

        <el-row>
            <el-col :span="24">
                <el-table
                    :data="rooms"
                    stripe
                    empty-text="No one rooms found"
                    style="width: 100%">
                    <el-table-column
                        prop="id"
                        label="ID">
                    </el-table-column>
                    <el-table-column
                        prop="name"
                        label="Name">
                    </el-table-column>
                    <el-table-column
                        prop="bedrooms"
                        label="Bedrooms">
                    </el-table-column>
                    <el-table-column
                        prop="bathrooms"
                        label="Bathrooms">
                    </el-table-column>
                    <el-table-column
                        prop="storeys"
                        label="Storeys">
                    </el-table-column>
                    <el-table-column
                        prop="garages"
                        label="Garages">
                    </el-table-column>
                    <el-table-column
                        prop="price"
                        label="Price">
                    </el-table-column>
                </el-table>
            </el-col>
        </el-row>
    </div>
</template>

<script>
import axios from 'axios'

export default {
    data: () => ({
        form: {
            name: '',
            bedrooms: '',
            bathrooms: '',
            storeys: '',
            garages: '',
            price: {
                from: '',
                to: ''
            }
        },
        rooms: []
    }),

    created() {
        this.getData()
    },

    methods: {
        getData() {
            axios.get('/api/v1/search', {params: this.form })
                .then((resp) => {
                    if (resp.data.data.length === 0) {
                        this.$notify({
                            title: 'Title',
                            message: 'No one rooms found'
                        });
                    }
                    this.rooms = resp.data.data
                }).catch((err) => {
                    throw new Error(err)
                })
        }
    }
}
</script>

<style scoped>

</style>
