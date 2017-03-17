<template>
    <div id="eventList">
    <button @click="getDateList()">date</button>
        <div class="col-12">
            <div style="display: flex; justify-content: center; padding: 20px 0;">
                <button @click="showModal('filterModal')" style="margin: 0 10px" class="btn btn-primary btn-sm"><i class="icon-filter" ></i> Filters</button>
                <div class="vertical-line" style="width: 1px; background-color: #eff4f7; margin: 0 10px;"></div>
                <button style="margin: 0 10px" class="btn btn-primary btn-sm"><i class="icon-event"></i></button>
                <button @click="showModal('listWrapper')" style="margin: 0 10px" class="btn btn-primary btn-sm"><i class="icon-tile"></i></button>
            </div>
            <div class="line-dot"></div>
        </div>
        <div class="row">
            <event-filter-modal v-if="filterModal" :type="type" :sort="sort" :filterList="filterList" @close="showModal('listWrapper')"></event-filter-modal>
        </div>
        <div class="row">
            <event-list-modal v-if="listModal" :date="date" :dateList="dateList" @close="showModal('listWrapper')"></event-list-modal>
        </div>
        <div v-if="listWrapper" class="col-12 event-content">
            <div id="listWrapper" class="row item">
                <div class="col-lg-4 col-sm-12 item" v-for="item in list">
                    <list-card :cover="item.image_url" :type="item.event_type" :title="item.title" :time="item.date" :comment="item.comment_count" :love="item.love_count"></list-card>
                </div>
            </div>
            <infinite-loading :on-infinite="onInfinite" ref="infiniteLoading">
                <span slot="no-more">
                    There is no more Data
                </span>
            </infinite-loading>
        </div>
        
    </div>
</template>

<script>
import InfiniteLoading from 'vue-infinite-loading';

const api = 'http://localhost:8080/api/v1/event';
const limit = 5;

export default {
    data() {
        return {
            listLength: 5,
            list: [],
            sort: 'all',
            type: [],
            date: '',
            dateList: [],
            listWrapper: true,
            listModal: false,
            filterModal: false,
        }
    },
    props: ['data'],
    methods: {
        onInfinite() {
            this.$http.get(api+'/'+this.sort, {
                params: {
                    page: this.listLength / limit + 1,
                    type: this.type
                },
            }).then((res) => {
                let status = res.data.status;
                let data = res.data.data;
                if (status && this.listLength < data.total) {
                    this.list = this.list.concat(data.data);
                    this.listLength = this.listLength + data.data.length
                    this.$refs.infiniteLoading.$emit('$InfiniteLoading:loaded');
                    if (this.listLength == data.total || data.total < limit) {
                        this.$refs.infiniteLoading.$emit('$InfiniteLoading:complete');
                    }
                } else {
                    this.$refs.infiniteLoading.$emit('$InfiniteLoading:complete');
                }
            });
        },
        filterList(type,sort) {
            this.listLength = 5;
            this.list = [];
            this.sort = sort;
            this.type = type;
            $('#listWrapper').html(''); 
            this.$http.get(api+'/'+this.sort, {
                params: {
                    page: 1,
                    type: this.type
                },
            }).then((res) => {
                let status = res.data.status;
                let data = res.data.data;
                if (status) {
                    this.list = this.list.concat(data.data);
                    this.showModal('listWrapper');
                }
            }); 
        },
        getDateList() {
            this.date = '';
            this.dateList = [];
            this.$http.get(api+'/on/2017-03-03', {}).then((res) => {
                let data = res.data;
                if (data.status) {
                    this.date = data.date;
                    this.dateList = this.dateList.concat(data.data);
                    this.showModal('listModal');
                }
            });   
        },
        showModal($modal = false) {
            this.listWrapper = false;
            this.listModal = false;
            this.filterModal = false;
            if($modal) {
                if($modal == 'listModal')
                    this.listModal = true;
                if($modal == 'listWrapper')
                    this.listWrapper = true;
                if($modal == 'filterModal')
                    this.filterModal = true;
            }
        }
    },
    components: {
        InfiniteLoading,
    },
    mounted() {
        if(this.list.length == 0){
            this.list = this.list.concat(this.data);
            this.$refs.infiniteLoading.$emit('$InfiniteLoading:loaded');
        }
    }
};
</script>
