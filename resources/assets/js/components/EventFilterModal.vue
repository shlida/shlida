<style lang="scss">
.modal-wrapper {
    width: 100%;
    box-shadow: 0 1px 5px 1px lightgrey;
    margin-bottom: 20px;
    padding-bottom: 30px;
    
    .modal-header {
        border: none;
    }
}
</style>

<template>
    <div class="modal-wrapper">
        <div class="modal-header">
            <div><i class="icon-filter"></i>FILTERS</div>
            <div @click="$emit('close')"><i class="icon-close"></i></div>
        </div>
        <div class="modal-body">
            <div class="col-12">
                <select v-model="select">
                    <option v-for="option in options" :value="option.value">
                        {{ option.text }}
                    </option>
                </select>
                <br>
                <input class="custom-checkbox" type="checkbox" id="sale" value="SALE" v-model="check">
                <label for="sale"><span></span>SALE</label>
                <input class="custom-checkbox" type="checkbox" id="shopOpening" value="SHOP OPENING" v-model="check">
                <label for="shopOpening"><span></span>SHOP OPENING</label>
                <input class="custom-checkbox" type="checkbox" id="productLaunch" value="PRODUCT LAUNCH" v-model="check">
                <label for="productLaunch"><span></span>PRODUCT LAUNCH</label>
                <input class="custom-checkbox" type="checkbox" id="market" value="MARKET" v-model="check">
                <label for="market"><span></span>MARKET</label>
                <input class="custom-checkbox" type="checkbox" id="fair" value="FAIR" v-model="check">
                <label for="fair"><span></span>FAIR</label>
                <input class="custom-checkbox" type="checkbox" id="openHouse" value="OPEN HOUSE" v-model="check">
                <label for="openHouse"><span></span>OPEN HOUSE</label>
                <br>
                <button @click="fetchData()" class="btn btn-secondary btn-sm">Apply</button>
            </div>
        </div>
    </div>
</template>

<script type="text/javascript">

const api = 'http://localhost:8080/api/v1/event';

    export default {
        data() {
            return {
                check: [],
                select: 'now',
                options: [
                  { text: 'Now Event', value: 'now' },
                  { text: 'Upcoming', value: 'upcoming' },
                  { text: 'Ended Event', value: 'end' }
                ]
            }
        },
        props: ['filterList','type','sort'],
        methods: {
            fetchData() {
                this.filterList(this.check,this.select);
            },
        },
        mounted() {
            if(this.sort != 'all'){
                this.select = this.sort;
            }
            this.check = this.type;
        }
    }
</script>

