<template>
    <div>
        <div v-for="(dateList, key) in listGroup">
            <div class="col-12 text-center">
                <div class="dateLabel">
                    <i class="icon-event"></i> {{ key }}
                    <div class="line-dot"></div>
                </div>
            </div>
            <div class="col-12 board-content">
                <div class="row item">
                    <div class="col-lg-4 col-sm-12 item" v-for="item in dateList">
                        <list-card :username="item.user.username" :cover="item.cover_url" :type="item.topic_type" :title="item.title" :time="item.timestamp_content" :comment="item.comment_count" :love="item.love_count"></list-card>
                    </div>
                </div>
            </div>
        </div>
        <div>
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

const api = 'http://localhost:8080/api/v1/board';
const limit = 20;

export default {
    data() {
        return {
            list: [],
            listGroup: {}
        }
    },
    props: ['data','type','date'],
    methods: {
        onInfinite() {
            let url = api+'/'+this.type
            if(this.date) {
                url = url+'/'+this.type+'/'+this.date
            }
            console.log(url)
            this.$http.get(url, {
                params: {
                    page: this.list.length / limit + 1,
                },
            }).then((res) => {
                var status = res.data.status;
                var data = res.data.data;
                if (status && this.list.length < data.total) {
                    this.list = this.list.concat(data.data);
                    this.initListGroup()
                    this.$refs.infiniteLoading.$emit('$InfiniteLoading:loaded');
                    if (this.list.length == data.total || data.total < limit) {
                        this.$refs.infiniteLoading.$emit('$InfiniteLoading:complete');
                    }
                } else {
                    this.$refs.infiniteLoading.$emit('$InfiniteLoading:complete');
                }
            });
        },
        initListGroup() {
            this.listGroup = _.groupBy(this.list, function(item) {
                return item.local_date
            });
        }
    },
    components: {
        InfiniteLoading,
    },
    mounted() {
        console.log("Topic List Mounted.")
        this.list = this.list.concat(this.data)
        this.initListGroup()
    }
};
</script>
