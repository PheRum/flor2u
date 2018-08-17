<template>
    <div>
        <div class="input-group input-group-sm">
            <span class="input-group-addon">₽</span>
            <input type="hidden" name="id" v-model="id" />
            <input type="text" class="form-control" placeholder="Price..." name="price" v-model="price" />
            <span class="input-group-btn">
                <button type="button" class="btn btn-success" @click="priceSave">Save</button>
            </span>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['id', 'price'],
        methods: {
            priceSave() {
                axios.put('/product/' + this.id, {
                    price: this.price,
                }).then(response => {
                    console.log(response);
                }).catch(error => {
                    console.log(error);
                });
            }
        }
    };
</script>
