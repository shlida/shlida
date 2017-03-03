<template>
    <div>
        <!-- <div v-for="(dateList, key) in listGroup"> -->
            <div class="board-content">
                <div class="row item">
                    <div class="col-lg-4 col-sm-12 item" v-for="item in list">
                        <list-card :cover="item.image_url" :type="item.event_type" :title="item.title" :time="item.date" :comment="item.comment_count" :love="item.love_count"></list-card>
                    </div>
                </div>
            </div>
        <!-- </div> -->
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

const api = 'http://localhost:8080/api/v1/event';
const limit = 20;

export default {
    data() {
        return {
            list: []
        }
    },
    props: ['data','type','sort'],
    methods: {
        onInfinite() {
            if(this.list.length == 0){
                this.list = this.list.concat(this.data);
                if(this.list.length == limit) {
                    this.$refs.infiniteLoading.$emit('$InfiniteLoading:loaded');
                } else {
                    this.$refs.infiniteLoading.$emit('$InfiniteLoading:complete');
                }
            } else {
                let url = api+'/'+this.type
                if(this.sort) {
                    url = url+'/'+this.type+this.sort
                }
                console.log(url)
                this.$http.get(url, {
                    params: {
                        page: this.list.length / limit + 1,
                    },
                }).then((res) => {
                    let status = res.data.status;
                    let data = res.data.data;
                    if (status && data.total > limit) {
                        this.list = this.list.concat(data.data);
                        this.$refs.infiniteLoading.$emit('$InfiniteLoading:loaded');
                        if (this.list.length == data.total) {
                            this.$refs.infiniteLoading.$emit('$InfiniteLoading:complete');
                        }
                    } else {
                        this.$refs.infiniteLoading.$emit('$InfiniteLoading:complete');
                    }
                });
            }
        }
    },
    components: {
        InfiniteLoading,
    }
};
</script>
